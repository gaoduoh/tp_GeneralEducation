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
        $id = getStuInfo()['pk_student'];
        $count =M('sources as a')->join('ge_student as b')->join('ge_teaching as c')
                ->field("a.url url,a.savename savename,a.title title")
                ->where("b.class=c.class and c.teacher=a.owner and b.pk_student = '$id' and c.course = a.course")->count();
                // echo "<script>alert($id);</script>";
        $p = getpage($count,10);
        $list = M('sources as a')->join('ge_student as b')->join('ge_teaching as c')
               ->field("a.url url,a.savename savename,a.title title")->where("b.class=c.class and c.teacher=a.owner and b.pk_student = '$id' and c.course = a.course")->limit($p->firstRow, $p->listRows)->select();
        $this->assign('select', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display();
    }

    public function down_file(){
        $filename = trim($_GET['savename']);
        $name = explode('.',$filename,2);
        downFile($name[0],$name[1]);
    }

}