<?php
namespace Home\Controller;
use Think\Controller;


class AdminController extends Controller {


	//myself code begin
	//展示教师
    public function index(){
	    $m = M('teacher');   
	    $where = "pk_teacher>0";
	    $count = $m->where($where)->count();
	    $p = getpage($count,10);
	    $list = $m->field(true)->where($where)->order('pk_teacher')->limit($p->firstRow, $p->listRows)->select();
	    $this->assign('select', $list); // 赋值数据集
	    $this->assign('page', $p->show()); // 赋值分页输出
	    $this->display();
    }
    //展示学生
    public function admin_user_stu(){
    	$m = M('student');   
	    $where = "pk_student>0";
	    $count = $m->where($where)->count();
	    $p = getpage($count,10);
	    $list = $m->field(true)->where($where)->order('pk_student')->limit($p->firstRow, $p->listRows)->select();
	    $this->assign('select', $list); // 赋值数据集
	    $this->assign('page', $p->show()); // 赋值分页输出
	    $this->display();
    }

    //删除角色
    public function user_delete_tea(){
    	$id=I("id");
    	if(M('teacher')->delete($id)){
    		$this->success('删除成功',U('index'));
    	}else {
    		$this->error('删除失败,请重试。。。');
    	}
    }
    public function user_delete_stu(){
    	$id=I("id");
    	if(M('student')->delete($id)){
    		$this->success('删除成功',U('admin_user_stu'));
    	}else {
    		$this->error('删除失败,请重试。。。');
    	}
    }


    //导入教师
    public function add_tea() {
    	ini_set('memory_limit','1024M');

		if (!empty($_FILES)) {

		$config = array(

		'exts' => array('xlsx','xls'),

		'maxSize' => 3145728000,

		'rootPath' =>"./Public/",

		'savePath' => 'Uploads/',

		'subName' => array('date','Ymd'),

		);

		$upload = new \Think\Upload($config);

		if (!$info = $upload->upload()) {

		$this->error($upload->getError());}

		vendor("PHPExcel.PHPExcel");

		$file_name=$upload->rootPath.$info['photo']['savepath'].$info['photo']['savename'];

		$extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));//判断导入表格后缀格式

		if ($extension == 'xlsx') {

		$objReader =\PHPExcel_IOFactory::createReader('Excel2007');

		$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');

		} else if ($extension == 'xls'){

		$objReader =\PHPExcel_IOFactory::createReader('Excel5');

		$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');

		}

		$sheet =$objPHPExcel->getSheet(0);

		$highestRow = $sheet->getHighestRow();//取得总行数

		$highestColumn =$sheet->getHighestColumn(); //取得总列数

		for ($i = 2; $i <= $highestRow; $i++) {

		//看这里看这里,前面小写的a是表中的字段名，后面的大写A是excel中位置

		$data['number'] =$objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue();

		$data['name'] =$objPHPExcel->getActiveSheet()->getCell("B" .$i)->getValue();

		$data['password'] =$objPHPExcel->getActiveSheet()->getCell("C" .$i)->getValue();

		//看这里看这里,这个位置写数据库中的表名

		M('teacher')->add($data);

		}

		$this->success('导入成功!');

		} else {

		$this->error("请选择上传的文件");

		}
    }


    //导入学生
    public function add_stu() {
    	ini_set('memory_limit','1024M');
    	
		if (!empty($_FILES)) {

		$config = array(

		'exts' => array('xlsx','xls'),

		'maxSize' => 3145728000,

		'rootPath' =>"./Public/",

		'savePath' => 'Uploads/',

		'subName' => array('date','Ymd'),

		);

		$upload = new \Think\Upload($config);

		if (!$info = $upload->upload()) {

		$this->error($upload->getError());}

		vendor("PHPExcel.PHPExcel");

		$file_name=$upload->rootPath.$info['photo']['savepath'].$info['photo']['savename'];

		$extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));//判断导入表格后缀格式

		if ($extension == 'xlsx') {

		$objReader =\PHPExcel_IOFactory::createReader('Excel2007');

		$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');

		} else if ($extension == 'xls'){

		$objReader =\PHPExcel_IOFactory::createReader('Excel5');

		$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');

		}

		$sheet =$objPHPExcel->getSheet(0);

		$highestRow = $sheet->getHighestRow();//取得总行数

		$highestColumn =$sheet->getHighestColumn(); //取得总列数

		for ($i = 2; $i <= $highestRow; $i++) {

		//看这里看这里,前面小写的a是表中的字段名，后面的大写A是excel中位置

		$data['number'] =$objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue();

		$data['name'] =$objPHPExcel->getActiveSheet()->getCell("B" .$i)->getValue();

		$data['college'] =$objPHPExcel->getActiveSheet()->getCell("C" .$i)->getValue();

		$data['class'] = $objPHPExcel->getActiveSheet()->getCell("D". $i)->getValue();

		$data['password'] =$objPHPExcel->getActiveSheet()->getCell("E" .$i)->getValue();

		//看这里看这里,这个位置写数据库中的表名

		M('student')->add($data);

		}

		$this->success('导入成功!');

		} else {

		$this->error("请选择上传的文件");

		}
    }

    //下载导入模板
    public function file_tea(){
        $filename="teacherDemo.xls";
        // echo "<script>alert($filename);</script>";
        $name = explode('.',$filename,2);
        downFile($name[0],$name[1]);
    }
    public function file_stu(){
        $filename="studentDemo.xlsx";
        // echo "<script>alert($filename);</script>";
        $name = explode('.',$filename,2);
        downFile($name[0],$name[1]);
    }

    //资源页
    public function admin_data(){
        if(!IS_POST){
            $count =M('sources')
                ->where("owner = '0'")->count();
            $p = getpage($count,10);
            $list = M('sources')
                    ->field(true)->where("owner = '0'")->limit($p->firstRow, $p->listRows)->select();
            $this->assign('select', $list); // 赋值数据集
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }else{
            $data = I('data');
            $count =M('sources')
                ->where("owner = '0' and type = '$data'")->count();
            $p = getpage($count,10);
            $list = M('sources')
                    ->field(true)->where("owner = '0' and type = '$data'")->limit($p->firstRow, $p->listRows)->select();
            $this->assign('select', $list); // 赋值数据集
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->assign('selected',$data);
            $this->display();
        }
    }
        


    //上传资源
    public function upload_sources(){
        $type = I("type");
        $file = I("load");
        if($type=="公共资源"){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     31457280000 ;// 设置附件上传大小
            $upload->exts      =     array('doc', 'docx', 'xsl', 'xslx','ppt','pptx');// 设置附件上传类型
            $upload->rootPath  =     './Public/'; // 设置附件上传根目录
            $upload->savePath  =     'Data/'; // 设置附件上传（子）目录
            $upload->autoSub = false;
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
                        'owner'=> '0',
                        'url'=>$file['savepath'],
                        'type'=>'公共资源',
                    );

                    if(M('sources')->add($data)){
                        $this->success('添加成功',U('admin_data'));
                    }else {
                        $this->error('添加失败');
                    }
                }
            }
        }else{
            $data=array(
//                'title'=>$file['name'],
//                'savename'=>$file['savename'],
                'owner'=> '0',
//                'url'=>$file['savepath'],
                'type'=>$type,
                'des' =>I("des"),
                'title' =>I('title'),
            );

            if(M('sources')->add($data)){
                $this->success('添加成功',U('admin_data'));
            }else {
                $this->error('添加失败');
            }
        }
    }

    //删除资源
    public function delete_file(){
        $id=I("id");
        if(M('sources')->delete($id)){
            $this->success('删除成功',U('teacher_upload'));
        }else {
            $this->error('删除失败,请重试。。。');
        }
    }

    //my code end
}