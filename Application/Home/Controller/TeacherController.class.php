<?php
namespace Home\Controller;
use Think\Controller;


class TeacherController extends Controller {
    public function index(){
        $this->userinfo = getTeaInfo();
        $this->display();
    }



    //myself code
    public function post_info(){
    	if(!IS_POST) $this->error('页面不存在');
        $data=array(
            'sex'=>I('sex'),
            'email'=>I('email'),
            'phone'=>I('phone'),    
        );
        //p($_POST);die;
        $where=array('pk_teacher'=>session('uid'));
        if(M('teacher')->where($where)->save($data)){
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
        $cor = getTeaInfo()['password'];
        if($old!=$cor){
            $this->error('原密码不正确');
        }else if($new!=$repeat){
            $this->error('两次输入的新密码不一致');
        }else{
            $data = array('password' => $new);
            $where = array('pk_teacher' => session('uid'));
            if(M('teacher')->where($where)->save($data)){
                $this->success('修改成功',U('Index/login/'));
            }else{
                $this->error('修改失败');
            }
            
        }
    }

    public function teacher_course(){
        $this->username = getTeaInfo()['name'];
        $teacher_id = getTeaInfo()['pk_teacher'];
        $count = M('teaching as a')->join('ge_student as b')->join('ge_course as c')
                ->where("b.number number,b.name name,b.class class,c.name course")->where("a.course = c.pk_course and a.teacher = '$teacher_id' and a.class=b.class")->count();
        $p = getpage($count,10);
        $list = M('teaching as a')->join('ge_student as b')->join('ge_course as c')
                ->field("b.number number,b.name name,b.class class,c.name course")->where("a.course = c.pk_course and a.teacher = '$teacher_id' and a.class=b.class")->limit($p->firstRow, $p->listRows)->select();
        $this->assign('select', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display();
    }

    public function post_search(){
        if(!IS_POST) $this->error('页面不存在');
        $course = I("course");
        $course_id = M('course') ->where("name = '$course'") ->select();
        $course_id = $course_id[0]['pk_course'];
        $teacher_id = getTeaInfo()['pk_teacher'];
        $count = M('teaching as a')->join('ge_student as b')->join('ge_course as c')
                ->where("b.number number,b.name name,b.class class,c.name course")->where("a.course = '$course_id' and a.teacher = '$teacher_id' and a.class=b.class")->count();
        $p = getpage($count,10);
        $list = M('teaching as a')->join('ge_student as b')->join('ge_course as c')
                ->field("b.number number,b.name name,b.class class,c.name course")->where("a.course = '$course_id' and a.teacher = '$teacher_id' and a.class=b.class")->limit($p->firstRow, $p->listRows)->select();
        $this->assign('select', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->list = $list; 
    }

    public function add_course(){
        $course = I("addCourse");
        $course_id = M("course")->where("name = '$course'")->select();
        $course_id = $course_id[0]['pk_course'];
        $teacher_id = getTeaInfo()['pk_teacher'];
        $data=array(
            'teacher'=>$teacher_id,
            'course'=>$course_id,
            'class'=>I('addClass'),    
        );
        //p($_POST);die;
        
        if(M('teaching')->add($data)){
            $this->success('添加成功',U('teacher_course'));
        }else {
            $this->error('添加失败');
        }
    }

}