<?php
require('login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Login</title>
</head>
<header>
<<<<<<< HEAD

=======
>>>>>>> c51c23315ffba0a8af8c58e6b82ea916d5a59fbf
    <nav class="navbar navbar-expand-lg menu-index" id="menu">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav justify-content-center">
                    <li class="li-logo">
                        <img id="logo" src="../img/logo.png">
                    </li>
<<<<<<< HEAD

=======
>>>>>>> c51c23315ffba0a8af8c58e6b82ea916d5a59fbf
                    <li >
                        <a class="nav-link opcao-menu" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li >
                        <a class="nav-link opcao-menu" aria-current="page" href="../cadastro/form-cadastro.php">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body>
    <div class="container-fluid d-flex justify-content-center mt-4">

        <form action="form-login.php" method="post" class="box border border-danger border-2 p-3 rounded">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>

            <div class="input-group mb-3">
                <input type="password" name="senha" class="form-control" id="password"
                    aria-label="Amount (to the nearest dollar)">
                <span class="input-group-text" id="togglePassword"><img id="olho" src="../img/eyeF.svg"
                        alt="icone de olho"></span>
            </div>

            <div class="mb-3 form-check d-flex justify-content-end">
                <div id="emailHelp" class="form-text"><a href="../cadastro/form-cadastro.php"
                        class="opcaoCadastrarAgora">Cadastrar-se agora</a></div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn  btn-lg" name="login">Entrar</button>
            </div>
        </form>

    </div>
    <script src="../js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>
</html>
<?php
if(isset($_POST["login"])){
    fazer_login();
}
?>