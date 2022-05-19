<?php
namespace App\Controllers;

use App\Models\User;

class LoginController{
    
    public function registerForm(){
        
        include_once './app/views/auth/register-form.php';
    }

    public function createAccount(){
        $file = $_FILES['image']['tmp_name'];
        $data = [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            'avatar'=>$_FILES['image']['name'],
            'role_id'=>$_POST['role'],  
            "password" => password_hash($_POST['pass'], PASSWORD_DEFAULT)
        ];
       

        
        
        $model = new User();
        $model->insert($data);
        $urlUpload = "./web/images/".$_FILES['image']['name'];
        move_uploaded_file($file,$urlUpload);
        
        header('location: ' . BASE_URL . 'login');
        die;
    }
    public function form_login(){
        include_once './app/views/login/index.php';
    }
    public function login(){
                if(isset($_POST['submit']))  {   
                    $a= User::all();
                    $acc=$_POST['Name'];
                    $pass=$_POST['pass'];  
                    $xxx=0; 
                    $sai=false;      
                foreach($a as $val){           
                        if($val->email==$acc&& password_verify($pass,$val->password)==true && ( $val->role_id==1 || $val->role_id==2 ) ){
                            
                            $xxx=1;
                           // echo "alert('Nhập đúng')";    
                            $_SESSION['login']=true; 
                            $_SESSION['id']=$val->id;
                            $_SESSION['name']=$val->name;
                            $_SESSION['image']=$val->avatar; 
                            $_SESSION['role']=$val->role_id;
                                       
                        }
                       
                }
              
                if($xxx==0){                  
               $_SESSION['sai']="Không thể đăng nhập";
                  
                   
                }
               
            }
            
            if(isset($_SESSION['login']) && $_SESSION['role']==1){
                header('location: ' . BASE_URL . 'quantri/index');  
            }else if(isset($_SESSION['login']) && $_SESSION['role']==2){
                header('location: ' . BASE_URL . 'mon-hoc');  
            } 

    }
    public function dangxuat(){
        session_unset();
        header('location: ' . BASE_URL . 'login'); 
    }
    public function abc($id,$name){
        var_dump($id,$name); die;
    }
    
}
?>