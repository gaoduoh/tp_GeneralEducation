<?php
namespace Home\Controller;
use Think\Controller;


class TeacherController extends Controller {
    public function index(){
        $this->userinfo = getTeaInfo();
        $this->display();
    }



    //myself code
    public function teacher_password(){
        $this->userinfo = getTeaInfo();
        $this->display();
    }
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
        if(!IS_POST){
            $this->username = getTeaInfo()['name'];
            $teacher_id = getTeaInfo()['pk_teacher'];
            $count = M('teaching as a')->join('ge_student as b')->join('ge_course as c')
                    ->field("b.number number,b.name name,b.class class,c.name course")->where("a.pk_course = c.pk_course and a.pk_teacher = '$teacher_id' and a.class=b.class")->count();
            $p = getpage($count,10);
            $list = M('teaching as a')->join('ge_student as b')->join('ge_course as c')
                    ->field("b.number number,b.name name,b.class class,c.name course")->where("a.pk_course = c.pk_course and a.pk_teacher = '$teacher_id' and a.class=b.class")->limit($p->firstRow, $p->listRows)->select();
            $this->assign('select', $list); // 赋值数据集
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $course = I("course");
            // echo "$course";
            $course_id = M('course') ->where("name = '$course'") ->select();
            $course_id = $course_id[0]['pk_course'];
            $teacher_id = getTeaInfo()['pk_teacher'];
            $count = M('teaching as a')->join('ge_student as b')->join('ge_course as c')
                    ->where("b.number number,b.name name,b.class class,c.name course")->where("a.pk_course = '$course_id' and c.pk_course = '$course_id' and a.pk_teacher = '$teacher_id' and a.class=b.class")->count();
            $p = getpage($count,10);
            $list = M('teaching as a')->join('ge_student as b')->join('ge_course as c')
                    ->field("b.number number,b.name name,b.class class,c.name course")->where("a.pk_course = '$course_id' and c.pk_course = '$course_id' and a.pk_teacher = '$teacher_id' and a.class=b.class")->limit($p->firstRow, $p->listRows)->select();
            $this->assign('select', $list); // 赋值数据集
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->assign('selected',$course);

            $this->display();
        
        }

    }

    public function add_course(){
        $course = I("addCourse");
        $course_id = M("course")->where("name = '$course'")->select();
        $course_id = $course_id[0]['pk_course'];
        $teacher_id = getTeaInfo()['pk_teacher'];
        $className = I('addClass');
        $class = M('student')->where("class='$className'")->select();
        if(count($class)>0){
            $data=array(
            'pk_teacher'=>$teacher_id,
            'pk_course'=>$course_id,
            'class'=>I('addClass'),    
            );
            //p($_POST);die;
            
            if(M('teaching')->add($data)){
                $this->success('添加成功',U('teacher_course'));
            }else {
                $this->error('添加失败');
            }
        }else{
             $this->error('查无该班级，请查询后再添加');
        }
        
    }

    public function teacher_upload(){
        $this->username = getTeaInfo()['name'];
        $teacher_id = getTeaInfo()['pk_teacher'];
        $count =M('sources')
                ->where("owner = '$teacher_id'")->count();
        $p = getpage($count,10);
        $list = M('sources')
                ->field(true)->where("owner = '$teacher_id'")->limit($p->firstRow, $p->listRows)->select();
        $this->assign('select', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display();
    }

    public function upload(){
         $teacher_id = getTeaInfo()['pk_teacher'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     31457280000 ;// 设置附件上传大小
        $upload->exts      =     array('doc', 'docx', 'xsl', 'xslx','ppt','pptx');// 设置附件上传类型
        $upload->rootPath  =     './Public/'; // 设置附件上传根目录
        $upload->savePath  =     'Data/'; // 设置附件上传（子）目录
        $upload->autoSub = false;
        $course = I('addData');
        $course = M("course")->where("name = '$course'")->select();
        $course_id = $course[0][pk_course];
        // 上传文件 
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功

            foreach($info as $file){
                $upload->saveName = ''; 
                $data=array(
                    'title'=>$file['name'],
                    'savename'=>$file['savename'],
                    'owner'=>$teacher_id,
                    'url'=>$file['savepath'],   
                    'type'=>'data', 
                    'course'=>$course_id,
                );
        
                if(M('sources')->add($data)){
                    $this->success('添加成功',U('teacher_upload'));
                }else {
                    $this->error('添加失败');
                }
            }
        }
    }

    public function delete_file(){
        $id=I("id");
        if(M('sources')->delete($id)){
            $this->success('删除成功',U('teacher_upload'));
        }else {
            $this->error('删除失败,请重试。。。');
        }
    }

    public function searchData(){
        $_POST['key'] = "%".$_POST['key']."%";
        $where['title'] = array('LIKE',$_POST['key']);
        $id = getTeaInfo()['pk_teacher'];
        $where['owner'] = $id;
        
        $list = M("sources")->where($where)->select();
        $count =M('sources')
                ->where($where)->count();
        $p = getpage($count,10);
         $this->assign('select', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display('teacher/teacher_upload');
    }

}