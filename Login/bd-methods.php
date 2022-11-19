<?php
//TODO Verificar se o email do usuário já existe no banco antes de continuar o cadastro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $email = (isset($_POST["email"]) && $_POST["email"] != null) ? $_POST["email"] : "";
    $senha = (isset($_POST["senha"]) && $_POST["senha"] != null) ? $_POST["senha"] : "";
    $datanascimento = (isset($_POST["datanascimento"]) && $_POST["datanascimento"] != null) ? $_POST["datanascimento"] : "";
    $ativo = false;
} else {
    $nome = null;
    $email = null;
    $senha = null;
    $datanascimento = null;
    $ativo = false;
}
?>