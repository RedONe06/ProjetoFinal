<?
require_once("init.php");
// tela principal do usuario logado
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
    <title>Painel</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg " id="menu">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav justify-content-center">

                    <li class="li-logo">
                        <img id="logo">LOGO AQUI</img>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>

    <div class="container-imagens">

        <div class="box-imagens">
            <img class="img-card" src="./img/continua.jpg" alt=""></img>
            <h1>100</h1>
            <h2 class="video-title">Continue</h2>
        </div>

        <div class="box-imagens">
            <img class="img-card" src="./img/mudando.jpg" alt=""></img>
            <h1>101</h1>
            <h2 class="video-title">Mudando os protocolos</h2>
        </div>

        <div class="box-imagens">
            <img class="img-card" src="./img/processando.jpg" alt=""></img>
            <h1>102</h1>
            <h2 class="video-title">Processando</h2>
        </div>

        <div class="box-imagens">
            <img class="img-card" src="./img/ok.jpg" alt=""></img>
            <h1>200</h1>
            <h2 class="video-title">Ok</h2>
        </div>

        <div class="box-imagens">
            <img class="img-card" src="./img/criado.jpg" alt=""></img>
            <h1>201</h1>
            <h2 class="video-title">Criado</h2>
        </div>

        <div class="box-imagens">
            <img class="img-card"src="./img/aceito.jpg" alt=""></img>
            <h1>202</h1>
            <h2 class="video-title">Aceito</h2>
        </div>

        <div class="box-imagens">
            <img class="img-card"src="./img/nao.jpg" alt=""></img>
            <h1>203</h1>
            <h2 class="video-title">Informação não autorizado</h2>
        </div>

        <div class="box-imagens">
            <img class="img-card"src="./img/nenhum.jpg" alt=""></img>
            <h1>202</h1>
            <h2 class="video-title">Nenhum conteúdo</h2>
        </div>

    </div>

</body>

</html>