
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ CSS.'css.css' }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container-fliud">
      <nav class="navbar navbar-expand-sm navbar-dark bg-warning">
          <a class="navbar-brand" href="#">QUIZZZ</a>
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation"></button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                      <a class="nav-link" href="<?= BASE_URL . 'mon-hoc'?>">Trang chủ <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Tin tức</a>
                  </li>
                  <li class="nav-item active dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Định hướng nghề</a>
                      <div class="dropdown-menu" aria-labelledby="dropdownId">
                          <a class="dropdown-item" href="#">Action 1</a>
                          <a class="dropdown-item" href="#">Action 2</a>
                      </div>
                  </li>
              </ul>
            
              <div class="nav-item active dropdown">
             
             <a class="nav-link dropdown-toggle" href="#" id="dropdownname" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href=""><img src="<?=IMAGE.$_SESSION['image']?>" class="rounded-circle" alt="Cinque Terre"width="30" height="30"><?=$_SESSION['name']?> </a> 
             <div class="dropdown-menu" aria-labelledby="dropdownname">
                         <?= $_SESSION['role']==1  ? "<a class='dropdown-item' href=".BASE_URL.'quantri/index'.">Trang admin</a>" :""  ?>
                          <a class="dropdown-item" href="<?= BASE_URL . 'logout'?>">Đăng Xuất</a>
                      </div>
                
            </div>
          </div>
      </nav>
      @yield('mon')
      <footer>
        <div class="footer-chu"><b>Hello</b></div>
    </footer>

</div>
</body>
<script></script>

</html>
