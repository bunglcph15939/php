@extends('layout.mon-hoc')
@section('mon')
    

           <body >
               <div class="row">
                   <div class="col-lg-2"></div>
                   <div class="col-lg-8">
                       <h1>Lớp học</h1>
                       <table class="table">

<thead>
    <th>Mã môn</th>
    <th>Tên môn</th>
    @if($_SESSION['role']==1 && isset($_SESSION['role']))
    <th>
        <a href="{{ BASE_URL.'quantri/index' }}">Tạo mới</a>
    </th>
    @endif
</thead>
<tbody>
  <div  class="ten-lop" >
     @foreach($subjects as $sub)
       
        <tr>
            <td>{{ $sub->id }}</td>
            <td>
              
                <a href="{{ BASE_URL . 'quiz/a/' . $sub->id}}">{{ $sub->name }}</a>
            </td>
            @if($_SESSION['role']==1 && isset($_SESSION['role']))
            <td>
                
                <a href="{{ BASE_URL . 'quantri/edit/' . $sub->id }}">Sửa</a>
            </td>
              
            @endif
        </tr>
    @endforeach
    </div>
</tbody>
</table>
                   </div>
               </div>
           </body>
           @endsection        