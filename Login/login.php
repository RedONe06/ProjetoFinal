<?php
require 'init.php';
 
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

if (empty($email) || empty($senha))
{
    echo "Informe email e senha";
    exit;
}
 
$senhaHash = make_hash($senha);

try{
    $PDO = db_connect();
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

$sql = "SELECT id, ativo FROM usuarios WHERE email = :email AND senha = :senha";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senhaHash);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
    echo "Email ou senha incorretos";
    exit;
}
 
$user = $users[0];

if($user['ativo'] == false){
    echo "Você ainda não está autorizado pelo ADM. Aguarde a autorização.";
    exit;
}

session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

if($_SESSION['user_id'] == "1"){
    header('Location: painel-adm.php');
} else {
    header('Location: painel.php');
}
?>