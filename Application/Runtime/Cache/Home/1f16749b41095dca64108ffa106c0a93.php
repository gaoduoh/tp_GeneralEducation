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
                        <form class="search-form" name="search" method="post" action="/tp_GeneralEducation/index.php/Home/Admin/admin_data/">
                        <label>资料查询：</label>
                        <select name="data">
                            <option value="公共资源" <?php if(($selected) == "公共资源"): ?>selected<?php endif; ?>>公共资源</option>
                            <option value="公告" <?php if(($selected) == "公告"): ?>selected<?php endif; ?>>公告</option>
                            <option value="平台概况" <?php if(($selected) == "平台概况"): ?>selected<?php endif; ?>>平台概况</option>
                        </select>
                        <input type="submit" name="submit" class="search" value="查询" />
                    </form>
                        <div class="data-add">
                            <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal"  style="float:right;margin-bottom:10px;">添加资料</button>
                            <div class="modal fade data-add-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">添加资料</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="data-add-form" action="/tp_GeneralEducation/index.php/Home/Admin/upload_sources/" enctype="multipart/form-data" name="data" method="POST">
                                            <div class="form-group">
                                                <label>选择提交类型</label>
                                                <select name="type">
                                                    <option value="公共资源">公共资源</option>
                                                    <option value="平台概况">平台概况</option>
                                                    <option value="公告">公告</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>资源上传：</label>
                                                <input type="file" name="load"  style="margin-top:0"/>
                                            </div>
                                            <div class="form-group">
                                                <label>标题：</label>
                                                <input type="text" name="title" />
                                            </div>
                                            <div class="form-group">
                                                <label>描述：</label>
                                                <textarea name="des" style="width:80%;height:100px;"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-default">提交</button>

                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <table class="dataTable clearfix table">
                            <tr>
                                <td style="width:15%">类型</td>
                                <td style="width:20%">标题</td>
                                <td>描述</td>
                                <td style="width:10%"></td>
                            </tr>
                          <?php if(is_array($select)): foreach($select as $key=>$list): ?><tr>
                                <td style="width:15%"><?php echo ($list["type"]); ?></td>
                                <td style="width:20%"><?php echo ($list["title"]); ?></td>
                                <td><?php echo ($list["des"]); ?></td>
                                <td style="width:10%"><a href='<?php echo U("delete_file", array("id" => $list["pk_sources"]));?>'>删除</a></td>
                                
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