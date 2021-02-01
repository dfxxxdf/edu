<?php
namespace app\index\controller;
class User extends Base
{
  public function login(){
    return $this->view->fetch();
  }
  //验证登陆
  public function checkLogin(){
  }
  //退出登陆
  public function logout(){

  }
}
