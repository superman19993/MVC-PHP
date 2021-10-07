<?php

$dir = dirname(__FILE__, 2);
$dir = "${dir}" . "\SmartyHeader.php";
require $dir;

session_start();
class UserController extends BaseController{

    private $userModel;
    public function __construct(){
        $this->loadModel('UserModel');
        $this->userModel= new UserModel;
    }

    public function index(){
        //check if user has loged in
        if (isset($_SESSION['username'])){
            //show users info exclude the password
            $columns= ['id','username','level'];
            $orderBys= ['column'=> 'id', 'order'=>'asc'];
            $limit=15;

            $users = $this->userModel->getAll($columns, $orderBys , $limit);
            global $smarty;
            $smarty->assign('users',$users);
            return $smarty->display('Views/frontend/users/index.tpl');

        }else return $this->showLoginForm();

    }
    
    public function showLoginForm(){
        //if user has logged in direct to index.
        if (isset($_SESSION['username'])) return $this->index();
        else{
            global $smarty;
            return $smarty->display('Views/frontend/login/index.tpl');
        }
        
    }

    public function createForm(){
        //users can only create new account when logged in
        if (isset($_SESSION['username'])){
            global $smarty;
            return $smarty->display('Views/frontend/users/create.tpl');
        }
        else return $this->showLoginForm();
    }

    public function updateForm(){
        //users can only update accounts when logged in
        if (isset($_SESSION['username'])) {
            global $smarty;
            $smarty->clearCache('Views/frontend/users/edit.tpl');
            return $smarty->display('Views/frontend/users/edit.tpl');
        }
        else return $this->showLoginForm();
    }

    public function findById($id){
        return $this->userModel->find($id);
        
    }

    public function getUser(){
        
        $username =$_POST['username'];
        $password= $_POST['password'];
        
        if ($password !='' && $username !=''){
            $user= $this->userModel->login($username, $password);
            //if user is found, set session variable for the user and redirect to index
            if ($user){
                $_SESSION['username']= $user['username'];
                header('Location: /mvcproject/index.php');
                die;
            }else{
                return $this->showLoginForm();
                echo "Wrong username or password";
            }  
        }
        return $this->showLoginForm();
    }

    public function store(){
        $username=$_POST['user_name'];
        $password=$_POST['pw'];
        $level=$_POST['level'];
        $errors=[];

        if (empty($username)){
            array_push($errors,"Username is required");
        }
        if (empty($password)){
            array_push($errors,"Password is required");
        }
        if ($level <0 || $level >1){
            array_push($errors,"Level must be 0 or 1");
        }
        if (count($errors)== 0){
            $data=[
                'username'=> $username,
                'password'=> $password,
                'level'=> $level
            ];    
            $this->userModel->store($data);
            global $smarty;
            $smarty->clearCache('Views/frontend/users/index.tpl');
            header('Location: /mvcproject/index.php');
            die;
        }
        return $this->createForm();

    }

    public function update(){
        $id = $_GET['id'];
        $user= $this->findById($id);
        
        if ($id < 0 || !$user){
            http_response_code(400);
            exit;
        }

        $username=$_POST['user_name'];
        $password=$_POST['pw'];
        $level=$_POST['level'];
        $errors=[];
        if (empty($username)){
            array_push($errors,"Username is required");
        }
        if (empty($password)){
            array_push($errors,"Password is required");
        }
        if ($level <0 || $level >1){
            array_push($errors,"Level must be 0 or 1");
        }
        if (count($errors)== 0){
            $data=[
                'username'=> $username,
                'password'=> $password,
                'level'=> $level
            ];    
            $this->userModel->updateData($id, $data);
            global $smarty;
            $smarty->clearCache('Views/frontend/users/index.tpl');
            header('Location: /mvcproject/index.php');
            die;
        }
        return $this->updateForm();
    }

    public function delete(){

        if (isset($_SESSION['username'])){
            $id = $_GET['id'];
            $user= $this->findById($id);
    
            if ($id < 0 || !$user){
                http_response_code(400);
                exit;
            }
            $this->userModel->destroy($id);
            global $smarty;
            $smarty->clearCache('Views/frontend/users/index.tpl');
            return $this->index();
        }else return $this->showLoginForm();
    }
}

?>