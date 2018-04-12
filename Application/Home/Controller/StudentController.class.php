<?php
namespace Home\Controller;
use Think\Controller;


class StudentController extends Controller {
    public function index(){
        $this->userinfo = getStuInfo();
        $this->display();
    }

    public function student_download(){
        $this->username = getStuInfo()['name'];


        $this->display();
    }

}