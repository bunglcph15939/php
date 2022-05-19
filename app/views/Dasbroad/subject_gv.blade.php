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
                            <h3>Danh sách môn học</h3>

                            <button onclick="hien()" class="btn_red">Thêm môn học<span class="las la-arrow-right"> </span></button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td> </td>
                                            <td>ID</td>
                                            <td>Môn học</td>
                                            <td>Chi tiết môn học</td>
                                            <td>Chức năng</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($subjects as $sub)
                                        <tr>
                                            <td></td>
                                            <td>{{ $sub->id }}</td>
                                            <td>{{ $sub->name }}</td>
                                            <td>
                                                <a href="{{ BASE_URL . 'quantri/quiz/' . $sub->id}}">
                                                    <button class="btn-blue">
                                                        Chi tiết
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn-delete">
                                                <a style="color:white;" href="{{ BASE_URL . 'quantri/edit/' . $sub->id }}">Sửa</a>
                                                </button>
                                                <button class="btn-delete">
                                                <a style="color:white;" href="{{ BASE_URL . 'quantri/xoa/'  . $sub->id }}">Xóa</a>
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
               
                    <div class="card"id="plus"style="display:none;">
                        <div class="card-header">
                            <h3>Thêm môn học</h3>

                          
                        </div>

                        <div class="card-body login">
                            <form action="{{ BASE_URL . 'quantri/luu-tao-moi'}}" method="post">
                                <span class="title_input">Tên môn học</span>
                                <input type="text" placeholder="Tên môn học..." class="input-blue" name="name">
                                <input type="number" name="id_author" value="{{$_SESSION['id']}}" hidden> 
                                <button type="submit" class="btn-blue">Thêm môn học</button>
                            </form>
                        </div>
                    </div>
                    
                @if(explode('/',$_GET['url'])[1]=='edit' )
                    <div class="card"id="xxx" >
                        <div class="card-header">
                            <h3>Người sửa:</h3>

                            <button>{{$_SESSION['name']}}<span class="las la-arrow-right">
                            </span></button>
                        </div>

                        <div class="card-body login">
                            <form action="{{ BASE_URL . 'quantri/luu-edit/' . $model->id}}" method="post">
                                <span class="title_input">Tên môn học</span>
                                <input type="text" placeholder="Tên môn học..."name="name" class="input-blue"value="{{ $model->name }}">
                                <input type="number" name="id_author" hidden value="{{$_SESSION['id']}}"> 
                                <button type="submit" class="btn-blue">Sửa tên môn học</button>
                            </form>
                        </div>                   
                   </div>
              @endif
                </div>
                
            </div>
        </main>

@endsection