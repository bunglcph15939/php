
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng ký tài khoản mới</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./web/css/dangky.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
       
        <main>
            <div class="container">
                <div class="register-form">
                    <form action="<?= BASE_URL . 'tao-tai-khoan'?>" method="post" enctype="multipart/form-data">
                        <h1>Đăng ký tài khoản mới</h1>
                        <div class="input-box">

                            <input type="text" placeholder="Nhập username"name="name">
                        </div>
                         <div class="input-box">

                            <input type="text" placeholder="Nhập email"name="email">
                        </div>
                        <div class="input-box">

                            <input type="password" placeholder="Nhập mật khẩu"name="pass">
                        </div>
                         <div class="input-box">

                            <input type="hidden" name="role"value="2">
                        </div>
                        
                        
                        <div class="input-box">
                           
                            <br>
                           <input type="file" name="image">
                        </div>
                        
                        <div class="btn-box">
                            <button type="submit">
                                Đăng ký
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
       
    </body>
</html>