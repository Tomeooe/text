<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\User;
class Index extends Controller
{
    public function login()
    {
       return $this -> fetch();
    }
    public function check()
    {
      $data=input('post.');
      $user=new User();
      $ret=$user->where('name',$data['name'])->find();
      if($ret){
        if($ret['password']===md5($data['password'])){
           session('name',$data['name']);
        }else{
            $this->error('密码错误');
        }
      }else{
        $this->error('用户名不存在');
        exit;
      }
      if(captcha_check($data['code'])){
        $this->success('验证码正确，恭喜登录成功','User/index');
      }else{
        $this->success('验证码错误,登录失败');
      }
    }
    public function logout(){
        session(null);
        $this->success('退出登录成功','Index/login');
    }
}