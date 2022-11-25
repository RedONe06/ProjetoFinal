<?php
require '../init.php';
 
function fazer_login(){

    $dados = iniciar_variaveis();
    $email = $dados["email"];
    $senha = $dados["senha"];
     
    $senhaHash = make_hash($senha);
    $PDO = conectar_ao_banco();

    $stmt = fazer_select($PDO, $email, $senhaHash);

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    if (count($users) <= 0)
    {
        echo "Email ou senha incorretos";
        exit;
    }
     
    $user = $users[0];

    validar_adm($user);
    setar_sessao($user);
}

function iniciar_variaveis(){
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    
    if (empty($email) || empty($senha))
    {
        echo "Informe email e senha";
        exit;
    }
    $usuario = array("senha"=> $senha, "email"=> $email);
    var_dump($usuario);
    return $usuario;
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

function fazer_select($PDO, $email, $senhaHash){
    $sql = "SELECT id, ativo FROM usuarios WHERE email = :email AND senha = :senha";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senhaHash);
    $stmt->execute();
    return $stmt;
}

function validar_adm($user){
    if($user['ativo'] == false){
        echo "Você ainda não está autorizado pelo ADM. Aguarde a autorização.";
        exit;
    }
}

function setar_sessao($user){
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    
    if($_SESSION['user_id'] == "1"){
        header('Location: ../adm/painel-adm.php');
    } else {
        header('Location: ../painel.php');
    }
}
?>