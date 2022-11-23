<?php
require_once("init.php");
require("bd-methods.php");
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Teste adm</title>
</head>

<body>
    <h1>PAINEL DO ADM</h1>
    <table width="100%">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data de nascimento</th>
            <th>Ativo</th>
        </tr>
        <?php
            try {
                $stmt = db_connect()->prepare("SELECT * FROM usuarios");
                if ($stmt->execute()) {
                    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                        echo "<tr>
                        <td>".$rs->id."</td>".
                        "<td>".$rs->nome."</td>
                        <td>".$rs->email."</td>
                        <td>".$rs->datanascimento."</td>
                        <td>".$rs->ativo."</td>
                        <td>
                        <center>
                        <a href=\"?act=upd&id=".$rs->id."\">[Alterar]</a>"
                            ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                            ."<a href=\"?act=del&id=".$rs->id."\">[Excluir]</a>
                        </center>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Erro: Não foi possível recuperar os dados do banco de dados";
                }
            } catch (PDOException $erro) {
                    echo "Erro: ".$erro->getMessage();
            }
        ?>
    </table>

<?php
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    try {
        $stmt = db_connect()->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $id = $rs->id;
            $nome = $rs->nome;
            $email = $rs->email;
            $senha = $rs->senha;
            $datanascimento = $rs->datanascimento;
            $ativo = $rs->ativo;

            echo "<form action='painel-adm.php' method='POST'>".
            "<input type='hidden' name='id' value='{$id}'>".
            "<input type='text' placeholder='Nome' name='nome' value='{$nome}'>".
            "<input type='text' placeholder='Email' name='email' value='{$email}'>".
            "<input type='date' name='datanascimento' value='{$datanascimento}'>";

            if($ativo == 1){
                echo "
                <label for='ativo'>Ativo</label>
                <input type='radio' name='radio' id='ativo' value='1' checked='checked'>
                <label for='inativo'>Inativo</label>
                <input type='radio' name='radio' id='inativo' value='0'>";
            } else {
                echo "
                <label for='ativo'>Ativo</label>
                <input type='radio' name='radio' id='ativo' value='1'>
                <label for='inativo'>Inativo</label>
                <input type='radio' name='radio' id='inativo' value='0' checked='checked'>";
            }

            echo "<input type='submit' name='salvar' value='Salvar'/>".
            "</form>";
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    try {
        $stmt = db_connect()->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "Registo foi excluído com êxito";
            $id = null;
            
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}


if(isset($_POST['salvar'])){
    try {
        if ($id != "") {
            $stmt = db_connect()->prepare("UPDATE usuarios SET nome=?, email=?, datanascimento=?, ativo=? WHERE id = ?");
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $datanascimento);
            $stmt->bindParam(4, $ativo);
            $stmt->bindParam(5, $id);

            if ($stmt->execute()) {
                echo "Dados editados com sucesso!";
                $id = null;
                $nome = null;
                $email = null;
                $senha = null;
                $datanascimento = null;
                $ativo = false;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } else {
            echo "Id não identificado";
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}
?>
    <a href="form-login.php">Voltar pro formulário de login</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>
</html>