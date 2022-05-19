@extends('layout.main')
@section('css')
<link rel="stylesheet" href="{{ CSS_DAS.'subject_detail.css' }}">
@endsection
@section('main-content')

        <main>
            <!--Tabla-->
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <p><a href="{{ BASE_URL . 'quantri/index'}}">Danh sách môn học>></a> Danh sách quizz</p>

                         
                          <button type="button"onclick="hien()" class="btn_red">Thêm Quiz<span class="las la-arrow-right"> </span></button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td> </td>
                                            <td>ID</td>
                                            <td>Tên quiz</td>
                                            <td>Chi tiết quiz</td>
                                            <td>Cập nhật</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($model as $sub)
                                        <tr>
                                            <td></td>
                                            <td>{{ $sub->id }}</td>
                                            <td>{{ $sub->name }}</td>
                                           
                                            <td>
                                                <a href="{{ BASE_URL . 'quantri/cau-hoi/' . $sub->id}}">
                                                    <button class="btn-blue">
                                                       Chi tiết
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn-delete">
                                                <a style="color:white;" href="{{ BASE_URL . 'quantri/sua-quiz/' . $sub->id }}">Sửa</a>
                                                </button>
                                                <button class="btn-delete">
                                                <a style="color:white;" href="{{ BASE_URL . 'quantri/xoa-quiz/' . $sub->id }}">Xóa</a>
                                                </button>
                                            </td>
                                        </tr>
                                         @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

               <!-- he;;p -->

               <div class="customers">

    <div class="card"style="display:none;" id="plus">
        <div class="card-header">
        <h3>Thêm quiz</h3>

        <!-- <button><span class="las la-arrow-right"> -->
        </span></button>
    </div>

    <div class="card-body login" >
        <form action="{{ BASE_URL . 'quantri/them-quiz'}}" method="post">
            <span class="title_input">Tên quiz</span>
            <input type="text" placeholder="Tên quiz..." class="input-blue"name="name">
            <input type="number"  name="idsubject" hidden  value="{{$_SESSION['subject_id']}}"> 
            <span class="title_input">Hạn quiz bắt đầu</span>
            <input type="datetime-local" placeholder="hạn quiz bắt đầu..." class="input-blue"name="phutbd">
            <span class="title_input">Hạn quiz kết thúc</span>
            <input type="datetime-local" placeholder="hạn quiz kết thúc..." class="input-blue"name="phutkt">
            <span class="title_input">Thời gian làm quiz</span>
            <input type="number" placeholder="thời gian làm quiz..." class="input-blue"name="phut">
            <span class="title_input">Trang thái</span>
            <div class="input-blue radio-input">
               <span> Trạng thái: </span>
                <span class="status green"></span><span> open </span>  <input type="radio" name="radio" value="1"> 
                <span class="status red"></span> <span> close </span>  <input type="radio" name="radio"value="2"> 
            </div>
            <span class="title_input">Tráo câu</span>
            <input type="text" placeholder="tráo trộn quiz..."name="shuffle" class="input-blue">
            <button type="submit" class="btn-blue">Thêm quiz</button>
        </form>
    </div>
</div>


@if(explode('/',$_GET['url'])[1]=='sua-quiz' )


<div class="card" style="margin-top: 5%;"id="xxx">
    <div class="card-header">
        <h3>Sửa quiz</h3>

        
    </div>

    <div class="card-body login">
        <form action="{{ BASE_URL . 'quantri/luu-sua-quiz/' . $sua->id}}" method="post">
            <span class="title_input">Tên quiz</span>
            <input type="text" placeholder="Tên quiz..." class="input-blue"name="name" value="{{$sua->name }}">

            <input type="number" name="idsubject" hidden value="{{$_SESSION['subject_id']}}"> 
            <span class="title_input">Hạn quiz bắt đầu</span>
            <input type="datetime-local" placeholder="hạn quiz bắt đầu..." class="input-blue"name="phutbd"value="{{substr_replace($sua->start_time,'T', 10, 1) }}">

            <span class="title_input">Hạn quiz kết thúc</span>
            <input type="datetime-local" placeholder="hạn quiz kết thúc..." class="input-blue"name="phutkt"value="{{substr_replace($sua->end_time,'T', 10, 1)  }}">

            <span class="title_input">Thời gian làm quiz</span>
            <input type="number" placeholder="thời gian làm quiz..." class="input-blue"name="phut"value="{{$sua->duration_minutes }}">

            <span class="title_input">Trang thái</span>
            <div class="input-blue radio-input">
               <span> Trạng thái: </span>
                <span class="status green"></span><span> open </span>  <input type="radio" name="radio"value="1" {{($sua->status)==1 ? "checked" : "" }} > 
                <span class="status red"></span> <span> close </span>  <input type="radio" name="radio"value="2"{{($sua->status)==2 ? "checked" : "" }}> 
            </div>
            <span class="title_input">Tráo câu</span>
            <input type="text" placeholder="tráo trộn quiz..." class="input-blue"name="shuffle"value="{{$sua->is_shuffle }}">
            <button type="submit" class="btn-blue">Sửa</button>
        </form>
    </div>
  </div>
  </div>
      @endif    
  
            </div>
        </main>

  @endsection