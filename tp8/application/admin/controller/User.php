<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\User as UserModel;
use app\admin\validate\User as UserValidate;
use think\Db;

class User extends Base
{
   public function index()
   {
    return $this->fetch();
   }
   public function lista()
   {
     return $this->fetch();
   }
    public function add()
    {
     return $this->fetch();
    }
    public function adv() 
   {
    return $this->fetch();
    }
    public function info()
    {
     return $this->fetch();
    }
    public function pass()
    {
      $id=input('get.id');
      $data=Db::table('think_user')->where('id',$id)->find();
      $this->assign('data',$data);
      return $this->fetch();
    }
    public function page()
    {
     return $this->fetch();
    }
    public function book()
    {
     return $this->fetch();
    }
    public function column()
    {
     return $this->fetch();
    }
    public function cate(){
        return $this->fetch();
    }
    public function admin(){
       $data =Db::table('think_user')->field('id,name,password,email')->select();
       $this->assign('data',$data);
       return $this->fetch();
    }
    public function adminadd(){
        return $this->fetch();
    }
    public function insert(){
       $data=input('post.');
       $val=new UserValidate();
       if(!$val->check($data)){
         $this -> error($val->getError());
         exit;
       }
        $user=new UserModel($data);
        $ret=$user->allowField(true)->save();  
        if($ret){    
        $this->success('新增管理员成功','User/admin');
       }else{
        $this->success('新增管理员失败');
      }
    }
    public function update()
    { 
      $data=input('post.');
      $id=input('post.id');
      $val=new UserValidate();
      if(!$val->check($data)){
        $this -> error($val->getError());
        exit;
      }
      $user=new UserModel();
      $ret=$user->allowField(true)->save($data,['id'=>$id]);  
      if($ret){   
        $this->success('修改成功','User/admin');
       }else{
        $this->success('修改失败');
      }
    }
    public function delete(){
    $id=input('get.id');
    $ret=UserModel::destroy($id,true);
    if($ret){    
      $this->success('删除成功','User/admin');
     }else{
      $this->success('删除失败');
    }
    }
}