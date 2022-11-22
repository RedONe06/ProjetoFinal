<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
 
    <title>Document</title>
</head>
<header>

    <nav class="navbar navbar-expand-lg " id="menu">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav justify-content-center">

                    <li class="li-logo">
                        <img id="logo" >LOGO AQUI</img>
                    </li>

                    <li >
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li >
                        <a class="nav-link" aria-current="page" href="index.php">Entrar</a>
                    </li>


                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
    <body>
    <div class="container-fluid d-flex justify-content-center mt-4">
        <form class="box border border-2 p-3 rounded">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input name="nome" type="text" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Data de aniversário</label>
                <input name="dataNasc" type="date" class="form-control" >
            </div>

            <label for="exampleInputPassword1" class="form-label">Senha</label>
            <div class="input-group mb-3">
                <input name="senha1" type="password" id="password" class="form-control" >
                <span class="input-group-text" id="togglePassword"><img id="olho" src="./img/eyeF.svg"
                        alt="icone de olho"></span>
            </div>

            <label class="form-label">Confirmação de senha</label>
            <div class="input-group mb-3">
                <input name="senha2" type="password" id="password2" class="form-control">
                <span class="input-group-text" id="togglePassword2"><img id="olho2" src="./img/eyeF.svg"
                        alt="icone de olho"></span>
            </div>

            <div class="mb-3 form-check d-flex justify-content-end">
                <div id="emailHelp" class="form-text"><a href="#" class="cadastrar">Cadastro sujeito a aprovação</a></div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn  btn-lg">Cadastrar</button>
            </div>
        </form>

    </div>

    <script>
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
        let btn2 = document.querySelector('#togglePassword2');
        let olho2 = document.querySelector('#olho2');
        btn2.addEventListener('click', function () {
            let input2 = document.querySelector('#password2');
            if (input2.getAttribute('type') == 'password') {
                input2.setAttribute('type', 'text');
                olho2.setAttribute('src', './img/eye.svg');

            } else {
                input2.setAttribute('type', 'password');
                olho2.setAttribute('src', './img/eyeF.svg');
            }
        });

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>