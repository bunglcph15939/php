
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
  <link rel="stylesheet" href="../web/css/css.css">
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

           <body >
               <div class="row">
                   <div class="col-lg-2"></div>
                   <div class="col-lg-8">
                   <!-- sdjcbd     -->
                   <main class="container mt-5 card p-3">
        <div class="main__title">
            <i class="ti-bookmark-alt"></i>
            <span class="">Bài 3</span>
        </div>
        <div  class="alert alert-success alert-dismissible mt-3 d-flex ">
            <strong class="mx-2">Thời gian:</strong><div id="demo"></div>
        </div>
       
        <div class="btn d-flex flex-column align-items-start mt-3">
        <?php $i=0; 
            foreach ($model as $hoi){
               $i++;
            
            ?>
            <div class="main__title">
                <span class="text-primary">câu <?=  $i.":". $hoi->name ?></span>
            </div>
            <form action="<?= BASE_URL . 'nop-bai'?>" method="post" class="d-flex flex-column align-items-start" onsubmit="confirm('bạn chấp nhận')" id="form-1">
            <?php  foreach($mang[$hoi->id] as $tl){  ?>
            <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="check1" name="is_correct[]" value="<?= $tl->is_correct ?>" >
              
                       
                  <label class="form-check-label" for="check1"><?= $tl->content ?></label>
               

            </div>
            <?php } ?>
               <?php }  ?> 
             
                  
                <button type="submit" class="btn btn-primary mt-3" >Gửi câu hỏi</button>

              </form>
        </div>
        
    </main>


                   </div>
               </div>
           </body>
  
           <footer>
        <div class="footer-chu"><b>Hello</b></div>
    </footer>

</div>
</body>

<script>
    var now = new Date();
    var entime= new Date(now);
     entime.setMinutes(now.getMinutes()+<?= $time->duration_minutes ?>)
    // entime.setSeconds(now.getSeconds()+10);
// Set the date we're counting down to
var countDownDate = entime.getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML =  hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    $('#form-1').trigger('submit')
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

</html>
   

