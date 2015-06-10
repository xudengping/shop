<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {

     //用户登录
    public function login(){
      // 调用视图
      $this->display();
    }
    
    // 跳转注册页面
    public function toRegister(){
      $this->display();
    }
    
    //用户注册
     function register(){
        echo "register begin";
     
        $user = new \Model\UserModel();
        
        // 判断表单是否提交
        if(!empty($_POST)){
           if(!$user->create()){
              // 失败的信息
              show_bug($user->getError());
           }else{
              // 将user_hobby数组转变为以逗号分割的字符串
              $user->user_hobby = implode('',$_POST['user_hobby']);
              // 保存到数据库
              $rst = $user -> add();
              
              if($rst){
                  $this->success('注册成功',U('Index\index'));
              }else{
                  $this -> error('注册失败',U('Index/index'));
              }
           }
        
        }
     
     }
    
    public function userList(){
        $this->display();
    }
}