<?php 
include_once ("config.php");
//validacao de sessao
session_start();
if (isset($_SESSION["email"]) && $_SESSION["role"] == "admin") {
    $logado = $_SESSION["email"];
} else if (isset($_SESSION["email"]) && $_SESSION["role"] == "usuario" || !isset($_SESSION['email']) && !isset($_SESSION['role'])){
    header("Location: Login.php");
}


//requisicao do banco de dados para mostrar

if (empty($_GET['search'])){
    $sql = "SELECT * FROM produtos ORDER BY id DESC";
} else {
    $data = $_GET['search'];
    $sql = "SELECT * FROM produtos WHERE id LIKE '%$data%' OR nome LIKE '%d$data%' OR categoria LIKE '%$data%' OR descricao LIKE '%$data%' ";
}


$result = $connection->query($sql); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="styles/estiloProdutosAdm.css">
    <script src="https://kit.fontawesome.com/03e61e10fd.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUTOS</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="voltar">
                <a href="admboard.php"><button id="botao_voltar">VOLTAR</button></a>
                <a href="admboard.php"><i class="fa-solid fa-arrow-left-long" ></i></a> <!--Se der tempo fazer com que mude a cor do botao -->
            </div>    
            <h1><b>PRODUTOS</b></h1>
        </div>
    </header>
    <div class="pesquisa">
        <input type="search" placeholder="Pesquisar" id="pesquisar">
        <button class="lupa" onclick="searchData()"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <table class="tabela">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($user_data = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<tr>"; 
                    echo "<td>" . $user_data['id'], '</td>';    
                    echo "<td>" . $user_data['nome'], '</td>';
                    echo "<td>" . $user_data['categoria'], '</td>';
                    echo "<td>" . $user_data['preco'], '</td>';
                    echo "<td>" . $user_data['estoque'], '</td>';
                    echo "<td>" . $user_data['descricao'], '</td>';
                    echo "<td>
                    <div class= 'icones'> 
                        <div class= 'lapis'>
                            <a href='formProd.php?id=$user_data[id]&table=produtos'><i class='fa-solid fa-pen' title='Editar' ></i></a>
                        </div>
                        <div class= 'lixo'>
                            <a href='delete.php?id=$user_data[id]&table=produtos'><i class='fa-solid fa-trash-can' title='Excluir'></i></a>
                        </div>
                        </div>
                    </td>";
                }
                        ?>
        </tbody>
    </table>
    </div>
</body>
<script>
    var search =document.getElementById('pesquisar');

    search.addEventListener("keypress" , function(event){
        if (event.key === "Enter"){
            console.log("indo");
            searchData();
        }
    })
    function searchData(){
        window.location = 'produtosAdm.php?search='+search.value;
    }
</script>
</html>
