<?php
use Phroute\Phroute\RouteCollector;
use App\Controllers\DashboardController;
use App\Controllers\LoginController;
use App\Controllers\SubjectController;
use App\Controllers\QuizController;
function defineRoute($url){
    $router = new RouteCollector();
    //đăng nhập
    $router->filter('alo',function(){
            if(!isset($_SESSION['login'])|| empty($_SESSION['login'])){
                header('location: ' . BASE_URL . 'login');
            }
    });  
    $router->get('login',[LoginController::class,'form_login']);
    $router->post('login',[LoginController::class,'login']);
    //$router->get('quantri/index',[DashboardController::class,'index']);
    // $router->get('abc{id}?',[QuizController::class,'show']);
    

    $router->group(['prefix'=>'quantri',"before"=>'alo'],function($router){
         $router->get('index',[DashboardController::class,'index']);
         //$router->get('index',[DashboardController::class,'index']);
         
        $router->get('edit/{id}',[DashboardController::class,'editForm']);
        $router->post('luu-edit/{id}',[DashboardController::class,'saveEdit']);
        $router->post('luu-tao-moi',[DashboardController::class,'saveAdd']);
        $router->get('xoa/{id}',[DashboardController::class,'remove']);
        $router->get('quiz/{id}',[DashboardController::class,'chitiet_quiz']);
        
        $router->post('luu-sua-quiz/{id}',[DashboardController::class,'luu_edit_quiz']);
        $router->get('xoa_quiz/{id}',[DashboardController::class,'xoa_quiz']);
        $router->get('them-quiz',[DashboardController::class,'them-quiz']);
        $router->get('cau-hoi/{id}',[DashboardController::class,'cau_hoi']);
        $router->post('luu-sua/{id}',[DashboardController::class,'luu_sua']);
        $router->post('luu-them',[DashboardController::class,'luu_them']);
        $router->get('xoa_cau_hoi/{id}',[DashboardController::class,'xoa_cau_hoi']);
       
      
       
        $router->post('them-quiz',[DashboardController::class,'them_quiz']);
        $router->get('xoa-quiz/{id}',[DashboardController::class,'xoa_quiz']);
        $router->get('sua-quiz/{id}',[DashboardController::class,'form_sua_quiz']);
        $router->get('form_sua_cau-hoi/{id}',[DashboardController::class,'form_sua_cau_hoi']);

        $router->get('them_traloi/{id}',[QuizController::class,'tra_loi']);
        $router->get('form_sua_traloi/{id}',[QuizController::class,'form_sua_cau_tl']);
        $router->post('luu_sua_traloi/{id}',[QuizController::class,'sua_traloi']);
        $router->post('luu_traloi',[QuizController::class,'them_traloi']);
        $router->get('xoa_traloi/{id}',[QuizController::class,'remove_traloi']);

    });
    $router->group(['prefix'=>'mon-hoc',"before"=>'alo'],function($router){
        $router->get('',[SubjectController::class,'index']);
      

    });
    $router->get('lam_quiz/{id}',[QuizController::class,'form_lam_quiz']);

    // quiz 
    $router->group(['prefix'=>'quiz',"before"=>'alo'],function($router){
        $router->get('a/{id}',[QuizController::class,'form_mon_hoc']);
        $router->get('xoa',[QuizController::class,'xoa']);


    });
    $router->post('nop-bai',[QuizController::class,'nop_bai']);
    $router->get('logout',[LoginController::class,'dangxuat']);
    $router->get('dang-ky',[LoginController::class,'registerForm']);
    $router->post('tao-tai-khoan',[LoginController::class,'createAccount']);
    $router->get('abc/{id}/permanace?',
        function ($id,$permance=false){
            var_dump($permance,$id);
        }
            
        );
    
    //tham soos duong dan
    //$router->get('abc/{id}-{name}',[LoginController::class,'abc']);


    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
    echo $response;
}


?>