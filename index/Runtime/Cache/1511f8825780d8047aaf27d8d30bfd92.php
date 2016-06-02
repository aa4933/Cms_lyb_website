<?php if (!defined('THINK_PATH')) exit();?><!-- 头部 -->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>大连利友邦商品经营有限公司</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp">

    <link href="__ROOT__/statics/index/youhua/favicon.ico" mce_href="__ROOT__/statics/index/youhua/favicon.ico" rel="bookmark" type="image/x-icon" /> 
    <link href="__ROOT__/statics/index/youhua/favicon.ico" mce_href="__ROOT__/statics/index/youhua/favicon.ico" rel="icon" type="image/x-icon" /> 
    <link href="__ROOT__/statics/index/youhua/favicon.ico" mce_href="__ROOT__/statics/index/youhua/favicon.ico" rel="shortcut icon" type="image/x-icon" /> 

    <link rel="stylesheet" href="__ROOT__/statics/index/youhua/bootstrap.min.css">
    <link rel="stylesheet" href="__ROOT__/statics/index/youhua/init.css">
    <link rel="stylesheet" href="__ROOT__/statics/index/youhua/hf.css">
    <link rel="stylesheet" href="__ROOT__/statics/index/youhua/shouye.css">
    <script type="text/javascript" src="__ROOT__/statics/index/youhua/jquery-1.7.2.js"></script>
    <script type="text/javascript" src="__ROOT__/statics/index/youhua/jquery.flexslider-min.js"></script>


    <link rel="stylesheet" href="__ROOT__/statics/index/youhua/qqkf.css" />

     <script type="text/javascript" src="__ROOT__/statics/index/youhua/qqkf.js" ></script>

</head>
<body>
    <!-- qq客服 -->
    <div id="top"></div>

    <div class="head">
        <div class="container clearfix">
            <a href="#111" class="logo left">
                <img src="__ROOT__/statics/index/youhua/logo.png"></a>
            <div class="left head_text">
                <p class="small_head_text">大连再生资源交易所</p>
                <p class="fw">第117号会员单位</p>
            </div>
            <div class="right">
                <div class="head-link clearfix">
                    <a href="#">收藏网站</a>
                    <a href="<?php echo U('Index/cate', "cid=998");?>" style="border-right: none;">手机软件下载</a>
                </div>
                <div class="telp clearfix"> <em class="left"></em>
                    <span class="left">
                        服务热线：
                        <span class="telp_hao">0592-2667786</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="menu">
        <div class="container">

            <ul class="jsddm clearfix">

                <li class="li">
                    <!-- <a href="#" class="a">首页</a> -->
                    <!-- <a href="__ROOT__" class="a">首页</a> -->
                    <a href="__ROOT__/" class="a">首页</a>
                    <!-- <a href="<?php echo ($_SERVER['HTTP_HOST']); ?>" class="a">首页</a> -->
                </li>

                <?php if(is_array($article_cate_list['parent'])): $i = 0; $__LIST__ = $article_cate_list['parent'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="li">
                        <a href="<?php echo U('Index/cate', "cid=$val[id]");?>" class="a"><?php echo ($val["name"]); ?></a>
                        <ul class="xialaUl">
                            <?php if(is_array($article_cate_list['sub'][$val['id']])): $i = 0; $__LIST__ = $article_cate_list['sub'][$val['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sval): $mod = ($i % 2 );++$i;?><li>
                                    <a href="<?php echo U('Index/cate', "cid=$sval[id]");?>"><?php echo ($sval["name"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="shoujimenu clearfix">
                <span class="right menubtn">Menu</span>

            </div>
        </div>
    </div>
    <div class="shouM none">
        <div class="menud center">MENU</div>
        <p class="center">
            <!-- <a href="#">首页</a> -->
            <a href="__ROOT__/" class="a">首页</a>

        </p>

        <?php if(is_array($article_cate_list['parent'])): $i = 0; $__LIST__ = $article_cate_list['parent'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><p class="center">
            <a href="<?php echo U('Index/cate', "cid=$val[id]");?>"><?php echo ($val["name"]); ?></a>
            </p>
            <ul>
                <?php if(is_array($article_cate_list['sub'][$val['id']])): $i = 0; $__LIST__ = $article_cate_list['sub'][$val['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sval): $mod = ($i % 2 );++$i;?><li class="center">
                        <a href="<?php echo U('Index/cate', "cid=$sval[id]");?>"><?php echo ($sval["name"]); ?></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul><?php endforeach; endif; else: echo "" ;endif; ?>

    </div>






    
    <?php  ?>
    <div class="banner">
        <div class="block_home_slider">
            <div id="home_slider" class="flexslider">

                <div class="flex-viewport" style="overflow: hidden; position: relative;">
                    <ul class="slides" style="width: 800%; margin-left: -1423px;">

                        <!-- <li>
                            <div class="slide">
                                <img src="images/index_05.png" alt="" />
                                
                            </div>
                        </li> -->

                        <?php if(is_array($list_best)): $i = 0; $__LIST__ = $list_best;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_best): $mod = ($i % 2 );++$i;?><!-- <li class="" style="width: 1423px; float: left; display: block;">
                            <div class="slide">
                                <a href="<?php echo U('Index/detail', "aid=$list_best[id]");?>"
                            target="_blank" title="<?php echo ($list_best["title"]); ?>" style="">
                                    <img src="__ROOT__/data/news/<?php echo ($list_best["img"]); ?>"
                            alt="<?php echo ($list_best["title"]); ?>" alt="<?php echo ($list_best["title"]); ?>" /></a>
                            </li> -->

                            <li>
                                <div class="slide">
                                    <a href="<?php echo U('Index/detail', "aid=$list_best[id]");?>"
                            target="_blank" title="<?php echo ($list_best["title"]); ?>" style="">
                                    <img src="__ROOT__/data/news/<?php echo ($list_best["img"]); ?>"
                            alt="<?php echo ($list_best["title"]); ?>" alt="<?php echo ($list_best["title"]); ?>" /></a>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </div>
                <ol class="flex-control-nav flex-control-paging">
                    <li>
                        <a class="flex-active">1</a>
                    </li>
                    <li>
                        <a class="">2</a>
                    </li>
                </ol>
                <ul class="flex-direction-nav">
                    <li>
                        <a class="flex-prev" href="#111">Previous</a>
                    </li>
                    <li>
                        <a class="flex-next" href="#111">Next</a>
                    </li>
                </ul>
            </div>

            <script type="text/javascript">
                                $(function () {
                                    $('#home_slider').flexslider({
                                        animation : 'slide',
                                        controlNav : true,
                                        directionNav : true,
                                        animationLoop : true,
                                        slideshow : true,
                                        useCSS : false
                                    });
                                    
                                });
                            </script>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="main_one clearfix">
                <div class="col-md-4 col-sm-12 col-xs-12 clearfix">
                    <div class="jiaodiantu">
                        <div class="indexPicBox">
                            <div class="hotPic">
                                <div class="num">
                                    <span class="cur">1</span>
                                    <!-- <span class="">2</span>
                                    <span class="">3</span> -->
                                    <?php  $count = ((count($list_hot))+1); for ($i=2; $i < $count; $i++) { echo "<span class=''>$i</span>"; } ?>

                                </div>
                                <ul class="pic clearfix">
                                    <?php if(is_array($list_hot)): $i = 0; $__LIST__ = $list_hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_hot): $mod = ($i % 2 );++$i;?><li style="display: block;">
                                            <a href="<?php echo U('Index/detail', "aid=$list_hot[id]");?>"
                                        target="_blank" title="<?php echo ($list_hot["title"]); ?>" style="">
                                                <img src="__ROOT__/data/news/<?php echo ($list_hot["img"]); ?>"
                                        alt="<?php echo ($list_hot["title"]); ?>" width="310" height="260" /></a>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>


                                </ul>
                            </div>
                            <script type="text/javascript">
//焦点图
$(function(){
    var sw = 0;
    $(".hotPic .num span").mouseover(function(){
        sw = $(".hotPic .num span").index(this);
        myShow(sw);
    });
    function myShow(i){
        $(".hotPic .num span").eq(i).addClass("cur").siblings("span").removeClass("cur");
        $(".hotPic .pic li").eq(i).stop(true,true).fadeIn(600).siblings("li").fadeOut(600);
        //$(".hotPic .text p").eq(i).show().siblings("p").hide();
    }
    //滑入停止动画，滑出开始动画
    $(".hotPic").hover(function(){
        if(myTime){
           clearInterval(myTime);
        }
    },function(){
        myTime = setInterval(function(){
          myShow(sw)
          sw++;
          if(sw==$(".hotPic .pic li").length){sw=0;}
        } , 3000);
    });
    //自动开始
    var myTime = setInterval(function(){
       myShow(sw)
       sw++;
       if(sw==$(".hotPic .pic li").length){sw=0;}
    } , 3000);
})
</script>
                        </div>
                    </div>
                    <div class="guanggao">
                        <!-- <img src="__ROOT__/statics/index/youhua/index_35.png"> -->

                        <!-- <?php if($ad_list[0]['id'] != ''): ?><img src="__ROOT__/data/advert/<?php echo ($ad_list[0]['code']); ?>" width="295" height="161" /><?php endif; ?> -->

                        <?php if($ad_list[0]['id'] != ''): ?><a href="<?php echo ($ad_list[0]['url']); ?>"><img src="__ROOT__/data/advert/<?php echo ($ad_list[0]['code']); ?>"  /></a>

                      <?php else: ?>
                      <img src="__ROOT__/statics/index/youhua/index_35.png"><?php endif; ?>

                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12 ">
                    <div class="celue clearfix">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a href="<?php echo U('Index/cate', "cid=9");?>" class="celue_div celue_one"> <em></em>
                                <p>今日策略</p>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a href="<?php echo U('Index/cate', "cid=28");?>" class="celue_div celue_two">
                                <em></em>
                                <p>金融动态</p>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a href="<?php echo U('Index/cate', "cid=44");?>" class="celue_div celue_three">
                                <em></em>
                                <p>公司公告</p>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a href="<?php echo U('Index/cate', "cid=46");?>" class="celue_div celue_four">
                                <em></em>
                                <p>分析团队</p>
                            </a>
                        </div>
                    </div>
                    <div class="leibiao clearfix">
                        <div class="col-md-8 col-sm-8 col-xs-12 sy_news">
                            <ul class="leibiao_ul">
                                <?php if(is_array($list_hothh)): $i = 0; $__LIST__ = $list_hothh;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_hothh): $mod = ($i % 2 );++$i;?><li>
                                        <a href="<?php echo U('Index/detail', "aid=$list_hothh[id]");?>" class="clearfix">
                                             <?php echo (subtext($list_hothh["title"],28)); ?>
                                        </a>

                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12" style="padding: 0px;">
                            <a href="http://zb1.lybpe.com/logging.php" class="zhibo clearfix">
                                <div class="zhiboc">
                                    <div class="clearfix">
                                        <em class="left"></em>
                                        <span class="left">
                                            在线直播室
                                            <p style="font-size: 10px;">答疑解惑，在线喊单</p>
                                            <p style="font-size: 10px;">技术分析，赢在今夜</p>
                                        </span>
                                    </div>

                                </div>
                            </a>
                            <a href="<?php echo U('Index/cate', "cid=999");?>" class="ruanjian">
                                <div class="ruanjianc">
                                    <div class="clearfix">
                                        <em class="left"></em>
                                        <div class="left">
                                            软件下载
                                            <p style="font-size: 10px;">行情及时/ 稳定 / 精准</p>
                                            <p style="font-size: 10px;">指标功能强大</p>
                                        </div>

                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo U('Index/cate', "cid=17");?>" class="yuyue clearfix">
                                <div class="yuyuec">
                                    <em class="left"></em>
                                    <span class="left">在线开户</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main_two">
                <!-- <img src="__ROOT__/statics/index/youhua/index_43.png"> -->

                <?php if($ad_list[1]['id'] != ''): ?><a href="<?php echo ($ad_list[1]['url']); ?>"><img src="__ROOT__/data/advert/<?php echo ($ad_list[1]['code']); ?>"  /></a>
              <?php else: ?>
              <img src="__ROOT__/statics/index/youhua/index_43.png"><?php endif; ?>
            </div>
            <div class="main_three clearfix">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="main_three_t">
                        <div class="left main_three_tlf">每日交易策略</div>
                        <a href="<?php echo U('Index/cate', "cid=9");?>" class="right">更多</a>
                    </div>
                    <div class="main_three_b">
                        <ul>
                            
                            <?php if(is_array($list_announce)): $i = 0; $__LIST__ = $list_announce;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_announce): $mod = ($i % 2 );++$i;?><li>
                                    <!-- ·[<?php echo (substr($list_announce["add_time"],0,10)); ?>]
                                    <a href="<?php echo U('Index/detail', "aid=$list_announce[id]");?>"
                                    target="_blank" title="<?php echo ($list_announce["title"]); ?>" style="">
                                         <?php echo ($list_announce["title"]); ?>
                                    </a> -->

                                    <a href="<?php echo U('Index/detail', "aid=$list_announce[id]");?>" class="clearfix">
                                        <span class="left"><!-- <?php echo ($list_announce["title"]); ?> --><?php echo (subtext($list_announce["title"],12)); ?></span>
                                        <span class="right"><?php echo (substr($list_announce["add_time"],0,10)); ?></span>
                                    </a>

                                </li><?php endforeach; endif; else: echo "" ;endif; ?>

                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="main_three_t">
                        <div class="left main_three_tlf">金融动态</div>
                        <a href="<?php echo U('Index/cate', "cid=28");?>" class="right">更多</a>
                    </div>
                    <div class="main_three_b">
                        <ul>
                            <?php if(is_array($list_mycompany)): $i = 0; $__LIST__ = $list_mycompany;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_mycompany): $mod = ($i % 2 );++$i;?><li>
                                    <a href="<?php echo U('Index/detail', "aid=$list_announce[id]");?>" class="clearfix">
                                        <span class="left"><?php echo (subtext($list_mycompany["title"],12)); ?></span>
                                        <span class="right"><?php echo (substr($list_mycompany["add_time"],0,10)); ?></span>
                                    </a>

                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="main_three_t">
                        <div class="left main_three_tlf">供求概况</div>
                        <a href="<?php echo U('Index/cate', "cid=15");?>" class="right">更多</a>
                    </div>
                    <div class="main_three_b">
                        <ul>
                            <?php if(is_array($list_company)): $i = 0; $__LIST__ = $list_company;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_company): $mod = ($i % 2 );++$i;?><li>
                                    <a href="<?php echo U('Index/detail', "aid=$list_company[id]");?>" class="clearfix">
                                        <span class="left"><?php echo (subtext($list_company["title"],12)); ?></span>
                                        <span class="right"><?php echo (substr($list_company["add_time"],0,10)); ?></span>
                                    </a>

                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main_two" style="margin-top: 10px;">
                <!-- <img src="__ROOT__/statics/index/youhua/index_47.png"> -->
                <?php if($ad_list[2]['id'] != ''): ?><a href="<?php echo ($ad_list[2]['url']); ?>"><img src="__ROOT__/data/advert/<?php echo ($ad_list[2]['code']); ?>"  /></a>
              <?php else: ?>
              <img src="__ROOT__/statics/index/youhua/index_47.png"><?php endif; ?>

            </div>
            
    
<!-- 底部导航     -->
<div class="main_four clearfix">
                <ul class="clearfix">
                
                    <?php if(is_array($list_flink)): $i = 0; $__LIST__ = $list_flink;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_flink): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo ($list_flink["url"]); ?>" title="<?php echo ($list_flink["name"]); ?>" target="_blank">
                                <img src="__ROOT__/data/flink/<?php echo ($list_flink["img"]); ?>"/>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>

    </div>

<!-- 底部版权 -->
<div class="main_five">
        <img src="__ROOT__/statics/index/youhua/mainfive.png"></div>
    <div class="footer">
            <div class="container clearfix">
                <div class="erw">
                    <img src="__ROOT__/statics/index/youhua/erw.png" />
                </div>
                <div class="footer_three">
                    <div class="footer_three_main">
                        <p class="fs16">全国统一客服热线：</p>
                        <div class="phone clearfix">
                            <em class="em left"></em>
                            <span class="left fs18">400-9606-117</span>
                        </div>
                        <p class="fs16">客服邮箱：</p>
                        <p class="fs16">lybpe@qq.com</p>
                    </div>
                </div>
              
                <div class="footer_one">
                    <div class="footer_one_main">
                        <p style="color: #fff;">大连利友邦商品经营有限公司</p>
                        <div style="color: #a1a1a1;">
                            <p>版权所有 Copyright  &copy 2015 </p>
                            <p>闽ICP备14000180号 </p>
                            <p>地址：福建省厦门市思明区民族路50号世纪中心五楼   </p>
                            <p>电话：0592-2667786、0592-2667787</p>
                        </div>
                    </div>
                </div>
                <!--<div class="footer_two">
                    <p class="fs16" style="color: #a1a1a1;">关注我们：</p>
                    <div class="footer_two_b clearfix">
                        <ul class="clearfix">
                            <li>
                                <a href="#" class="footer_two_b_c">
                                    <em class="qq"></em>
                                    <p class="center">QQ群</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="footer_two_b_c">
                                    <em class="weix"></em>
                                    <p class="center">微信</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="footer_two_b_c">
                                    <em class="weibo"></em>
                                    <p class="center">微博</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="footer_two_b_c">
                                    <em class="sc"></em>
                                    <p class="center">收藏网站</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>-->
                
            </div>
        </div>
     
<script type="text/javascript" src="__ROOT__/statics/index/youhua/menu.js" ></script>
 <script type="text/javascript" src="__ROOT__/statics/index/youhua/index.js" ></script>
    </body>
</html>