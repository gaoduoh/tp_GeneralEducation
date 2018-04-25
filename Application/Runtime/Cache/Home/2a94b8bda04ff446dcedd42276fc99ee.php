<?php if (!defined('THINK_PATH')) exit(); session_start(); include('conn.php'); ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>华侨大学计算机通识教育自主学习平台</title>
    <script src="/tp_GeneralEducation/Public/common/jquery.js" type="text/javascript"></script>
    <!-- <link href="https://cdn.bootcss.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->
    <link href="/tp_GeneralEducation/Public/common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/tp_GeneralEducation/Public/common/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="/tp_GeneralEducation/Public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="/tp_GeneralEducation/Public/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/tp_GeneralEducation/Public/css/indexAndlogin.css" rel="stylesheet" type="text/css" />


</head>

<body>

<div class="main clearfix">
    <div class="header clearfix">
        <img class="logo" src="/tp_GeneralEducation/Public/images/logo.png" />
        <p class="title">计算机通识教育<br />自主学习平台</p>
    </div>
    <ul class="nav nav-pills choose">
        <li class="active homepage"><a href="#">首页</a></li>
        <li class="introduce"><a href="#">学校概况</a></li>
        <li class="annotion"><a href="#">公告</a></li>
        <li class="download"><a href="#">资料下载</a></li>
        <li><a href="/tp_GeneralEducation/index.php/Home/Index/login/" target="_blank">登录</a></li>
    </ul>

    <div class="content">
        <div class="intro col-xs-4 col-md-4 col-lg-4">
            <h4>学院概况</h4>
            <?php if(is_array($introList)): foreach($introList as $key=>$list): ?><div><?php echo ($list["des"]); ?></div><?php endforeach; endif; ?>
            <div class="pages"><?php echo ($introPage); ?></div>
        </div>
        <div class="anno col-xs-4 col-md-4 col-lg-4">
            <h4>公告</h4>
            <?php if(is_array($annoList)): foreach($annoList as $key=>$list): ?><div><?php echo ($list["des"]); ?></div><?php endforeach; endif; ?>
            <div class="pages"><?php echo ($annoPage); ?></div>
        </div>
        <div class="data col-xs-4 col-md-4 col-lg-4">
            <h4>公共资源下载</h4>
            <ul class="dataList clearfix">
                <?php if(is_array($dataList)): foreach($dataList as $key=>$list): ?><li><a href='<?php echo U("down_file", array("savename" => $list["savename"]));?>'><?php echo ($list["title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
            <div class="pages"><?php echo ($dataPage); ?></div>
        </div>
    </div>
    <!--<div class="footer">页脚内容</div>-->
</div>

<script>
    $(document).ready(function(){
        $(".choose li").click(function(){
            $(".choose li").removeClass("active");
            $(this).addClass("active");
        });
        $(".homepage").click(function(){
            $(".intro").css('display','block');
            $(".anno").css('display','block');
            $(".data").css('display','block');
        });
        $(".introduce").click(function(){
            $(".intro").css('display','block');
            $(".anno").css('display','none');
            $(".data").css('display','none');
        });
        $(".annotion").click(function(){
            $(".intro").css('display','none');
            $(".anno").css('display','block');
            $(".data").css('display','none');
        });
        $(".download").click(function(){
            $(".intro").css('display','none');
            $(".anno").css('display','none');
            $(".data").css('display','block');
        });
    });
</script>


</body>

</html>