
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
                        <p><a href="{{ BASE_URL . 'quantri/index' }}">Danh sách môn học>></a>
                         <a href="{{ BASE_URL.'quantri/quiz/'. $_SESSION['subject_id']  }}">Danh sách quizz</a>
                         >><a href="{{ BASE_URL.'quantri/cau-hoi/'. $_SESSION['cau_hoi']  }}">Câu hỏi</a>
                         >><a href="">Câu trả lời</a>
                        </p>

                            <button onclick="hien()" class="btn_red">Thêm câu trả lời </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td> </td>
                                            <td>câu trả lời</td>
                                            <td>Trạng thái</td> 
                                            <td></td>
                                            <td>Ảnh</td>
                                          
                                            <td>Cập nhật</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($model as $val)
                                        <tr>
                                            <td></td>
                                            <td>{{ $val->content  }}</td>
                                            <td> @if($val->is_correct==1) <span class='status green'></span> <span> Đúng </span> 
                                             @else <span class='status red'></span> <span> Sai </span> @endif </td>
                                            <td>
                                               <!-- annr --> <td><img src="{{ IMAGE.$val->img }}" alt=""width="50px"></td>
                                            </td>
                                            <td>
                                                <button class="btn-delete">
                                                <a style="color:white; "  href="{{ BASE_URL . 'quantri/form_sua_traloi/' . $val->id }}">Sửa</a>
                                                <button class="btn-delete">
                                                <a style="color:white;" href="{{ BASE_URL . 'quantri/xoa_traloi/' . $val->id }}">Xóa</a>
                                                </button>
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

                <div class="customers">
                
                    <div class="card"style="display:none;" id="plus" >
                        <div class="card-header">
                            <h3>Thêm câu hỏi</h3>

                           
                        </div>

                        <div class="card-body login">
                            <form action="{{ BASE_URL .'quantri/luu_traloi'  }}" method="post" enctype="multipart/form-data">
                                <span class="title_input">nội dung câu trả lời</span>
                                <input type="text" placeholder="câu trả lời..." class="input-blue" name="name">
                                <input type="number" name="quiz_id" hidden value="{{ $_SESSION['idcauhoi']  }}"> 
                                <span class="title_input">ảnh câu trả lời</span>
                                <input type="file" class="input-blue" name="anh">
                                <span class="title_input">Trang thái</span>
                                <div class="input-blue radio-input">
                                   <span> Trạng thái: </span>
                                    <span class="status green"></span><span> Đúng </span>  <input type="radio" name="radio" value="1"> 
                                    <span class="status red"></span> <span> Sai </span>  <input type="radio" name="radio"value='2'> 
                                </div>
                                <button type="submit" class="btn-blue">Thêm câu trả lời</button>
                            </form>
                        </div>
                    </div>
                 @if(explode('/',$_GET['url'])[1]=='form_sua_traloi' )
                    <div class="card" id="xxx">
                        <div class="card-header">
                            <h3>Sửa câu trả lời</h3>

                           
                        </div>

                        <div class="card-body login">
                            <form action="{{ BASE_URL . 'quantri/luu_sua_traloi/' . $sua->id}}" method="post" enctype="multipart/form-data">
                                <span class="title_input">nội dung câu trả lời</span>
                                <input type="text" placeholder="câu trả lời..." class="input-blue"name="name" value="{{ $sua->content }}">
                                <input type="number" name="quiz_id" hidden > 
                                <span class="title_input">ảnh câu trả lời</span>
                                <img src="{{IMAGE.$sua->img }}" width="220px" alt="">
                                <input type="file" class="input-blue" name="anh">
                                <span class="title_input">Trang thái</span>
                                <div class="input-blue radio-input">
                                   <span> Trạng thái: </span>
                                    <span class="status green"></span><span> Đúng </span>  <input type="radio" name="radio" value="1" {{ ($sua->is_correct)==1 ? "checked" :""   }}> 
                                    <span class="status red"></span> <span> Sai </span>  <input type="radio" name="radio" value="2" {{ ($sua->is_correct==2) ? "checked" :""   }}> 
                                </div>
                                <button type="submit" class="btn-blue">Sửa câu trả lời</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
                
            </div>
        </main>

        @endsection