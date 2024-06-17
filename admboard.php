<?php 
include_once ("config.php");
//validacao de sessao
session_start();
if (isset($_SESSION["email"]) && $_SESSION["role"] == "admin") {
    $logado = $_SESSION["email"];
} else if (isset($_SESSION["email"]) && $_SESSION["role"] == "usuario") {
    header("Location: Login.php");
} else {
    header("Location: login.php");
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="styles/estiloAdmBoard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>


<body>
    <header>
        <div class="header">
            <h1>ADMINISTRAÇÃO S&R</h1>
        </div>
    </header>
    <main>
        <div class="botoes">
            <div class="usuarios">
                <a href="usuariosAdm.php"><button><b>USUÁRIOS</b></button></a>
            </div>
            <div class="produtos">
                <a href="produtosAdm.php"><button><b>PRODUTOS</b></button></a>
            </div>
        </div>
        <div class="sair"> 
            <a href="logout.php">Sair do administrador</a>
        </div>
    </main>    
</body>
</html>