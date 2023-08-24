<?php
namespace app\index\controller;
use app\index\model\User as UserModel;
use think\Controller;
use think\Db;
class User extends Controller
{
    public function add(){
        // $user=new UserModel();
        //  $user->id=1;
        //  $user->name='流云';
        //  $user->password=123456;
        //  $user->repassword=123123;
        //  $user->email='3623303345141';
        //  if($user->insert()){
        //      return '用户新增成功';
        //  }else{
        //      return '用户新增失败';
        //  }
        $select=Db::execute('INSERT INTO think_user(`id`, `name`, `password`, `repassword`, `email`) VALUES (3,"孙悟空","123456","123456","sunwukong@qq.com")');
        dump($select);    
     }

    public function addlist(){
        $user=new UserModel();
        $list=[
            ['name'=>'张三','password'=>'123456','repassword'=>'123456', 'email'=>'zhangsan@qq.com'],
            ['name'=>'里斯','password'=>'123456','repassword'=>'123456', 'email'=>'lisi@qq.com'],
        ];
       if($user->saveAll($list)){
        return '插入用户新增成功';
       }else{
        return '插入用户新增失败';  
    };
    }
    public function update(){
        $user=UserModel::get(1);
        $user->name='安迪';
        $user->email="andi@qq.com";
        $user->birthday=strtotime('1998-7-23');
        if($user->save()){
            return '用户修改成功';
        }else{
            return '用户修改失败';
        }
    }
    public function select(){
         $user= new UserModel();
        // $result = $user->where('name','张三')->find();
        // echo $result->email;
        //获取多条数据
        $list=UserModel::all([1,2,3]);
        foreach($list as $key=>$value){
            
            echo $value;
        };
       
    }
    public function lista(){
        $list=UserModel::all();
        $this->assign('list',$list);
        return $this -> fetch();
    } 
}