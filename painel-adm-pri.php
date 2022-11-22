<!DOCTYPE html>
<html lang="en">

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
                        <a class="nav-link" aria-current="page" href="form-cadastro-pri.php">Cadastrar</a>
                    </li>


                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<body>
    <form class="row g-0" action="#" method="POST" name="form1">


        <h1 class="d-flex justify-content-center" id="tituloAgenda">Solicitações de novos usuários</h1>
        <hr>
        <div class="d-flex justify-content-start ms-5">

            <div class="mb-3 row">
                <label for="inputEmail4" class="form-label">Nome</label>
                <input class="form-control" style="width:300px ;" type="text" name="nome" />
            </div>

            <div class="mb-3 row">
                <label for="inputEmail4" class="form-label">Email</label>
                <input class="form-control" style="width:300px ;" type="text" name="email" />

            </div>
            <div class="mb-3 row">
                <label for="inputEmail4" class="form-label">Data de nascimento</label>
                <input class="form-control" style="width:300px ;" type="text" name="celular" />


            </div>
            <div class=" mt-4" id="div-botoes-editar">
                <input type="submit" value="Salvar" class="btn" />
                <input type="reset" value="Novo" class="btn" />
            </div>
        </div>

        <hr>
    </form>

    <table class="table table-striped table-hover" width="70%  ">
        <tr class="table">
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data de nascimento</th>
            <th>Ativo</th>
        </tr>