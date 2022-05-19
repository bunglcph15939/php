<?php
namespace App\Controllers;
use App\Models\Subject;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class DashboardController{
    public function index(){
       
        $subjects = Subject::all();
        return view('Dasbroad.subject_gv', [
            'subjects' => $subjects,
           
        ]);
        // include_once './app/views/Dasbroad/subject_gv.php';
    }
    public function saveAdd(){
        Subject::create([
            'name' => $_POST['name'],
            'author_id'=>$_POST['id_author']
        ]);
     
        header('location: ' . BASE_URL . 'quantri/index');
        die;
    }
    public function editForm($id) {
        $subjects = Subject::all();
        
        $model = Subject::where('id', $id)->first();
        if(!$model){
            header('location: ' . BASE_URL . 'quantri/index');
            die;
        }
        return view('Dasbroad.subject_gv', [
            'model' => $model,
            'subjects'=>$subjects
           
        ]);

        // include_once './app/views/Dasbroad/subject_gv.php';
    }
    public function saveEdit($id){
        
        $model = Subject::where('id', $id)->first();
        
        if(!$model){
            header('location: ' . BASE_URL . 'quantri/index');
            die;
        }

        $model->name = $_POST['name'];
        $model->author_id=$_SESSION['id'];
        $model->save();
        header('location: ' . BASE_URL . 'quantri/index');
        die;
    }
    public function remove($id){
       
        Subject::destroy($id);
        header('location: ' . BASE_URL . 'quantri/index');
        die;
    }
    public function chitiet_quiz($id){
       
        $_SESSION['subject_id']=$id;
         $model = Quiz::where('subject_id',$id)->get();
         return view('Dasbroad.subject_detail', [
            'model' => $model,
            
           
        ]);
        // include_once "./app/views/Dasbroad/subject_detail.php";
    }
    public function form_sua_quiz($id){
       
        $model = Quiz::where('subject_id', $_SESSION['subject_id'])->get();
       
        $sua = Quiz::where('id', $id)->first();
        if(!$model){
            header('location: ' . BASE_URL . 'quantri/quiz?subjectId='.$_SESSION['subject_id']);
            die;
        }
        return view('Dasbroad.subject_detail', [
            'model' => $model,
            'sua'=>$sua
            
           
        ]);
       // var_dump($model);die;
       //include_once './app/views/Dasbroad/subject_detail.php';
   }
   public function luu_edit_quiz($id){
    
    $model = Quiz::where('id', '=', $id)->first();
    
    if(!$model){
        header('location: ' . BASE_URL . 'quantri/quiz/'.$_SESSION['subject_id']);
      
        die;
    }


    $model->name=$_POST['name'];
    $model->subject_id=$_POST['idsubject'];
    $model->duration_minutes=$_POST['phut'];
    $model->start_time=$_POST['phutbd'];
    $model->end_time=$_POST['phutkt'];
    $model->status=$_POST['radio'];
    $model->is_shuffle=$_POST['shuffle'];

    $model->save();
    header('location: ' . BASE_URL . 'quantri/quiz/'.$_SESSION['subject_id']);
    die;
}
public function xoa_quiz($id){
    
    Quiz::destroy($id);
    header('location: ' . BASE_URL . 'quantri/quiz/'.$_SESSION['subject_id']);
    die;
}
public function them_quiz(){
    $model = new Quiz();
    Quiz::create([
        'name'=>$_POST['name'],
        'subject_id'=>$_POST['idsubject'],
        'duration_minutes'=>$_POST['phut'],          
        'start_time'=>$_POST['phutbd'],
        'end_time'=>$_POST['phutkt'],
        'status'=>$_POST['radio'],
        'is_shuffle'=>$_POST['shuffle']
    ]);
    
    // $data=[
        
    // ];
    // $model->insert($data);
    header('location: ' . BASE_URL . 'quantri/quiz/'.$_SESSION['subject_id']);
    die;
}

public function cau_hoi($id){
    
    $_SESSION['cau_hoi']=$id;
    $model = Question::where('quiz_id', $id)->get();
    return view('Dasbroad.quiz_detail', [
        'model' => $model,
       
        
       
    ]);
    //include_once "./app/views/Dasbroad/quiz_detail.php";
}
    public function form_sua_cau_hoi($id){
        
        $model = Question::where('quiz_id', $_SESSION['cau_hoi'])->get();
        
        $sua = Question::where('id', $id)->first();
        if(!$sua){
            header('location: ' . BASE_URL . 'quantri/cau-hoi?id='.$_SESSION['cau_hoi']);
            die;
        }
        return view('Dasbroad.quiz_detail', [
            'model' => $model,
            'sua'=>$sua
            
           
        ]);
        //include_once './app/views/Dasbroad/quiz_detail.php';


    }
    public function luu_cau_hoi(){
        $id = $_GET['id'];
        $model = Question::where(['id', '=', $id])->first();
        
        if(!$model){
            header('location: ' . BASE_URL . 'quantri/cau-hoi/'.$_SESSION['cau_hoi']);
            die;
        }
        if(isset($_FILES['anh'])){
            if($_FILES['anh']['error']>0){
               $anh=$model->img;
            }else{
                $anh=$_FILES['anh']['name'];
                $fileTemp = $_FILES['anh']['tmp_name'];
            }
        }
        $data=[
            'name'=>$_POST['name'],
            'img'=>$anh,
            'quiz_id'=>$_SESSION['cau_hoi']
        ];
        $model->update($data);
        $urlUpload = "./web/images/".$anh;
        move_uploaded_file($fileTemp,$urlUpload);
        header('location: ' . BASE_URL . 'quantri/cau-hoi/'.$_SESSION['cau_hoi']);
        die;
    }
    public function luu_sua($id){
        $model = Question::find($id);
        $model->name=$_POST['name'];
        $model->quiz_id=$_POST['quiz_id'];
        if(isset($_FILES['anh'])){
            if($_FILES['anh']['error']>0){
              $model->img;
            }else{
               $model->img =$_FILES['anh']['name'];
               $fileTemp = $_FILES['anh']['tmp_name'];
            }
        }
        $model->save();
        
        $urlUpload = "./web/images/".$_FILES['anh']['name'];
        header('location: ' . BASE_URL . 'quantri/cau-hoi/'.$_SESSION['cau_hoi']);
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
        header('location: ' . BASE_URL . 'quantri/cau-hoi/'.$_SESSION['cau_hoi']);
        die;
    }
    
    public function xoa_cau_hoi($id){
        
        Question::destroy($id);

        header('location: ' . BASE_URL . 'quantri/cau-hoi/'.$_SESSION['cau_hoi']);
        die;
    }
}

?>