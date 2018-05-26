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
        <li class="active homepage"><a href="/tp_GeneralEducation/index.php/Home/Index/index/" target="_self">首页</a></li>
        <li class="annotion"><a href="/tp_GeneralEducation/index.php/Home/Index/anno/" target="_self">公告</a></li>
        <li class="download"><a href="/tp_GeneralEducation/index.php/Home/Index/download/" target="_self">资料下载</a></li>
        <li><a href="/tp_GeneralEducation/index.php/Home/Index/login/" target="_blank">登录</a></li>
    </ul>

    <div class="content">
        <div class="intro col-xs-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2" style="margin-bottom:20px;border-bottom:1px solid #ddd;">
            <p class="intro-title"><?php echo ($introRs["title"]); ?></p>
            <div class="intro-content">
                <?php echo ($introRs["des"]); ?>
            </div>
        </div>
        <div class="anno col-xs-4 col-md-4 col-lg-4">
            <h5 style="color:#a94442;font-weight:bold" class="anno-title">公告</h5>
            <div class="anno-content">
                <li title="<?php echo ($annoRs["title"]); ?>"><a href='<?php echo U("anno_content", array("id" => $annoRs["pk_sources"]));?>'><?php echo ($annoRs["title"]); ?></a><span style="float:right"><?php echo ($annoRs["ts"]); ?></span></li>
            </div>
            <a href="/tp_GeneralEducation/index.php/Home/Index/anno/" style="float:right;margin-top:10px;">查看更多</a>
        </div>
        <div class="data col-xs-8 col-md-8 col-lg-8">
            <h5  style="color:#a94442;font-weight:bold" class="data-title">资料下载</h5>
            <ul class="dataList clearfix">
                <?php if(is_array($dataList)): foreach($dataList as $key=>$list): ?><li title="<?php echo ($list["title"]); ?>"><a href='<?php echo U("down_file", array("savename" => $list["savename"]));?>'><?php echo ($list["title"]); ?></a><span style="float:right"><?php echo ($list["ts"]); ?></span></li><?php endforeach; endif; ?>
            </ul>
            <a href="/tp_GeneralEducation/index.php/Home/Index/download/" style="float:right;margin-top:10px">更多资料</a>
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