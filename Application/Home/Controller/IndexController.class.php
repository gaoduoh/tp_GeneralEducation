<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {

    public function index(){

         $this->display();
      }
 

    public function login()
    {
        $this->display();
    }

    public  function login_post()
    {
         session_start();
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

}