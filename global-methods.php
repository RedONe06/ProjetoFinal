<?php
require ("init.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $email = (isset($_POST["email"]) && $_POST["email"] != null) ? $_POST["email"] : "";
    $senha = (isset($_POST["senha"]) && $_POST["senha"] != null) ? $_POST["senha"] : "";
    $senha2 = (isset($_POST["senha2"]) && $_POST["senha2"] != null) ? $_POST["senha2"] : "";
    $datanascimento = (isset($_POST["datanascimento"]) && $_POST["datanascimento"] != null) ? $_POST["datanascimento"] : "";
    $ativo = (isset($_POST["radio"]) && $_POST["radio"] != null) ? $_POST["radio"] : "";
}  else  {
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = null;
    $email = null;
    $senha = null;
    $senha2 = null;
    $datanascimento = null;
    $ativo = false;
}
?>