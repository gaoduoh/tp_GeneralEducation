<?php
namespace Home\Controller;
use Think\Controller;


class StudentController extends Controller {
    public function index(){
        $this->userinfo = getStuInfo();
        $this->display();
    }



    // myself code
    public function post_info(){
    	if(!IS_POST) $this->error('页面不存在');
        $data=array(
            'sex'=>I('sex'),
            'email'=>I('email'),
            'phone'=>I('phone'),    
        );
        //p($_POST);die;
        $where=array('pk_student'=>session('uid'));
        if(M('student')->where($where)->save($data)){
            $this->success('修改成功',U('index'));
        }else {
            $this->error('修改失败');
        }
    }

    public function post_password(){
        if(!IS_POST) $this->error('页面不存在');
        $old = I("old");
        $new = I("new");
        $repeat = I("repeat");
        $cor = getStuInfo()['password'];
        if($old!=$cor){
            $this->error('原密码不正确');
        }else if($new!=$repeat){
            $this->error('两次输入的新密码不一致');
        }else{
            $data = array('password' => $new);
            $where = array('pk_student' => session('uid'));
            if(M('student')->where($where)->save($data)){
                $this->success('修改成功',U('Index/login/'));
            }else{
                $this->error('修改失败');
            }
            
        }
    }

    public function student_download(){
        $this->username = getStuInfo()['name'];


        $this->display();
    }

}