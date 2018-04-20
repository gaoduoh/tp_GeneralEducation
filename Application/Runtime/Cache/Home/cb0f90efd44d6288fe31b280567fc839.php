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
                        <li role="presentation" class="active"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_course/">课程管理</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_homework/">作业管理</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_upload/">资料上传</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_discuss/">发布问题</a></li>
                        <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Teacher/teacher_test/">自主测试</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-xs-9 co-md-9 col-lg-9">
                    <form class="search-form" name="search" method="post">
                        <label>学生课程查询：</label>
                        <select name="course">
                            <option value="高级语言程序设计">高级语言程序设计</option>
                            <option value="互联网+">互联网+</option>
                            <option value="信息技术应用">信息技术应用</option>
                        </select>
                        <input type="submit" name="submit" value="查询" />
                    </form>
                    <div class="course-add">
                            <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal"  style="float:right;margin-bottom:10px;">添加课程</button>
                            <div class="modal fade course-add-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">添加课程</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="add-form" name="addcourse" action="/tp_GeneralEducation/index.php/Home/Teacher/add_course/" method="post">
                                            <label>选择添加的课程</label>
                                            <select name="addCourse">
                                                <option value="高级语言程序设计">高级语言程序设计</option>
                                                <option value="互联网+">互联网+</option>
                                                <option value="信息技术应用">信息技术应用</option>
                                            </select>
                                            <br />
                                            <label>输入添加班级：</label>
                                            <input type="text" name="addClass"/>
                                            <br />
                                            <input type="submit" name="addsubmit" value="添加" />
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <table class="table">
                          <tr>
                            <td >学号</td>
                            <td>姓名</td>
                            <td>班级</td>
                            <td>课程名称</td>
                          </tr>
                          <?php if(is_array($select)): foreach($select as $key=>$user): ?><tr>
                                <td> <?php echo ($user["number"]); ?></td>
                                <td> <?php echo ($user["name"]); ?></td>
                                <td> <?php echo ($user["class"]); ?></td>
                                <td> <?php echo ($user["course"]); ?></td>
                            </tr><?php endforeach; endif; ?>
                        </table>
                        <div class="pages"><?php echo ($page); ?></div>
                </div>
            </div>
        </div>
        <div class="footer"></div>
    </div>

    
</body>

</html>