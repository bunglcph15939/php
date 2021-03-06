@extends('layout.mon-hoc')
@section('mon')
           <body >
               <div class="row">
                   <div class="col-lg-2"></div>
                   <div class="col-lg-8">
                       <h1>Lớp học</h1>
                       <table class="table">

<thead>
    <th>Mã Quizz</th>
    <th>Tên Quizz</th>
    <th>Bắt đầu</th>
    <th>Kết thúc</th>
    <th>Thời gian</th>
    <?php if($_SESSION['role']==1 && isset($_SESSION['role'])){ ?>
    <th>
        <a href="<?= BASE_URL . 'quantri/quiz/'. $_SESSION['subject_id']?>">Tạo mới</a>
    </th>
    <?php }else{
        echo "<td>Điểm</td>";
    } ?>
</thead>
<tbody>
  <div  class="ten-lop" >
    <?php foreach($model as $sub){ ?>
       
        <tr>
            <td><?= $sub->id ?></td>
            <td>
            <?=  $_SESSION['role']==1  ? "<a> ".$sub->name." </a>" :"<a class='dropdown-item' href=".BASE_URL.'lam_quiz/'.$sub->id.">".$sub->name."</a>"  ?>    
            </td>
            <td><?= $sub->start_time ?></td>
           <td><?= $sub->end_time ?></td>
           <td><?= $sub->duration_minutes ?></td>
            <?php if($_SESSION['role']==1 && isset($_SESSION['role'])){ ?>
            <td>
                <a href="<?= BASE_URL . 'quantri/sua-quiz/' . $sub->id ?>">Sửa</a>
              
            </td>

            <?php }else{
               
                ?>
               <td><?php  echo $sub->getStudentScore(); ?> </td>
           <?php
           }?>
           
        </tr>
    <?php } ?>
    </div>
</tbody>
</table>
                   </div>
               </div>
           </body>
           @endsection