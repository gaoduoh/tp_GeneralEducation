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


    //导入教师
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

    //my code end
}