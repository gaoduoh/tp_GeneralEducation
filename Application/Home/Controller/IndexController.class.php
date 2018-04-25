<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {

    public function index(){
        //学校概况
        $m = M('sources');
        $where = "pk_sources>0 and type='intro'";
        $count = $m->where($where)->count();
        $p = getpage($count,1);
        $list = $m->field(true)->where($where)->order('pk_sources')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('introList', $list); // 赋值数据集
        $this->assign('introPage', $p->show()); // 赋值分页输出

        //公告
        $m = M('sources');
        $where = "pk_sources>0 and type='anno'";
        $count = $m->where($where)->count();
        $p = getpage($count,1);
        $list = $m->field(true)->where($where)->order('pk_sources')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('annoList', $list); // 赋值数据集
        $this->assign('annoPage', $p->show()); // 赋值分页输出

        //公共资源
        $m = M('sources');
        $where = "pk_sources>0 and type='data' and owner='0'";
        $count = $m->where($where)->count();
        $p = getpage($count,1);
        $list = $m->field(true)->where($where)->order('pk_sources')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('dataList', $list); // 赋值数据集
        $this->assign('dataPage', $p->show()); // 赋值分页输出


        $this->display();
      }
 

    public function login()
    {
        $this->display();
    }

    public  function login_post()
    {
         // session_start();
         $user_name = I("user");
         $pwd = I("password");
         $student = M("student");
//        $user = M('user')->where($where)->find();
         $re_student = $student->where("number='$user_name' and password='$pwd'")->select();
         $teacher = M("teacher");
         $re_teacher = $teacher->where("number='$user_name' and password='$pwd'")->select();
         $admin = M("admin");
         $re_admin = $admin->where("name='$user_name' and password='$pwd'")->select();
         if( count($re_student) > 0 ) {
//             session_start();
            session("uid",$re_student[0]['pk_student']);
             $this->redirect("Student/index/");

         }else if(count($re_teacher) >0){
             session("uid",$re_teacher[0]['pk_teacher']);
             $this->redirect("Teacher/index/");
         }else if(count($re_admin) >0){
             session("uid",$re_admin[0]['pk_admin']);
             $this->redirect("Admin/index/");
         }else{
            $this->error("请确认帐号和密码！");
        }

    }

    public function loginout(){
        session(null);
        $this->success('退出成功！跳转中...',U('Index/index'));
    }

    public function down_file(){
        $filename = trim($_GET['savename']);
        $name = explode('.',$filename,2);
        downFile($name[0],$name[1]);
    }

}