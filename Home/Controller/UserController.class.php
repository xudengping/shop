<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {

     //用户登录
    public function login(){
      // 调用视图
      $this->display();
    }
    
    //登陆
    public function toLogin(){
        $user = new \Model\UserModel();
        if(!empty($_POST)){
            $condition['username'] = $_POST['username'];
            $condition['password'] = $_POST['password'];
            $data = $user->where($condition)->find();
           if($data){
              // 登录到个人主页
           }else{
              // 返回登录页面
               $this->error("用户名或者密码错误",U('User/login'));
           }
        }
    }
    
    // 跳转注册页面
    public function toRegister(){
      $this->display();
    }
    
    //用户注册
     function register(){
     
        $user = new \Model\UserModel();
        
        // 判断表单是否提交
        if(!empty($_POST)){
           if(!$user->create()){
              // 失败的信息
              show_bug($user->getError());
              // 跳转到注册页面
              $this->error('注册失败',U('User/toRegister'));
           }else{
              // 将user_hobby数组转变为以逗号分割的字符串
              $user->user_hobby = implode('',$_POST['user_hobby']);
              // 保存到数据库
              $rst = $user -> add();
              
              if($rst){
                  $this->success('注册成功',U('User/login'));
              }else{
                  $this -> error('注册失败',U('User/toRegister'));
              }
           }
        
        }
     
     }
    
    public function userList(){
        $this->display();
    }
}