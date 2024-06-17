<?php
session_start();
include_once ("config.php");
//validacao de sessao
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
$login = $_SESSION['email'];

$idProduto = 1; //para testes, futuramente atualizar para poder selecionar oque deseja visualizar

$sql = "SELECT * FROM produtos WHERE id = '$idProduto'";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    //pega os valores e joga em uma matriz associativa
    $produto = $result->fetch_assoc();
}

if (isset($_POST['botao_compra']) && !empty($login)) {
    // Redireciona o usuário para a página de compra
    header("Location: compra.php");
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="styles/estiloMenu.css">
    <script src="https://kit.fontawesome.com/03e61e10fd.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S&R</title>
</head>

<body>
    <header>
        <div class="header">
            <div class="img_header">
                <img src="Imagens/Logo.png" id="logo">
            </div>
            <div class="texto">
                <h1 id="titulo"><b>BEM VINDO AO STICKS & ROCKS</b></h1>
            </div>
            <div class="conta">
                <i class="fa-solid fa-user" onclick="entrarConta()"></i>
                <input type="submit" value="CONTA" onclick="entrarConta()">
            </div>
        </div>
    </header>

    <form class="produto" action="menu.php" method="POST">
        <div class="imagem-prod">
            <img src="Imagens/pedra.png" id="imagem_prod">
        </div>
        <div class="dados">
            <h3>Nome:<?php echo $produto['nome'] ?></h3>
            <h3>Categoria:<?php echo $produto['categoria'] ?></h3>
            <h3>Preço:R$<?php echo $produto['preco'] ?></h3>
            <h3>Estoque:<?php echo $produto['estoque'] ?></h3>
        </div>
        <div class="descricao">
            <h3>Descrição:<?php echo $produto['descricao'] ?></h3>
        </div>
        <div class="comprar">
            <input type="submit" value="COMPRAR" name="botao_compra" id="botao_compra">
        </div>
    </form>
</body>

</html>

<script>
    function entrarConta(){
        window.location.href = "conta.php";
    }
</script>