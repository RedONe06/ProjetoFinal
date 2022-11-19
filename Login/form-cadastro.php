<?php
require("bd-methods.php");
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
    <form action="form-cadastro.php" method="post">
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
                echo "Dados cadastrados com sucesso!";
                $nome = null;
                $email = null;
                $senha = null;
                $datanascimento = null;
                $ativo = false;
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}
?>