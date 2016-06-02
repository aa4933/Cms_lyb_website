<?php
/**
 * Api Cache System
 * 
 * @author Taoapi.com
 * QQ:554024292
 *
 */

class Api59miao_Cache
{
    //缓存路径
    private $_CachePath='';

    //缓存时间
    private $_cachetime ='';   //默认为秒

    //API名称
    private $_method = "";

    //是否自动清除缓存
   //自动清除过期缓存的时间间隔，
	//格式是：* * * *
	//其中第一个数表示分钟，第二个数表示小时，第三个数表示日期，第四个数表示月份
	//多个之间可以用半角分号隔开
	//示例：
	//要求每天早上的8点1分清除缓存，格式是：1 8 * *
	//要求每个月的1号晚上12点5分清除缓存，格式是：5 12 1 *
	//要求每隔5天就在上午10点3分清除缓存，格式是：3 10 1,5,10,15,20,25 *
	//如果设为0或格式不对将不开启此功能
	//缓存清除操作每天只会执行一次
	//$apiConfig['ClearCache'] = "* 9 1,5,10,15,20,25 *"; //默认为每隔5天在上午9点-10点之间进行自动缓存清除
    //是否自动清除缓存
    private $_ClearCache = '0';
    
    public function __construct()
    {
        $this->_CachePath=API_CACHEPATH;       
        $this->_cachetime=API_CACHETIME;
        $this->_ClearCache=API_CLEARCACHE;
        $this->setCacheTime($this->_cachetime);
        $this->setCachePath($this->_CachePath);
    }

    public function setMethod ($method)
    {
        $this->_method = $method;
    }

    /**
     * @return Taoapi_Cache
     */
    public function setCacheTime ($time)
    {
        $this->_cachetime = intval($time);
        return $this;
    }

    /**
     * @return Taoapi_Cache
     */
    public function setClearCache ($param)
    {
        $this->_ClearCache = $param;

        return $this;
    }

    /**
     * @return Taoapi_Cache
     */
    public function setCachePath ($CachePath)
    {
        $this->_CachePath = substr($CachePath, - 1, 1) == '/' ? $CachePath : $CachePath . '/';
        return $this;
    }

    public function saveCacheData ($id, $result)
    {    	
    	
        $idkey = substr($id,0,2);
        
        if ($this->_cachetime) {
            if (! is_dir($this->_CachePath)) {
                mkdir($this->_CachePath);
            }
            if (! is_dir($this->_CachePath . $this->_method)) {
                mkdir($this->_CachePath . $this->_method);
            }
            if (! is_dir($this->_CachePath . $this->_method.'/'.$idkey)) {
                mkdir($this->_CachePath . $this->_method.'/'.$idkey);
            }
            $filepath = $this->_CachePath . $this->_method.'/'.$idkey;
            if (is_dir($filepath)) {
                $filename = $filepath . '/' . $id . '.cache';
                @file_put_contents($filename, $result);
            }
        }
    }

	private function checkClearTime()
	{
		$CacheParam = explode(" ",$this->_ClearCache);
		//print_r($CacheParam);

		if(!$this->_ClearCache || count($CacheParam) !== 4)
		{
			return false;
		}

		if($CacheParam[3] != "*")
		{
			$CacheParam[3] = explode(",",$CacheParam[3]);			

			if(!in_array(date('m'),$CacheParam[3]))
			{
				return false;
			}
		}

		if($CacheParam[2] != "*")
		{
			$CacheParam[2] = explode(",",$CacheParam[2]);			
			if(!in_array(date('d'),$CacheParam[2]))
			{
				return false;
			}
		}
		if($CacheParam[1] != "*")
		{
			$CacheParam[1] = explode(",",$CacheParam[1]);
		//print_r($CacheParam[1]);
			//echo date('Y-m-d H:i:s');
//			print_r(date('H'));
//			print_r($CacheParam[1]);


			if(!in_array(date('H'),$CacheParam[1]))
			{
				return false;
			}						
		}

		if($CacheParam[0] != "*")
		{
			$CacheParam[0] = explode(",",$CacheParam[0]);	
			print_r(date('i'));
			print_r($CacheParam[0]);
			if(!in_array(date('i'),$CacheParam[0]))
			{
				return false;
			}					
		}
		$cachetag = $this->_CachePath."autoclear.tag";

         if (file_exists($cachetag)) {
                $filetime = date('U', filemtime($cachetag));

				if(date("d") == date("d",$filetime))
				{
					return false;
				 }
		}
		file_put_contents($cachetag,date("Y-m-d H:i:s"));
		//echo 'true';
		return true;
	}

	public function autoClearCache($path ='')
	{
		$path = $path ? $path : $this->_CachePath;

		if(empty($path))
		{
			return false;
		}

		if($this->_cachetime)
		{
			if(!is_dir($path))
			{
				return false;
			}
			
			if($fdir = opendir($path))
			{
				$old_cwd = getcwd();
				chdir($path);
				$path = getcwd().'/';
				while(($file = readdir($fdir)) !== false)
				{
					if(in_array($file,array('.','..')))
					{
						continue;
					}

					if(is_dir($path.$file))
					{
						$this->autoClearCache($path.'/'.$file.'/'); 
					}else{
						if(strpos($file,".cache") !== false)
						{
							$filetime = date('U', filemtime($path.$file));
							$cachetime = $this->_cachetime * 60 * 60;   //修改	
						//	echo $filetime;
//							$cachetime = $this->_cachetime;  
							if ($this->_cachetime != 0 && (time() - $filetime) > $cachetime) {
									@unlink($path.$file);
							}
						}
					}
				}				
				closedir($fdir);
				chdir($old_cwd);
			}
		}

	}
	//删除指定method方法下面的缓存
    public function clearCache($id = null)
    {
        if ($id) {
        	$idkey = substr($id,0,2);
            $filename = $this->_CachePath . $this->_method . '/' .$idkey.'/'. $id . '.cache';
            unlink($filename);
        } else {
            $dir = $this->_CachePath . $this->_method . '/';
            $this->del_dir($dir);
        }
    }
    //删除目录
	public function del_dir($dir){	//删除目录
	    if($dir=='' || !count($dir)){
			return;
		}
		if(is_array($dir)){
			foreach($dir as $d){
				@chmod($d, 0777);
				$this->del_dir($d);
			}
		}else{
			if(!($mydir=@dir($dir))){
				return;
			}
			while($file=$mydir->read()){
				if(is_dir("$dir$file") && $file!='.' && $file!='..'){ 
					@chmod("$dir$file", 0777);
					$this->del_dir("$dir$file"); 
				}elseif(is_file("$dir/$file")){
					$file_time=@stat($file);	//读取文件的最后更新时间
					if(time()-$file_time>3600*24*2){//只删除2天以前的文件
						@chmod("$dir/$file", 0777);
						@unlink("$dir/$file");
					}
				}
			}
			$mydir->close();
			@chmod($dir, 0777);
			@rmdir($dir);
		}
	}
    
    //获取内容，如果缓存超过时间，返回false
    public function getCacheData ($id)
    {
		if($this->checkClearTime())
		{
			$this->autoClearCache();			
		}

        $idkey = substr($id,0,2);
        $filename = $this->_CachePath . $this->_method . '/' . $idkey .'/'. $id . '.cache';
        if ($this->_cachetime) {
        	//echo $filename;        	
            if (file_exists($filename)) {
                $filetime = date('U', filemtime($filename));
                $cachetime = $this->_cachetime;                
                if ($this->_cachetime != 0 && (time() - $filetime) > $cachetime*60*60) {                	
                    return false;
                }
                return @file_get_contents($filename);
            }            
        }
       
        return false;
    }
}