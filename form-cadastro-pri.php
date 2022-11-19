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
<body>
        <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav nav-tabs justify-content-center">

                <li class="nav-item-logo">
                        <img>LOGO AQUI</img>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Entrar</a>
                    </li>
                    
                        
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input name="senha1" type="password" class="form-control" id="InputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirmação de senha</label>
                <input name="senha2" type="password" class="form-control" id="InputPassword2">
            </div>

            <div class="mb-3 form-check d-flex justify-content-end">
                <div id="emailHelp" class="form-text"><a href="#" class="cadastrar">Cadastro sujeito a aprovação</a></div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn  btn-lg">Cadastra</button>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>