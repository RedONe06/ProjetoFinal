<?php
require('init.php');
?>

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
                    <img id="logo" src="../img/logo.png">
                    </li>

                    <li >
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li >
                        <a class="nav-link" aria-current="page" href="form-cadastro.php">Cadastrar</a>
                    </li>


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
                <input type="password" name="senha" class="form-control" id="password" aria-label="Amount (to the nearest dollar)">
                <span class="input-group-text" id="togglePassword"><img id="olho" src="../img/eyeF.svg"
                        alt="icone de olho"></span>
            </div>


            <div class="mb-3 form-check d-flex justify-content-end">
                <div id="emailHelp" class="form-text"><a href="form-cadastro.php"
                        class="opcaoCadastrarAgora">Cadastrar-se agora</a></div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn  btn-lg" name="login">Entrar</button>
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
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
if(isset($_POST["login"])){

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    
    if (empty($email) || empty($senha))
    {
        echo "Informe email e senha";
        exit;
    }
     
    $senhaHash = make_hash($senha);
    
    try{
        $PDO = db_connect();
    } catch (PDOException $erro) {
        echo "Erro na conexão:" . $erro->getMessage();
    }
    
    $sql = "SELECT id, ativo FROM usuarios WHERE email = :email AND senha = :senha";
    $stmt = $PDO->prepare($sql);
     
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senhaHash);
     
    $stmt->execute();
     
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
    if (count($users) <= 0)
    {
        echo "Email ou senha incorretos";
        exit;
    }
     
    $user = $users[0];
    
    if($user['ativo'] == false){
        echo "Você ainda não está autorizado pelo ADM. Aguarde a autorização.";
        exit;
    }
    
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    
    if($_SESSION['user_id'] == "1"){
        header('Location: painel-adm.php');
    } else {
        header('Location: painel.php');
    }
}
?>