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
    <link href="/tp_GeneralEducation/Public/css/teacher.css" rel="stylesheet" type="text/css" />
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
            <p class="welcome"><a href="/tp_GeneralEducation/index.php/Home/Teacher/../Index/index/">首页</a><span>&gt;&gt</span><span><span><?php echo ($userinfo["name"]); ?></span>老师，欢迎你！</span><a href="/tp_GeneralEducation/index.php/Home/Teacher/../Index/loginout/">退出</a></p>
            <div class="function clearfix">
                <div class="col-sm-3 col-xs-3 co-md-3 col-lg-3">
                    <p class="self">个人中心</p>
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation" class="active"><a href="/tp_GeneralEducation/index.php/Home/Teacher/index/">个人信息</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_password/">修改密码</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_course/">课程管理</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_homework/">作业管理</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_upload/">资料上传</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_discuss/">发布问题</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_test/">自主测试</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-xs-9 co-md-9 col-lg-9">
                    <div class="information">
                        <p><span>教工号：</span><span><?php echo ($userinfo["number"]); ?></span></p>
                        <p><span>姓名：</span><span><?php echo ($userinfo["name"]); ?></span></p>
                        <p><span>性别：</span><span><?php echo ($userinfo["sex"]); ?></span></p>
                        <p><span>邮箱：</span><span><?php echo ($userinfo["email"]); ?></span></p>
                        <p><span>联系方式：</span><span><?php echo ($userinfo["phone"]); ?></span></p>
                    </div>
                    <div class="fixInformation">修改信息</div>
                    <form method = "POST" class="changeInformation" style="display:none">
                        <div><label>教工号：</label><label><?php echo ($userinfo["number"]); ?></label></div>
                        <div><label>姓名：</label><label><?php echo ($userinfo["name"]); ?></label></div>
                        <div><label>性别：</label><input type="radio" name="sex" value="男" checked>男<input type="radio" name="sex" value="女">女</div>
                        <div><label>邮箱：</label><input name="email" value="<?php echo ($userinfo["email"]); ?>"/></div>
                        <div><label>联系方式：</label><input name="phone" value = "<?php echo ($userinfo["phone"]); ?>"/></div>
                        <button type="submit" name="submit">确认修改</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer"></div>
    </div>

    <script>
        $(document).ready(function(){
            $(".fixInformation").click(function(){
                $(this).css('display','none');
                $(".information").css('display','none');
                $(".changeInformation").css('display','block');
            });
        });
    </script>
    
</body>

</html>