<?php
namespace Home\Controller;
use Think\
Controller;
class GoodsController extends Controller {
	
	public function showList() {
		//$goods = new \Model\GoodsModel();
		$goods = M ( "Goods" );
		$info = $goods->select ();
		//show_bug ( $info );
		$this->assign ( "info", $info );
		$this->display ();
	}
	
	public function add1() {
		// 创建数据模型
		//$goods = new \Model\GoodsModel();
		$goods = D("Goods");
		// 创建数据源
		$data['name'] = "苹果13";
		$data['keyword'] = "苹果";
		$data['brief'] = "8";
		$data['descript'] = "descript";
		$data['thumb'] = "8";
		$data['spec_array'] = "8";
		$data['list_img'] = "8";
		$data['model'] = "8";
		
		
		// 创建数据对象保存到内存中
//		$res = $goods->field("name,keyword,brief,thumb,spec_array,list_img,model")->create($data);
		$res = $goods->create($data);
		var_dump($res);
		// 写入到是数据库
		// 返回主键值
		$res = $goods->add($res);
		var_dump($res);
	}
	
     public function add2() {
		// 创建数据模型
		$goods = new \Model\GoodsModel();
		// 创建数据源
		$dataList[] = array('name'=>'香蕉1','keyword'=>'香蕉','brief'=>'0','descript'=>'descript','thumb'=>'0','spec_array'=>'0','list_img'=>'0','model'=>'0');
		$dataList[] = array('name'=>'香蕉2','keyword'=>'香蕉','brief'=>'0','descript'=>'descript','thumb'=>'0','spec_array'=>'0','list_img'=>'0','model'=>'0');
		
		// 批量保存
		$res = $goods->addAll($dataList);
		var_dump($res);
	}
	
	 public function add() {
	    $goods = new \Model\GoodsModel();
	    $data = array('name'=>'sddsdd','keyword'=>'1436445152qq.com','brief'=>'0','descript'=>'descript','thumb'=>'0','spec_array'=>'0','list_img'=>'0','model'=>'0');
        $cre = $goods->create($data);
        var_dump($cre);
	    if(!$cre){
           echo $goods->getError();
        }else{
           $goods->add($cre);
        }
        
	 }
	
	public function update() {
	    $goods = M('Goods');
	    // 查找主键为1的数据
	    $goods->find(2);
	   // var_dump($goods);
	   //  修改数据对象
	   $goods->name = '';
	   if(!$res){
	   echo "hahha";
	      echo $goods->getError();
	   }else{
	    // 保存当前数据对象
	     $goods->save();
	   }
	  
	   
	   
	
	}
	
	public function del() {
	    $goods = M('Goods');
	    $goods->find(1);
	    $goods->delete();
	}
}