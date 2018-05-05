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
    <ul class="nav nav-pills choose" style="background-color: #dff0d8">
        <li class=" homepage"><a href="/tp_GeneralEducation/index.php/Home/Index/index/" target="_self">首页</a></li>
        <li class="active annotion"><a href="/tp_GeneralEducation/index.php/Home/Index/anno/" target="_self">公告</a></li>
        <li class="download"><a href="/tp_GeneralEducation/index.php/Home/Index/download/" target="_self">资料下载</a></li>
        <li><a href="/tp_GeneralEducation/index.php/Home/Index/login/" target="_blank">登录</a></li>
    </ul>

    <div class="content clearfix">
        <a href = "/tp_GeneralEducation/index.php/Home/Index/anno/">返回公告列表</a>
        <div class="col-xs-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
            <h3><?php echo ($content["title"]); ?></h3>
            <div>
                <?php echo ($content["des"]); ?>
            </div>
        </div>

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

    });
</script>


</body>

</html>