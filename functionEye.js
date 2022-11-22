let btn = document.querySelector('#togglePassword');
let olho = document.querySelector('#olho');

btn.addEventListener('click', function () {
    let input = document.querySelector('#password');
    if (input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
        olho.setAttribute('src', './img/eye.svg');

    } else {
        input.setAttribute('type', 'password');
        olho.setAttribute('src', './img/eyeF.svg');
    }
});