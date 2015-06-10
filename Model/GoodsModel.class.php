<?php

namespace Model;
use Think\Model;

class GoodsModel extends Model{
   // 新增数据库数据的时候允许写入的数据字段
   protected  $insertFields  = "name,keyword,brief,thumb,spec_array,list_img,model";
   
   // 修改的时候允许修改的字段
   protected $updateFields  = "keyword";
   
   //  静态方式自定义验证规则 只能作用于新增create方法时
   protected $_validate = array(
     // array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
     array("name","require","名称必须存在"),
     array("keyword","email","邮箱格式不对"),
     array("name","email","邮箱格式不对"),
   );
    
}

