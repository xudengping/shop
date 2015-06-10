<?php

namespace Model;
use Think\Model;
//父类Model  ThinkPHP/Library/Think/Model.class.php
class UserModel extends Model{

    // 一次获得全部验证信息
    protected $patchValidate = true;
    
    // 通过重写父类属性_validate实现表单自动验证(静态方式)
    protected $_validate = array(
      //验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间])
     
       // 用户名必须填写
       array('username','require','用户名必须填写'),
       
       // 密码必须填写
       array('password','require','密码必须填写'),
       
       // 确认密码必须填写
        array('password2','require','确认密码必须填写'),
        
        // 确认密码和密码一致
        array('password','password2','与密码必须一致',0,'confirm'),
        
        //邮箱验证
        array('user_email','email','邮箱格式不正确',2),
        
        //验证qq
        //都是数字的、长度5-10位、 首位不为0
        //正则验证  /^[1-9]\d{4,9}$/
        array('user_qq','/^[1-9]\d{4,9}$/','qq格式不正确'),
        
         //学历，必须选择一个，值在2,3,4,5范围内即可
         array('user_xueli',"2,3,4,5",'必须选择一个学历',0,'in'),
         
          //爱好项目至少选择两项以上
          //callback利用当前model里边的一个指定方法进行验证
          array('user_hobby','check_hobby','爱好必须两项以上',1,'callback'),
         
    );
    
     //自定义方法验证爱好信息
     //$name = $_POST['user_hobby']
    function check_hobby($name){
        if(count($name)<2){
           return false;
        }else{
           return true;
        }
    
    }
    
}

