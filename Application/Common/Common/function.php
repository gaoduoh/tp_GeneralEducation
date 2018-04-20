<?php

	function getStuInfo(){
		$uid = $_SESSION['uid'];
       // echo "<script>alert($uid);</script>";

        //读取用户个人信息
        $where = array('pk_student' => $uid);
        $field = 'truename,face50,face80,style';
        $userinfo = M('student')->where($where)->find();
        return $userinfo;
	}

	function getTeaInfo(){
		$uid = $_SESSION['uid'];
       // echo "<script>alert($uid);</script>";

        //读取用户个人信息
        $where = array('pk_teacher' => $uid);
        $field = 'truename,face50,face80,style';
        $userinfo = M('teacher')->where($where)->find();
        return $userinfo;
	}

    //分页
    function getpage($count, $pagesize) {
        $p = new Think\Page($count, $pagesize);
        $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '末页');
        $p->setConfig('first', '首页');
        $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $p->lastSuffix = false;//最后一页不显示为总页数
        return $p;
    }

?>