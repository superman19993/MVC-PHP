<?php

class UserController extends BaseController{

    private $userModel;
    public function __construct(){
        $this->loadModel('UserModel');
        $this->userModel= new UserModel;
    }
    
    public function index(){

        $columns= ['id','username','level'];
        $orderBys= ['column'=> 'id', 'order'=>'asc'];
        $limit=15;
        $users = $this->userModel->getAll($columns, $orderBys , $limit);

        // return include './Views/frontend/users/index.php'
        return $this->view('frontend.users.index',['users'=> $users]);
    }
    public function show(){
        $id= $_GET['id'];
        $columns= ['id','username','level'];
        $user= $this->userModel->findById($columns, $id);
        return $this->view('frontend.users.show', ['user'=> $user]);
    }
}

?>