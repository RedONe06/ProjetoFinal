<?php
require("bd-methods.php");
require_once("init.php");
?>

<!DOCTYPE html>
<html lang="pt">
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
                    <img id="logo" src="../img/logo.png">
                    </li>

                    <li >
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li >
                        <a class="nav-link" aria-current="page" href="form-login.php">Login</a>
                    </li>


                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
    <body>
    <div class="container-fluid d-flex justify-content-center mt-4">
        <form class="box border-danger border border-2 p-3 rounded" action="form-cadastro.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input name="nome" type="text" class="form-control" <?php
            if (isset($nome) && $nome != null || $nome != "") {
                echo "value=\"{$nome}\"";
            }
            ?>>
    
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" <?php
            if (isset($email) && $email != null || $email != "") {
                echo "value=\"{$email}\"";
            }
            ?>>
            </div>

            <label for="exampleInputPassword1" class="form-label">Senha</label>
            <div class="input-group mb-3">
                <input name="senha1" type="password" id="password" class="form-control" <?php
            if (isset($senha) && $senha != null || $senha != "") {
                echo "value=\"{$senha}\"";
            }
            ?>> 
                <span class="input-group-text" id="togglePassword"><img id="olho" src="../img/eyeF.svg"
                        alt="icone de olho"></span>
            </div>

            <label class="form-label">Confirmação de senha</label>
            <div class="input-group mb-3">
                <input name="senha2" type="password" id="password2" class="form-control">
                <span class="input-group-text" id="togglePassword2"><img id="olho2" src="../img/eyeF.svg"
                        alt="icone de olho"></span>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Data de aniversário</label>
                <input name="dataNasc" type="date" class="form-control" <?php
            if (isset($datanascimento) && $datanascimento != null || $datanascimento != "") {
                echo "value=\"{$datanascimento}\"";
            }
            ?>>
            </div>

            

            <div class="mb-3 form-check d-flex justify-content-end">
                <div id="emailHelp" class="form-text"><a href="#" class="cadastrar">Cadastro sujeito a aprovação</a></div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn  btn-lg" name="cadastrar">Cadastrar</button>
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

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST["cadastrar"])) {
    try {
        $stmt = db_connect()->prepare("INSERT INTO usuarios (nome, email, senha, datanascimento, ativo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $senha = make_hash($senha);
        $stmt->bindParam(3, $senha);
        $stmt->bindParam(4, $datanascimento);
        $stmt->bindParam(5, $ativo);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                
                echo "<div class='alert alert-success d-flex justify-content-center' width='80px' height='80px' role='alert'>
                <p text-align= 'center'>Dados cadastrados com sucesso!</p>
              </div>";

                $nome = null;
                $email = null;
                $senha = null;
                $datanascimento = null;
                $ativo = false;
            } else {
                echo "<div class='alert alert-danger d-flex justify-content-center' width='80px' height='80px' role='alert'>
                <p text-align= 'center'>Erro ao tentar efetivar cadastro</p>
              </div>";
               
            }
        } else {
            throw new PDOException("  Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}
?>