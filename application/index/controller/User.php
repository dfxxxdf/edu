<?php
namespace app\index\controller;
use think\Request;
use app\index\model\User as UserModel;
use think\Session;
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
    //这里是我们拿到的请求数据，数据是从login.html中拿的界面中输入获取的
    $data = $request -> param();
    //创建验证规则
    $rule = [
     'name|用户名'=>'require', //用户名必填
     'password|密码'=>'require', //密码必填
     'verify|验证码'=>'require|captcha', //验证码名必填|并且直接验证
    ];
    //自定义验证失败的提示信息
    $msg=[
      'name' => ['require'=>'用户名不能为空，请检查'],
      'password' => ['require'=>'密码不能为空，请检查'],
      'verify' => [
        'require'=>'验证码不能为空，请检查',
        'captcha' => '验证码错误',
      ],
    ];
    //进行验证
    $result = $this ->validate($data,$rule,$msg);
    //如果验证通过则执行
    if($result === true){
      //构造查询条件
      $map = [
        'name' => $data['name'],
        'password' => md5($data['password']),//因为数据库中是md5加密的，所以密码在这里也要加密
      ];
      //查询用户信息
      $user = UserModel::get($map);
      if($user==null){
        $result='没有找到该用户';
      }else{
        $status=1;
        $result='验证通过，点击[确定]进入';
        //用Session保存用户登陆信息
        Session::set('user_id',$user->id); //保存的是用户的ID
        Session::set('user_info',$user->getData()); //获取用户所有信息
      }
    }
    // 返回到客户端的数据，这个数据要在login.html里接收
    return ['status'=>$status, 'message'=>$result, 'data'=>$data];
  }
  //退出登陆
  public function logout(){

  }
}
