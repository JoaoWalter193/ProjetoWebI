<?php 
//validacao de sessao
session_start();
if (isset($_SESSION["email"]) && $_SESSION["role"] == "admin") {
    $logado = $_SESSION["email"];
} else if (isset($_SESSION["email"]) && $_SESSION["role"] == "usuario" || !isset($_SESSION['email']) && !isset($_SESSION['role'])){
    header("Location: Login.php");
}

        include("config.php");

            if(isset($_POST['update'])){
                    $id = $_POST['id'];
                    $nome = $_POST['nome'];
                    $preco = $_POST['preco'];
                    $estoque = $_POST['estoque'];
                    $descricao = $_POST['descricao'];
                    $sqlupdate = "UPDATE produtos SET nome='$nome',preco='$preco',estoque='$estoque',descricao='$descricao' WHERE id='$id'";

                    if ($connection->query($sqlupdate) === TRUE) {
                        header("Location: produtosAdm.php");
                    } else {
                        echo "Erro ao atualizar o produto: " . $connection->error;
                    }
            } else {
                echo ("Nao esta entrando");
            }

