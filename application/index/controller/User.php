<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
class User extends Base
{
  public function login(){
    return $this->view->fetch();
  }
  /**
   * 验证登陆
   * $this->validate($data, $rule, $msq)
   * 参数1：需要验证的数据；2、验证数据的规则；3、验证失败后的提题信息
   */
  public function checkLogin(Request $request){
    //初始返回参数（默认值为0）
    $status = 0; //0也就是请求失败了，没有通过验证
    $result = ''; //返回错误的信息
    $data = $request -> param();
    // 返回到客户端的数据，这个数据要在login.html里接收
    return ['status'=>$status, 'message'=>$request, 'data'=>$data];
  }
  //退出登陆
  public function logout(){

  }
}
