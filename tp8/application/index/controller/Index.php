<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
       return $this -> fetch();
    }
    public function  admininfo(){
      return $this -> fetch();
    }
    public function login(){
      return $this -> fetch();
    }
    public function email(){
      return $this -> fetch();
    }
    public function menu1(){
      return $this -> fetch();
    }
    public function menu2(){
      return $this -> fetch();
    }
     public function system(){
      return $this -> fetch();
    }
    public function welcome(){
      return $this -> fetch();
    }
    public function articleadd(){
      return $this -> fetch();
    }
    public function articledetail(){
      return $this -> fetch();
    }
    public function articlelist(){
      return $this -> fetch();
    }
}
