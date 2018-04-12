<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>登陆</title>
    <script src="common/jquery.js" type="text/javascript"></script>
    <!-- <link href="https://cdn.bootcss.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet"/>
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->
    <link href="/tp_GeneralEducation/Public/common/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/tp_GeneralEducation/Public/common/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="/tp_GeneralEducation/Public/css/reset.css" rel="stylesheet" type="text/css" />
    <!--<link href="../../../Public/css/common.css" rel="stylesheet" type="text/css" />-->
    <link href="/tp_GeneralEducation/Public/css/indexAndlogin.css" rel="stylesheet" type="text/css" />


</head>

<body>
<div class="login">
    <form class="form-inline" role="form" method="post" action="/tp_GeneralEducation/index.php/Home/Index/login_post/">
        <div class="form-group">
            <label  for="user-login">用户名</label>
            <input type="text" name="user" class="form-control" id="user-login">
        </div>
        <div class="form-group">
            <label  for="pwd-login">密码</label>
            <input type="password" name="password" class="form-control" id="pwd-login">
        </div>
        <button type="submit" name="submit" class="btn btn-default">登陆</button>
    </form>
</div>


</body>
</html>