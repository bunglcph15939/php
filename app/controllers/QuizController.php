<?php
namespace App\Controllers;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;
use App\Models\StudentQuiz;

class QuizController{

    public function form_mon_hoc($id){

       
       $_SESSION['subject_id']=$id;
        $model = Quiz::where('subject_id', $id)->get();
        return view('mon-hoc.mon-hoc', [
            'model' => $model,
           
        ]);
    
       
      

       
       
    }
    public function form_them(){
        include_once "./app/views/sub/form-them.php";
       
      
    }
    public function luuadd(){
        $model = new Quiz();
        $data=[
            'name'=>$_POST['name'],
            'subject_id'=>$_POST['idsubject'],
            'duration_minutes'=>$_POST['phut'],          
            'start_time'=>$_POST['phutbd'],
            'end_time'=>$_POST['phutkt'],
            'status'=>$_POST['radio'],
            'is_shuffle'=>$_POST['shuffle']
        ];
        $model->insert($data);
        header('location: ' . BASE_URL . 'quiz?subjectId='.$_SESSION['subject_id']);
        die;
    }
    public function form_sua(){
        $id = $_GET['suaId'];
        $model = Quiz::where(['id', '=', $id])->first();
        if(!$model){
            header('location: ' . BASE_URL . 'quiz?subjectId='.$_SESSION['subject_id']);
            die;
        }
       // var_dump($model);die;
        include_once "./app/views/sub/form-sua.php";

    }
    public function luu_edit(){
        $id = $_GET['id'];
        $model = Quiz::where(['id', '=', $id])->first();
        
        if(!$model){
            header('location: ' . BASE_URL . 'quiz?subjectId='.$_SESSION['subject_id']);
            echo "sai";
            die;
        }

        $data = [
            'name'=>$_POST['name'],
            'subject_id'=>$_POST['idsubject'],
            'duration_minutes'=>$_POST['phut'],          
            'start_time'=>$_POST['phutbd'],
            'end_time'=>$_POST['phutkt'],
            'status'=>$_POST['status'],
            'is_shuffle'=>$_POST['shuffle']
        ];

        $model->update($data);
        header('location: ' . BASE_URL . 'quiz?subjectId='.$_SESSION['subject_id']);
        die;
    }
    public function xoa(){
        $id = $_GET['quizId'];
        Quiz::destroy($id);
        header('location: ' . BASE_URL . 'quiz?subjectId='.$_SESSION['subject_id']);
    }//dassbrod
    public function tra_loi($id){
        
       $_SESSION['idcauhoi']=$id;
       $model = Answer::where('question_id', $id)->get();
       return view('Dasbroad.tra_loi', [
        'model' => $model
        
        
       
       ]);
    }
    public function them_traloi(){
        $model = new Answer();
        $data = [
            
           'content'=>$_POST['name'],
           'question_id'=>$_POST['quiz_id'],
           'is_correct'=>$_POST['radio'],
           'img'=> $_FILES['anh']['name']
           
        ];
      
        $model->insert($data);
        $fileTemp = $_FILES['anh']['tmp_name'];
        $urlUpload = "./web/images/".$_FILES['anh']['name'];
        move_uploaded_file($fileTemp,$urlUpload);
        header('location: ' . BASE_URL . 'quantri/them_traloi/'.$_SESSION['idcauhoi']);
        die;
    }
    public function form_sua_cau_tl($id){
        
        $model = Answer::where('question_id', $_SESSION['idcauhoi'])->get();
        
        $sua = Answer::where('id', $id)->first();
        if(!$sua){
            header('location: ' . BASE_URL . 'quantri/them_traloi/'.$_SESSION['idcauhoi']);
            die;
        }
        return view('Dasbroad.tra_loi', [
            'model' => $model,
            'sua'=>$sua
        ]);

    }
    public function sua_traloi($id){
       

        
        $model = Answer::where('id', $id)->first();
        
        if(!$model){
            header('location: ' . BASE_URL . 'quantri/them_traloi/'.$_SESSION['idcauhoi']);
            die;
        }
        if(isset($_FILES['anh'])){
            if($_FILES['anh']['error']>0){
               $model->img;
            }else{
                $model->img=$_FILES['anh']['name'];
                $fileTemp = $_FILES['anh']['tmp_name'];
            }
        }
        $model->content=$_POST['name'];
        $model->question_id;
        $model->is_correct=$_POST['radio'];

        
        $model->save();
        header('location: ' . BASE_URL . 'quantri/them_traloi/'.$_SESSION['idcauhoi']);
        $urlUpload = "./web/images/".$model->img;
        move_uploaded_file($fileTemp,$urlUpload);
        
        die;
    }
    public function luu_them(){
        $model = new Question();
        $data=[
           'name'=>$_POST['name'],
           'quiz_id'=>$_POST['quiz_id'],
           'img'=>$_FILES['anh']['name']
        ];
        $model->insert($data);
        $fileTemp = $_FILES['anh']['tmp_name'];
        $urlUpload = "./web/images/".$_FILES['anh']['name'];
        move_uploaded_file($fileTemp,$urlUpload);
        header('location: ' . BASE_URL . 'quantri/them_traloi?idcauhoi='.$_SESSION['idcauhoi']);
        die;
    }
    public function remove_traloi($id){
        
        Answer::destroy($id);
       
        header('location: ' . BASE_URL . 'quantri/them_traloi/'.$_SESSION['idcauhoi']);
        die;
    }
    //hêt
    public function form_lam_quiz($id){
      
        $_SESSION['quizid']=$id;
        $time= Quiz::where('id', $_SESSION['quizid'])->first();     
        $model= Question::where('quiz_id', $_SESSION['quizid'])->get();
        $mang=[];
        foreach($model as $val){
           $mang[$val->id] = Answer::where('question_id',$val->id )->get();
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $_SESSION['bd']=date('y-m-d h:i:s');
       
        include_once "./app/views/mon-hoc/lam_quiz.php";

    }
    
    public function nop_bai(){
        $model = new StudentQuiz();
       
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dem=0;
        //var_dump(count($_POST['is_correct']));die;
        for($i=0;$i<count($_POST['is_correct']);$i++){
                           if($_POST['is_correct'][$i]=='1'){
                    $dem++;
                }
               
        }
        $score =($dem/count($_POST['is_correct']))*10;
        $data=[

            'student_id'=>$_SESSION['id'],
            'quiz_id'=>$_SESSION['quizid'],
            'start_time'=>$_SESSION['bd'],
            'end_time'=>date('y-m-d h:i:s'),
            'score'=>$score
            
        ];
        $model->create($data);
        
        header('location: ' . BASE_URL . 'quiz/a/'.$_SESSION['subject_id']);
       
    }
    
}
?>