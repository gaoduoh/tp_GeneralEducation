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
                            <li><a href="admin_user_tea.php">教师管理</a></li>
                            <li  style="background-color:#A89C6B;color:#FFFFFF"><a href="admin_user_stu.php">学生管理</a></li>

                        </ul>
                        
                        <div class="user-show clearfix">
                            <?php
 $pagesize=10; $teacher_res=mysqli_query($conn,"Select count(*) from ge_teacher"); $teacher_myrow = mysqli_fetch_array($teacher_res); $teacher_numrows=$teacher_myrow[0]; $teacher_pages=intval($teacher_numrows/$pagesize); if ($teacher_numrows%$pagesize) $teacher_pages++; if (isset($_GET['teacher_page'])){ $teacher_page = $_GET['teacher_page']; }else{ $teacher_page = 1; } if($teacher_page<1){ $teacher_page = 1; } if($teacher_page>=$teacher_pages){ $teacher_page = $teacher_pages; } $teacher_offset=$pagesize*($teacher_page-1); $teacher_res=mysqli_query($conn,"Select * from ge_teacher limit $teacher_offset,$pagesize"); if ($teacher_myrow = mysqli_fetch_array($teacher_res)) { $i=0; ?>
                            <table class="table user-table">
                                <tr bgcolor="#6b8ba8" style="color:#FFFFFF">
                                    <td >工号</td>
                                    <td>姓名</td>
                                    <td></td>

                                </tr>
                                <?php
 do { $i++; ?>
                                    <tr>
                                        <td><?php  echo $teacher_myrow['number'];?> </td>
                                        <td><?php  echo $teacher_myrow['name'];?> </td>
                                        <td><a class="user-del" href="delete.php?teacher_id=<?php echo $teacher_myrow['pk_teacher'] ?>" >删除</a></td>
                                    </tr>
                                    <?php
 } while ($teacher_myrow = mysqli_fetch_array($teacher_res)); echo "</table>" ; } echo "<div   align='center'>共有".$teacher_pages."页(".$teacher_page."/".$teacher_pages.")<br>"; echo "<form   action='admin_user_tea.php'   method='get'>"; $first=1; $prev=$teacher_page-1; $next=$teacher_page+1; $last=$teacher_pages; echo "<a href='admin_user_tea.php?teacher_page=".$first."'>首页</a> "; echo "<a href='admin_user_tea.php?teacher_page=".$prev."'>上一页</a>"; echo "<a href='admin_user_tea.php?teacher_page=".$next."'>下一页</a>"; echo "<a href='admin_user_tea.php?teacher_page=".$last."'>尾页</a>"; echo "</form>"; echo "</div>"; ?>
                            

                            <div class="user-add clearfix" style="position: relative;">
                                <button class="user-add-bn">添加教师</button>
                                <div class="user-add-bl">
                                    
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