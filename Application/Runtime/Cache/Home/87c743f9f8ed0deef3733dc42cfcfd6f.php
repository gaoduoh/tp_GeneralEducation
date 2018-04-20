<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
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
        <link href="/tp_GeneralEducation/Public/css/reset.css" rel="stylesheet" type="text/css" />
        <link href="/tp_GeneralEducation/Public/css/common.css" rel="stylesheet" type="text/css" />
        <link href="/tp_GeneralEducation/Public/css/admin.css" rel="stylesheet" type="text/css" />

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
                            <li role="presentation" class="active"><a href="/tp_GeneralEducation/index.php/Home/Admin/index/">角色管理</a></li>
                            <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Admin/admin_data/">资料管理</a></li>
                            <li role="presentation"><a href="/tp_GeneralEducation/index.php/Home/Admin/admin_discuss/">问题管理</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9 col-xs-9 co-md-9 col-lg-9">
                        <ul class="user-tab clearfix">
                            <li style="background-color:#A89C6B;color:#FFFFFF"><a href="/tp_GeneralEducation/index.php/Home/Admin/index/">教师管理</a></li>
                            <li><a href="admin_user_stu.php">学生管理</a></li>

                        </ul>
                        
                        <div class="user-show clearfix">
                            <table class="table">
                              <tr>
                                <td>学号</td>
                                <td>姓名</td>
                                <td>学院</td>
                                <td>班级</td>
                                <td></td>
                              </tr>
                              <?php if(is_array($select)): foreach($select as $key=>$user): ?><tr>
                                    <td> <?php echo ($user["number"]); ?></td>
                                    <td> <?php echo ($user["name"]); ?></td>
                                    <td> <?php echo ($user["college"]); ?></td>
                                    <td> <?php echo ($user["class"]); ?></td>
                                    <td class="user-delete"><a href='<?php echo U("user_delete_stu", array("id" => $user["pk_student"]));?>'>删除</a></td>
                                </tr><?php endforeach; endif; ?>
                            </table>
                            <div class="pages"><?php echo ($page); ?></div>
                        </div>
                        <div class="user-add">
                            <button class="btn btn-default" data-toggle="modal" data-target="#myModal"  style="float:right;margin-bottom:10px;">添加学生</button>
                            <div class="modal fade user-add-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">添加学生</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>须知：请根据模板将角色信息填入excel表格中再上传导入，点此下载模板</p>
                                        <form class="user-add-form clearfix" action="<?php echo U('add_stu');?>" enctype="multipart/form-data" method="post">
                                            <input type="file" name="photo" />

                                            <input type="submit" value="导入数据">
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer"></div>
        </div>


    

    </body>

</html>