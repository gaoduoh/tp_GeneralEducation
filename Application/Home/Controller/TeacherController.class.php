<?php
namespace Home\Controller;
use Think\Controller;


class TeacherController extends Controller {
    public function index(){
        $this->userinfo = getTeaInfo();
        $this->display();
    }
}