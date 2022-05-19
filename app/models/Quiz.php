<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Quiz extends Model{
    protected $table = 'quizs';
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'subject_id','duration_minutes','start_time','end_time','status','is_shuffer'];
    public function getStudentScore(){
        $studentResult = StudentQuiz::where('quiz_id', $this->id)
            ->Where('student_id',$_SESSION['id'])->orderByDesc('id')
            ->first();
        if($studentResult != null){
            return $studentResult->score;
        }
       
    }
}
?>