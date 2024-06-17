<?php
//validacao de sessao
session_start();
if (isset($_SESSION["email"]) && $_SESSION["role"] == "admin") {
    $logado = $_SESSION["email"];
} else if (isset($_SESSION["email"]) && $_SESSION["role"] == "usuario" || !isset($_SESSION['email']) && !isset($_SESSION['role'])){
    header("Location: Login.php");
}

    include_once("config.php");

    if(isset($_POST['update'])){
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cel = $_POST['celular'];
        $cpf = $_POST['cpf'];
        $nasc = $_POST['dataNascimento'];
        $senha = $_POST['senha'];
        $confSenha = $_POST['confirmarSenha'];
    
        $sqlUpdate = "UPDATE usuarios SET nome='$nome',email='$email',cel='$cel',cpf='$cpf',
        nasc='$nasc',senha='$senha',confSenha='$confSenha' WHERE id='$id'";

        $result= $connection->query($sqlUpdate);

    } else {
        header("Location: usuariosAdn.php");
    }
    
    header("Location: usuariosAdm.php");