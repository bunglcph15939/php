<?php

if(!isset($_SESSION['login'])){
    if($url != "login"){
        header("location:".BASE_URL."login");
    }
}
// class session{
//     public static function CheckSession(){
//     if(session_id()==''){
//         session_start();
//     }
//     if(!isset($_SESSION['login'])){
//         session_destroy();
//         header('location: ' . BASE_URL . 'login');
//     }
//     }
//     public static function CheckLogin(){
//         if (session_id()=='') session_start();
//         if(isset($_SESSION['login'])){
//             header('Location:../trangquantri/index.php');
//         }


//     }
// }
?>