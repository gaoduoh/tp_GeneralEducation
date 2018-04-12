<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>管理中心</title>
        <script src="/tp_GeneralEducation/Public/common/jquery.js" type="text/javascript"></script>
        <!-- <link href="https://cdn.bootcss.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->
        <link href="/tp_GeneralEducation/Public/common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="/tp_GeneralEducation/Public/common/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <script src="/tp_GeneralEducation/Public/common/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="/tp_GeneralEducation/Public/css/admin.css" rel="stylesheet" type="text/css" />
        <link href="/tp_GeneralEducation/Public/css/reset.css" rel="stylesheet" type="text/css" />
        <link href="/tp_GeneralEducation/Public/css/common.css" rel="stylesheet" type="text/css" />


    </head>

    <body>
        <div class="main clearfix">
            <div class="header clearfix">
                <img class="logo" src="/tp_GeneralEducation/Public/images/logo.png" />
                <p class="title">计算机通识教育<br />自主学习平台</p>
            </div>
            <div class="content clearfix">
                <p class="welcome"><a href="/tp_GeneralEducation/index.php/Home/Admin/../Index/index/">首页</a><span>&gt;&gt</span><span>admin，欢迎你！</span><a href="/tp_GeneralEducation/index.php/Home/Admin/../Index/loginout/">退出</a></p>
                <div class="function clearfix">
                    <div class="col-sm-3 col-xs-3 co-md-3 col-lg-3">
                        <p class="self">管理中心</p>
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Admin/index/">角色管理</a></li>
                            <li role="presentation" class="active"><a href="/tp_GeneralEducation/index.php/Home/Admin/admin_data/">资料管理</a></li>
                            <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Admin/admin_discuss/">问题管理</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9 col-xs-9 co-md-9 col-lg-9">
                        <p style="font-size:20px;font-weight: 900;color:#ff0000">此处实现管理员资料管理</p>
                    </div>
                </div>
            </div>
            <div class="footer"></div>
        </div>


    </body>

</html>