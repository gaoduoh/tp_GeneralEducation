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

?>