<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人中心</title>
    <script src="/tp_GeneralEducation/Public/common/jquery.js" type="text/javascript"></script>
    <!-- <link href="https://cdn.bootcss.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->
    <link href="/tp_GeneralEducation/Public/common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/tp_GeneralEducation/Public/common/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <script src="/tp_GeneralEducation/Public/common/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="/tp_GeneralEducation/Public/css/student.css" rel="stylesheet" type="text/css" />
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
            <p class="welcome"><a href="/tp_GeneralEducation/index.php/Home/Student/../Index/index/">首页</a><span>&gt;&gt</span><span><span><?php echo ($userinfo["name"]); ?></span>同学，欢迎你！</span><a href="/tp_GeneralEducation/index.php/Home/Student/../Index/loginout/">退出</a></p>
            <div class="function clearfix">
                <div class="col-sm-3 col-xs-3 co-md-3 col-lg-3">
                    <p class="self">个人中心</p>
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Student/index/">个人信息</a></li>
                    <li role="presentation" class="active"><a href="/tp_GeneralEducation/index.php/Home/Student/student_password/">修改密码</a></li>
                    <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Student/student_homework/">作业管理</a></li>
                    <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Student/student_download/">资料下载</a></li>
                    <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Student/student_discuss/">问题讨论</a></li>
                    <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Student/student_test/">自测系统</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-xs-9 co-md-9 col-lg-9">
                    <form class="changePassword" method="POST" action="/tp_GeneralEducation/index.php/Home/Student/post_password/">
                        <div><label>原密码：</label><input name="old" type="password" /></div>
                        <div><label>新密码：</label><input name="new" type="password" /></div>
                        <div><label>确认密码：</label><input name="repeat" type="password" /></div>
                        <button type="submit" name="submit" style="margin:10px;auto"/>确认修改</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer"></div>
    </div>

    
</body>

</html>