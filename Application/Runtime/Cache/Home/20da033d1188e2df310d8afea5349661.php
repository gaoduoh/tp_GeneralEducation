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
            <p class="welcome"><a href="/tp_GeneralEducation/index.php/Home/Teacher/../Index/index/">首页</a><span>&gt;&gt</span><span><span><?php echo ($username); ?></span>老师，欢迎你！</span><a href="/tp_GeneralEducation/index.php/Home/Teacher/../Index/loginout/">退出</a></p>
            <div class="function clearfix">
                <div class="col-sm-3 col-xs-3 co-md-3 col-lg-3">
                    <p class="self">个人中心</p>
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/index/">个人信息</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_password/">修改密码</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_course/">课程管理</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_homework/">作业管理</a></li>
                        <li role="presentation" class="active"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_upload/">资料上传</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_discuss/">发布问题</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_test/">自主测试</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-xs-9 co-md-9 col-lg-9">
                    <div class="data-add">
                            <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal"  style="float:right;margin-bottom:10px;">添加资料</button>
                            <div class="modal fade course-add-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">添加资料</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/tp_GeneralEducation/index.php/Home/Teacher/upload" enctype="multipart/form-data" method="post" >
                                            <input type="file" name="photo" />
                                            <input type="submit" value="提交" >
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <ul class="dataList clearfix">
                          <?php if(is_array($select)): foreach($select as $key=>$list): ?><li><a href="<?php echo ($list["url"]); ?>"><?php echo ($list["title"]); ?></a><a href='<?php echo U("delete_file", array("id" => $list["pk_sources"]));?>'>删除</a></li><?php endforeach; endif; ?>
                        </ul>
                        <div class="pages"><?php echo ($page); ?></div>
                </div>
            </div>
        </div>
        <div class="footer"></div>
    </div>

    
</body>

</html>