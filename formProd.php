<?php
//validacao de sessao
session_start();
if (isset($_SESSION["email"]) && $_SESSION["role"] == "admin") {
    $logado = $_SESSION["email"];
} else if (isset($_SESSION["email"]) && $_SESSION["role"] == "usuario" || !isset($_SESSION['email']) && !isset($_SESSION['role'])){
    header("Location: Login.php");
}

$nome = "";
$preco = "";
$estoque = "";
$descricao = "";


    if (!empty($_GET['id'])){
        include_once('config.php');

        $id = $_GET['id'];

        $sql = "SELECT * FROM produtos WHERE id=$id";

        $result = mysqli_query($connection, $sql);

        if ($result->num_rows > 0) {
            while($prod_data = mysqli_fetch_assoc($result)) {
                $nome = $prod_data["nome"];
                $preco = $prod_data["preco"];
                $estoque = $prod_data["estoque"];
                $descricao = $prod_data["descricao"];
            }
        } else {
            header("Location: produtosAdm.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="styles/estiloProdForm.css">
    <script src="https://kit.fontawesome.com/03e61e10fd.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PRODUTO-S&R</title>
</head>
<body>
<header>
     <div class="header">
        <div class="voltar">
            <a href="produtosAdm.php"><button id="botao_voltar">VOLTAR</button></a>
            <a href="produtosAdm.php"><i class="fa-solid fa-arrow-left-long"></i></a>
        </div>    
        <h1 id="titulo"><b>PRODUTO-FORMULÁRIO</b></h1>
    </div>
</header>
    <form action="updateProd.php" method="POST" class="formProd">
        <br>
        <div class="inputs">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="inputUser" value="<?php echo $nome?>" required>
        </div>
        <div class="inputs">
        <div class="preco-estoque">
            <div class="preco">
                <label for="preco">Preço:</label>
                <input type="number" name="preco" class="inputUser" step="0.01" value="<?php echo $preco?>" required>
            </div>
            <div class="estoque">
                <label for="estoque">Estoque:</label>
                <input type="number" name="estoque" class="inputUser"  value="<?php echo $estoque?>" required>
            </div>
        </div>
        </div>
        <div class="inputs">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="desc_input" rows="4" class="inputUser" required><?php echo $descricao?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <br>
        <input type="submit" value="ATUALIZAR" name="update" id="update">
    </form>
</body>
</html>