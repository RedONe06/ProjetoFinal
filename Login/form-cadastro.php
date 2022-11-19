<?php
require("post.php");
require_once("init.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="cadastro.php" method="post">
        <input type="text" name="nome" placeholder="nome" <?php
            if (isset($nome) && $nome != null || $nome != "") {
                echo "value=\"{$nome}\"";
            }
            ?>>
        <input type="text" name="email" placeholder="email" <?php
            if (isset($email) && $email != null || $email != "") {
                echo "value=\"{$email}\"";
            }
            ?>>
        <input type="text" name="senha" placeholder="senha" <?php
            if (isset($senha) && $senha != null || $senha != "") {
                echo "value=\"{$senha}\"";
            }
            ?>>
        <input type="date" name="datanascimento" placeholder="data de nascimento" <?php
            if (isset($datanascimento) && $datanascimento != null || $datanascimento != "") {
                echo "value=\"{$datanascimento}\"";
            }
            ?>>
        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
    <a href="form-login.php">Voltar</a>
</body>
</html>
