let btn = document.querySelector('#togglePassword');
let olho = document.querySelector('#olho');

btn.addEventListener('click', function () {
    let input = document.querySelector('#password');
    if (input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
        olho.setAttribute('src', '../img/eye.svg');
    } else {
        input.setAttribute('type', 'password');
        olho.setAttribute('src', '../img/eyeF.svg');
    }
});

let btn2 = document.querySelector('#togglePassword2');
let olho2 = document.querySelector('#olho2');
btn2.addEventListener('click', function () {
    let input2 = document.querySelector('#password2');
    if (input2.getAttribute('type') == 'password') {
        input2.setAttribute('type', 'text');
        olho2.setAttribute('src', '../img/eye.svg');
    } else {
        input2.setAttribute('type', 'password');
        olho2.setAttribute('src', '../img/eyeF.svg');
    }
});