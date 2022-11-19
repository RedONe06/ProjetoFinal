<?php
require_once("init.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Login</title>
</head>

<body>
    <form action="login.php" method="post">
        <h1>Formulário de login</h1>
        <input type="text" name="email" id="email">
        <input type="password" name="senha" id="senha">
        <button type="submit" name="login">Entrar</button>
        <a href="form-cadastro.php">Fazer o cadastro</a>
    </form>
</body>

</html>