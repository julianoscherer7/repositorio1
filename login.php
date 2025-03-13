<?php
session_start();
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        echo "Preencha todos os campos";
        die();
    
}

    $stmt = $pdo->prepare("SELECT * FROM usurarios WHERE email = ?")
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user && hash("sha256", $password) == $user['senha']){
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        header("Location: dashboard.php");
        exit;
    }else{
        echo "Email ou senha inválidos";
        die();
    }
}
?>