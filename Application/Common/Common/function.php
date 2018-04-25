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

    //下载
    function downFile($filename,$filetype){
        $file_name =$filename.".".$filetype;
        echo "<script>alert('$file_name');</script>";
        //用以解决中文不能显示出来的问题
        $file_name=iconv("utf-8","gb2312",$file_name);
        $file_sub_path="./Public/Data/";
        $file_path=$file_sub_path.$file_name;
        echo "<script>alert('$file_path');</script>";
        //首先要判断给定的文件存在与否
        if(!file_exists($file_path)){
            echo "没有该文件";
            return ;
        }
        $fp=fopen($file_path,"r");
        $file_size=filesize($file_path);
        //下载文件需要用到的头
        Header("Content-type: application/octet-stream");
        Header("Accept-Ranges: bytes");
        Header("Accept-Length:".$file_size);
        Header("Content-Disposition: attachment; filename=".$file_name);
        $buffer=1024;
        $file_count=0;
        //向浏览器返回数据
        while(!feof($fp) && $file_count<$file_size){
            $file_con=fread($fp,$buffer);
            $file_count+=$buffer;
            echo $file_con;
        }
        fclose($fp);

    }



?>