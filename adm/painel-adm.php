<?php
require("./adm-methods.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Painel adm</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg " id="menu">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav justify-content-center">
                    <li class="li-logo">
                        <img id="logo" src="../img/logo.png">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link opcao-menu" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link opcao-menu" aria-current="page" href="../painel.php">Painel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link opcao-menu" aria-current="page" href="../login/logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body>
    <div class="div-titulo">
        <h1 class="d-flex justify-content-center" id="tituloAgenda">Solicitações de novos usuários</h1>
    </div>

    <div class="container box-tabela">
        <table class="table table-striped table-hover px-2">
            <tr class="table tr-tabela">
                <th class="th-id">Id</th>
                <th class="th-nome">Nome</th>
                <th class="th-email">E-mail</th>
                <th class="th-data">Data de nascimento</th>
                <th class="th-ativo">Ativo</th>
                <th class="th-acoes">Ações</th>
            </tr>
            <?php
            atualizar_tabela();
            ?>
        </table>
    </div>

    <?php
    $informacoes = preencher_form_com_informacoes($id);

    if($informacoes != null){
        $id = $informacoes->id;
        $nome = $informacoes->nome;
        $email = $informacoes->email;
        $datanascimento = $informacoes->datanascimento;
        $ativo = $informacoes->ativo;
    }
    
    action_deletar($id);

    if (isset($_POST['salvar'])) {
        salvar_alteracoes($id, $nome, $email, $datanascimento, $ativo);
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
</body>

</html>