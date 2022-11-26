<?php
require("../global-methods.php");

function cadastrar($nome, $email, $senha, $senha2, $datanascimento, $ativo){
    try {
        $PDO = conectar_ao_banco();
        $users = procurar_no_banco($PDO, $email);
        if (count($users) > 0)
        {
            echo "<div class='alert alert-danger d-flex justify-content-center' width='80px' height='80px' role='alert'>
                    <p text-align= 'center'>Email já cadastrado.</p>
                  </div>";
            exit;
        }
        if(comparar_senhas($senha, $senha2)){
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
        } else {
            echo "<div class='alert alert-danger d-flex justify-content-center' width='80px' height='80px' role='alert'>
                    <p text-align= 'center'>As senhas devem ser iguais.</p>
                  </div>";
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}

function settar_value($valor){
    if (isset($valor) && $valor != null || $valor != "") {
        echo "value=\"{$valor}\"";
    }
}

function comparar_senhas($senha, $senha2){
    if($senha == $senha2){
        return true;
    } else{
        return false;
    }
}

function procurar_no_banco($PDO, $email){
    $sql = "SELECT email FROM usuarios WHERE email = :email";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $users;
}

function conectar_ao_banco(){
    try{
        $PDO = db_connect();
    } catch (PDOException $erro) {
        $PDO = null;
        echo "Erro na conexão:" . $erro->getMessage();
    }
    return $PDO;
}
?>