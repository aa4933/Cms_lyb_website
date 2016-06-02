<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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






    
<!-- 列表和详情样式 -->
<link rel="stylesheet" href="__ROOT__/statics/index/youhua/bootstrap.min.css" />
<link rel="stylesheet" href="__ROOT__/statics/index/youhua/init.css" />
<link rel="stylesheet" href="__ROOT__/statics/index/youhua/hf.css" />
<link rel="stylesheet" href="__ROOT__/statics/index/youhua/news.css" />
<script type="text/javascript" src="__ROOT__/statics/index/youhua/jquery-1.7.2.js" ></script>

<div class="banner">
        <!-- <img src="__ROOT__/statics/index/youhua/news_02.png" /> -->
        <?php if($img): ?><img src="__ROOT__/data/banner/<?php echo ($img); ?>" />
        <?php else: ?>
            <img src="__ROOT__/statics/index/youhua/news_02.png" /><?php endif; ?>

    </div>
    <div class="main">
        <div class="container">
            <div class="clearfix newsmain">
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="newsmain_lf_t clearfix">
                    <div class="left newsmain_lf_t_lf">
                      <span class="news_big left"><?php echo ($cateName); ?></span>
                      <span class="news_small left">/ <?php echo ($alias); ?></span>
                      
                    </div>
                    <a href="<?php echo U('Index/cate', "cid=$cid");?>" class="right">更多</a>
                  </div>
                    <div class="newsmain_lf_con">
                        <div class="newsmain_lf_b">
                      <ul>
                      
                        <?php if(is_array($list_company)): $i = 0; $__LIST__ = $list_company;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_company): $mod = ($i % 2 );++$i;?><li class="clearfix">
                                <a href="<?php echo U('Index/detail', "aid=$list_company[id]");?>" class="left"><?php echo (subtext($list_company["title"],7)); ?></a>
                                
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                
                      </ul>
                    </div>
                    <!-- <div class="newsmain_lf_t clearfix" style="background: #797878;">
                    <div class="left newsmain_lf_t_lf">
                      <span class="news_big left">招商加盟</span>
                      <span class="news_small left">/ JOIN</span>
                      
                    </div>
                    
                  </div>
                     <div class="newsmain_lf_b" style="margin-bottom: 15px;">
                      <ul>
                        <li>
                          <a href="#">市场前景</a>
                        </li>
                        <li>
                          <a href="#">设立条件</a>
                        </li>
                        <li>
                          <a href="#">申请流程</a>
                        </li>
                        <li>
                          <a href="#">合作支持</a>
                        </li>
                      </ul>
                    </div> -->
                     <div class="newsmain_lf_img">
                      <!-- <img src="__ROOT__/statics/index/youhua/news_10.png" /> -->
                      <?php if($ad_list[3]['id'] != ''): ?><a href="<?php echo ($ad_list[3]['url']); ?>"><img src="__ROOT__/data/advert/<?php echo ($ad_list[3]['code']); ?>"  /></a>

                      <?php else: ?>
                      <img src="__ROOT__/statics/index/youhua/news_10.png" /><?php endif; ?>
                     </div>
                </div>
                </div>

                
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="news_rt_t">
                        <span>当前位置： ></span>
                        <a href="__ROOT__/">首页</a>
                        <span>></span>
                        <a href="<?php echo U('Index/cate', "cid=$cid");?>"><?php echo ($cateName); ?></a>

                    </div>
                    <div class="news_rt_b" style="padding: 0px 0px;border: none;">
                        <ul class="news_ul">
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li>
                                <a href="<?php echo U('Index/detail', "aid=$list[id]");?>" class="news_ul_tl"><?php echo ($list["title"]); ?></a>
                                <div class="news_ul_time">UPTATED:<?php echo ($list["add_time"]); ?></div>
                                <!-- <div class="news_ul_con">
                                    <?php echo ($list["abst"]); ?>
                                    <a href="<?php echo U('Index/detail', "aid=$list[id]");?>">[详情]</a>
                                </div> -->
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>   

                            
                        </ul>
                        <div class="page">
                        <?php echo ($page); ?>
                        </div>

                    </div>
                </div>
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