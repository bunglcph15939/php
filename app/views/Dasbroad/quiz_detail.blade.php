
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
                        <p><a href="{{ BASE_URL . 'quantri/index'}}">Danh sách môn học>></a> <a href="{{ BASE_URL.'quantri/quiz/'. $_SESSION['subject_id']  }}">Danh sách quizz</a>>>câu hỏi </p>

                            <button onclick="hien()" type="button" class="btn_red">Thêm câu hỏi <span class="las la-arrow-right">
                            </span></button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td>câu hỏi</td>
                                            <td>ảnh</td>
                                            <td>Câu trả lời</td>
                                            <td>Cập nhật</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                    @foreach($model as $sub)
                                        <tr>
                                            <td></td>
                                            <td>{{ $sub->name }}</td>
                                            <td><img src="{{ IMAGE.$sub->img }}" alt=""width="50px"></td>
                                            <td>
                                                <a href="">
                                                    <button class="btn-blue">
                                                    <a style="color:white;" href="{{ BASE_URL . 'quantri/them_traloi/' . $sub->id }}">Trả lời</a>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn-delete">
                                                <a style="color:white;" href="{{ BASE_URL . 'quantri/form_sua_cau-hoi/' . $sub->id }}">Sửa</a>
                                                </button>
                                                <button class="btn-delete">
                                                <a style="color:white;" href="{{ BASE_URL . 'quantri/xoa_cau_hoi/' . $sub->id }}">Xóa</a>
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
                                            
                    <div class="card"style="display:none;" id="plus">
                        <div class="card-header">
                            <h3>Thêm câu hỏi</h3>

                         
                            </span></button>
                        </div>

                        <div class="card-body login">
                            <form action="{{ BASE_URL . 'quantri/luu-them'}}" method="post" enctype="multipart/form-data" >
                                <span class="title_input">Tiêu đề câu hỏi</span>
                                <input type="text" placeholder="Tên quiz..." class="input-blue"name='name'>
                                <input type="number" name="quiz_id" hidden name="quiz_id" value="{{ $_SESSION['cau_hoi'] }}"> 
                                <span class="title_input">ảnh câu hỏi</span>
                                <input type="file" class="input-blue" name="anh">
                                <button type="submit" class="btn-blue">Thêm câu hỏi</button>
                            </form>
                        </div>
                    </div>
                    @if(explode('/',$_GET['url'])[1]=='form_sua_cau-hoi' )
                    <div class="card" id="xxx">
                        <div class="card-header">
                            <h3>Sửa câu hỏi</h3>

                            
                            </span></button>
                        </div>

                        <div class="card-body login">
                            <form action="{{ BASE_URL . 'quantri/luu-sua/' . $sua->id}}" method="post" enctype="multipart/form-data">
                                <span class="title_input">Tiêu đề câu hỏi</span>
                                <input type="text" placeholder="Tên quiz..."name="name" class="input-blue" value="{{ $sua->name }}">
                                <input type="number" name="quiz_id" hidden value="{{ $sua->quiz_id }}"> 
                                <span class="title_input">ảnh câu hỏi</span>
                                <input type="file" class="input-blue" name="anh" value="{{ $sua->img }}">
                               <img src="{{IMAGE.$sua->img}}" alt="">
                               
                                <button type="submit" class="btn-blue">sửa câu hỏi</button>
                            </form>
                        </div>
                    </div>
                            @endif

                </div>
                
            </div>
        </main>

  @endsection