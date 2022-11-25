<?php
require("../global-methods.php");

function cadastrar($nome, $email, $senha, $datanascimento, $ativo){
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
                
                echo "<div class='alert alert-success d-flex justify-content-center' width='80px' height='80px' role='alert'>
                <p text-align= 'center'>Dados cadastrados com sucesso!</p>
              </div>";
    
                $nome = null;
                $email = null;
                $senha = null;
                $datanascimento = null;
                $ativo = false;
            } else {
                echo "<div class='alert alert-danger d-flex justify-content-center' width='80px' height='80px' role='alert'>
                <p text-align= 'center'>Erro ao tentar efetivar cadastro</p>
              </div>";
               
            }
        } else {
            throw new PDOException("  Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}


?>