<?php
namespace App\Controllers;
use App\Models\Subject;


class SubjectController{
    public function index(){
        $subjects = Subject::all();
        return view('mon-hoc.danhsach', [
            'subjects' => $subjects,
           
        ]);
        //include_once './app/views/mon-hoc/danhsach.php';
    }

    public function addForm(){
        include_once "./app/views/mon-hoc/add-form.php";
    }

    public function editForm(){
        $id = $_GET['editid'];
        $model = Subject::where(['id', '=', $id])->first();
        if(!$model){
            header('location: ' . BASE_URL . 'mon-hoc');
            die;
        }

        include_once './app/views/Dasbroad/subject_gv.php';
    }

    public function saveAdd(){
        $model = new Subject();
        $data = [
            'name' => $_POST['name'],
            'author_id'=>$_POST['id_author']
        ];
      
        $model->insert($data);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;

        // $model = new Subject();
        // $model->name = $_POST['name'];
        // $model->save();
        // header('location: ' . BASE_URL . 'mon-hoc');
        // die;
    }

    public function saveEdit(){
        $id = $_GET['id'];
        $model = Subject::where(['id', '=', $id])->first();
        
        if(!$model){
            header('location: ' . BASE_URL . 'mon-hoc');
            die;
        }

        $data = [
            'name' => $_POST['name']
        ];

        $model->update($data);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function remove(){
        $id = $_GET['delid'];
        Subject::destroy($id);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }
    
}
?>