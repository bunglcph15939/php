var $ = document.querySelector.bind(document);
var $$ = document.querySelectorAll.bind(document);

function login_register(){
    $('.btn--register').onclick = () => {
        anima_hiden($('.form--login'))
        anima_block( $('.form--register'))
    }
    $('.btn--login').onclick = () => {
        anima_hiden($('.form--register'))
        anima_block( $('.form--login'))
    }
    window.onload = () => {
        anima_hiden($('.form--register'))
        anima_block( $('.form--login'))
    }
    function anima_hiden(ts) {
        Object.assign(
            ts.style, {
            transform: "translateY(100%)",
            opacity:"0"
        })
    }
    function anima_block(ts) {
        Object.assign(
            ts.style, {
            transform: "translateY(0)",
            opacity:"1"
        })
    }
    $('.form--register').onsubmit = (a)=>{
        check = true;
        error = $$('.form--register .form-message');
        check_email = /$[0-9a-zA-Z]{5,100}@[a-zA-Z]^/;
        if( $('#name_dk').value.length == 0){
            check = false;
            error[0].innerHTML = "bạn nhập rỗng";
        }else{
            error[0].innerHTML = "";
        }
        if($('#email_dk').value.length == 0){
            check = false;
            error[1].innerHTML = "bạn nhập rỗng";
        }else if(check_email.test($('#email_dk').value)){
            check = false;
            error[1].innerHTML = "bạn nhập sai ký tự";
        }else{
            error[1].innerHTML = "";
        }
        if( $('#password_dk').value.length == 0){
            check = false;
            error[2].innerHTML = "bạn nhập rỗng";
        }else{
            error[2].innerHTML = "";
        }
    
        if(check == false){
           a.preventDefault();
        }else{
            alert('bạn đăng ký thành công');
        }

        return check;
        
    }
    $('.form--login').onsubmit = (a)=>{
        check = true;
        error = $$('.form--login .form-message');
        
        if($('#email').value.length == 0){
            check = false;
            error[0].innerHTML = "bạn nhập rỗng";
        }
        else{
            error[0].innerHTML = "";
        }
        if( $('#password').value.length == 0){
            check = false;
            error[1].innerHTML = "bạn nhập rỗng";
        }else{
            error[1].innerHTML = "";
        }
    
        if(check == false){
           a.preventDefault();
        }else{
            alert('bạn đăng nhập thành công');
        }

        return check;
    }
    // $('#image').oninput = (a)=>{
    //     console.log(a.target.value.split('\\'))
    //     url = a.target.value.split('\\').pop();
    //     img = document.createElement('img');
    //     img.style.width = "100px";
    //     img.classList.add('.img_avatar');
    //     img.src ='../img/Avatar.png'
    //     //a.target.value;
    //     $('.form-group-avatar').appendChild(img);
    // }
}
login_register();

