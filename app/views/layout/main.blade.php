<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    @yield('css')
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
        <h2> <span>Quản Lý quizz</span></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ BASE_URL.'mon-hoc'  }}"><span class="las la-home"></span>
                    <span>Trang sinh viên</span></a>
                </li>
                <li>
                    <a href="" class="active"><span class="las la-stethoscope"></span>
                    <span>Môn học</span></a>
                </li>
              
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> 
            </h2>

            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Buscar aquí" />
            </div> -->
            <div class="user-wrapper">
            <img src="{{ IMAGE.$_SESSION['image']}}" width="40px" height="40px" alt="">
                <div>
                    <h4>{{$_SESSION['name']}}  </h4>
                    <small><a href="<?=  BASE_URL.'logout'  ?>">Đăng xuất</a></small>
                </div>
            </div>
        </header>

        @yield('main-content')

    </div>

</body>
<script>
    function hien(){
        document.querySelector("#plus").style.display = "block";
        document.querySelector("#xxx").style.display = "none";
    }
 
</script>
</html>