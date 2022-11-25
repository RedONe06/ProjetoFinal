<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg " id="menu">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav justify-content-center">

                    <li class="li-logo">
                        <img id="logo" src="./img/logo.png">
                    </li>

                    <li>
                        <a class="nav-link" aria-current="page" href="./Login/form-login.php">Login</a>
                    </li>
                    <li>
                        <a class="nav-link" aria-current="page" href="./cadastro/form-cadastro.php">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <div class="container-index d-flex justify-content-center">
        <div class="box1-index text-center d-flex justify-content-center flex-column">

            <div class="box1-textos">
                <h1>Ihhh deu erro</h1>
                <h3>E agora?</h3>
                <p>De maneira descontraida vamos te mostrar o que cada erro significa.</p>
            </div>

            <div class="card-erro-index">
                <img class="img-card" src="./img/autorizado.webp" alt=""></img>
                <h1>401</h1>
                <h2 class="video-title">Não autorizado</h2>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" href="./cadastro/form-cadastro.php" class="btn  btn-lg" >  <a class="nav-link" aria-current="page" href="./cadastro/form-cadastro.php">Cadastre-se agora</a></button>
            </div>

        </div>
        <div class="box2-index">
            <img class="img401" src="./img/error401.png">
        </div>
    </div>
</body>

</html>