<?php 
//$thumbnail = new ImageResize();
//$thumbnail->resizeimage(源图片完整路径, 缩略图宽度, 缩略图高度, 是否剪裁（0或者1）, 新图片完整路径);
//$thumbnail->resizeimage('a.jpg', 400, 400, 0, 'output/a.jpg');
class ImageResize {
    
    //图片类型
    var $type;
    
    //实际宽度
    var $width;
    
    //实际高度
    var $height;
    
    //改变后的宽度
    var $resize_width;
    
    //改变后的高度
    var $resize_height;
    
    //是否裁图
    var $cut;
    
    //源图象
    var $srcimg;
    
    //目标图象地址
    var $dstimg;
    
    //临时创建的图象
    var $im;

    function resizeimage($img, $wid, $hei,$c,$dstpath) {
        $this->srcimg = $img;
        $this->resize_width = $wid;
        $this->resize_height = $hei;
        $this->cut = $c;
        
        //图片的类型
        $this->type = strtolower(substr(strrchr($this->srcimg,"."),1));
        
        //初始化图象
        $this->initi_img();
        
        //目标图象地址
        $this -> dst_img($dstpath);
        
        //--
        $this->width = imagesx($this->im);
        $this->height = imagesy($this->im);
        
        //生成图象
        $this->newimg();
        
        ImageDestroy ($this->im);
    }

    function newimg() {

        //改变后的图象的比例
        $resize_ratio = ($this->resize_width)/($this->resize_height);

        //实际图象的比例
        $ratio = ($this->width)/($this->height);

        if(($this->cut)=="1") {
            //裁图 高度优先
            if($ratio>=$resize_ratio){
                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width,$this->resize_height, (($this->height)*$resize_ratio), $this->height);
                ImageJpeg ($newimg,$this->dstimg,100);
            }            
            //裁图 宽度优先
            if($ratio<$resize_ratio) {
                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width, $this->resize_height, $this->width, (($this->width)/$resize_ratio));
                ImageJpeg ($newimg,$this->dstimg,100);
            }
        } else {
            //不裁图
            if($ratio>=$resize_ratio) {
                $newimg = imagecreatetruecolor($this->resize_width,($this->resize_width)/$ratio);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width, ($this->resize_width)/$ratio, $this->width, $this->height);
                ImageJpeg ($newimg,$this->dstimg,100);
            }
            if($ratio<$resize_ratio) {
                $newimg = imagecreatetruecolor(($this->resize_height)*$ratio,$this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, ($this->resize_height)*$ratio, $this->resize_height, $this->width, $this->height);
                ImageJpeg ($newimg,$this->dstimg,100);
            }
        }
    }

    //初始化图象
    function initi_img() {
        if($this->type=="jpg") {
            $this->im = imagecreatefromjpeg($this->srcimg);
        }
        
        if($this->type=="gif") {
            $this->im = imagecreatefromgif($this->srcimg);
        }
        
        if($this->type=="png") {
            $this->im = imagecreatefrompng($this->srcimg);
        }
        
        if($this->type=="bmp") {
            $this->im = $this->imagecreatefrombmp($this->srcimg);
        }
    }

    //图象目标地址
    function dst_img($dstpath) {
        $full_length  = strlen($this->srcimg);
        $type_length  = strlen($this->type);
        $name_length  = $full_length-$type_length;
        $name = substr($this->srcimg,0,$name_length-1);
        $this->dstimg = $dstpath;
        //echo $this->dstimg;
    }
    
    function ConvertBMP2GD($src, $dest = false) {
        if(!($src_f = fopen($src, "rb"))) {
            return false;
        }
        if(!($dest_f = fopen($dest, "wb"))) {
            return false;
        }
        $header = unpack("vtype/Vsize/v2reserved/Voffset", fread($src_f,14));
        $info = unpack("Vsize/Vwidth/Vheight/vplanes/vbits/Vcompression/Vimagesize/Vxres/Vyres/Vncolor/Vimportant", fread($src_f, 40));
        
        extract($info);
        extract($header);
        
        if($type != 0x4D42) { // signature "BM"
            return false;
        }
        
        $palette_size = $offset - 54;
        $ncolor = $palette_size / 4;
        $gd_header = "";
        // true-color vs. palette
        $gd_header .= ($palette_size == 0) ? "\xFF\xFE" : "\xFF\xFF";
        $gd_header .= pack("n2", $width, $height);
        $gd_header .= ($palette_size == 0) ? "\x01" : "\x00";
        if($palette_size) {
            $gd_header .= pack("n", $ncolor);
        }
        // no transparency
        $gd_header .= "\xFF\xFF\xFF\xFF";

        fwrite($dest_f, $gd_header);

        if($palette_size) {
            $palette = fread($src_f, $palette_size);
            $gd_palette = "";
            $j = 0;
            while($j < $palette_size) {
                $b = $palette{$j++};
                $g = $palette{$j++};
                $r = $palette{$j++};
                $a = $palette{$j++};
                $gd_palette .= "$r$g$b$a";
            }
            $gd_palette .= str_repeat("\x00\x00\x00\x00", 256 - $ncolor);
            fwrite($dest_f, $gd_palette);
        }

        $scan_line_size = (($bits * $width) + 7) >> 3;
        $scan_line_align = ($scan_line_size & 0x03) ? 4 - ($scan_line_size &
        0x03) : 0;

        for($i = 0, $l = $height - 1; $i < $height; $i++, $l--) {
            // BMP stores scan lines starting from bottom
            fseek($src_f, $offset + (($scan_line_size + $scan_line_align) * $l));
            $scan_line = fread($src_f, $scan_line_size);
            if($bits == 24) {
                $gd_scan_line = "";
                $j = 0;
                while($j < $scan_line_size) {
                    $b = $scan_line{$j++};
                    $g = $scan_line{$j++};
                    $r = $scan_line{$j++};
                    $gd_scan_line .= "\x00$r$g$b";
                }
            }
            else if($bits == 8) {
                $gd_scan_line = $scan_line;
            }
            else if($bits == 4) {
                $gd_scan_line = "";
                $j = 0;
                while($j < $scan_line_size) {
                    $byte = ord($scan_line{$j++});
                    $p1 = chr($byte >> 4);
                    $p2 = chr($byte & 0x0F);
                    $gd_scan_line .= "$p1$p2";
                }
                $gd_scan_line = substr($gd_scan_line, 0, $width);
            }
            else if($bits == 1) {
                $gd_scan_line = "";
                $j = 0;
                while($j < $scan_line_size) {
                    $byte = ord($scan_line{$j++});
                    $p1 = chr((int) (($byte & 0x80) != 0));
                    $p2 = chr((int) (($byte & 0x40) != 0));
                    $p3 = chr((int) (($byte & 0x20) != 0));
                    $p4 = chr((int) (($byte & 0x10) != 0));
                    $p5 = chr((int) (($byte & 0x08) != 0));
                    $p6 = chr((int) (($byte & 0x04) != 0));
                    $p7 = chr((int) (($byte & 0x02) != 0));
                    $p8 = chr((int) (($byte & 0x01) != 0));
                    $gd_scan_line .= "$p1$p2$p3$p4$p5$p6$p7$p8";
                }
                $gd_scan_line = substr($gd_scan_line, 0, $width);
            }
            fwrite($dest_f, $gd_scan_line);
        }
        fclose($src_f);
        fclose($dest_f);
        return true;
    }

    function imagecreatefrombmp($filename) {
        $tmp_name = tempnam("/tmp", "GD");
        if($this->ConvertBMP2GD($filename, $tmp_name)) {
            $img = imagecreatefromgd($tmp_name);
            unlink($tmp_name);
            return $img;
        }
        return false;
    }
    
}
?>