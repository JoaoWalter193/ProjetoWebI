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



include_once("config.php");
if (isset($_SESSION ['email'])) {
    $id = $_SESSION ['id'];
    
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        
        $nome = $user_data["nome"];
        $email = $user_data["email"];
        $cel = $user_data["cel"];
        $cpf = $user_data["cpf"];
        $nascBD = $user_data["nasc"];
        

        //fazer a inverção da data para formato brasileiro
        $data = new DateTime($nascBD);
        $nasc = $data->format('d-m-Y');
        }


    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/estiloConta.css">
    <script src="https://kit.fontawesome.com/03e61e10fd.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta-S&R</title>
</head>
<body>
<header>
        <div class="header">
            <div class="img_header">
                <img src="Imagens/Logo.png" id="logo">
            </div>
            <div class="texto">
                <h1 id="titulo"><b>SUA CONTA-STICKS&ROCKS</b></h1>
            </div>
            <div class="voltar">
                <i class="fa-solid fa-arrow-left-long" onclick="voltarMenu()"></i>
                <input type="submit" value="VOLTAR" onclick="voltarMenu()">
            </div>
        </div>
    </header>
    <main>
        <div class="conta">
            <div class="dados">
                <label for="nome">Nome Completo:</label>
                <p name="nome" class="pUser"><?php echo $nome ?></p>                
            </div>
            <div class="dados">
                <label for="email">E-mail:</label>
                <p name="email" class="pUser"> <?php echo $email ?></p>
            </div>
            <div class="dados">
              <div class="cel_cpf">
                  <div class="cpf">
                      <label for="Cpf">Cpf:</label>
                      <p name="Cpf" class="pUser"><?php echo $cpf ?></p>       
                    </div>
                    <div class="cel">
                        <label for="cel">Celular:</label>
                        <p name="cel" class="pUser"><?php echo $cel ?></p>       
                   </div>
                </div>
            </div>
            <div class="nasc">
                <label for="nome">Data de Nascimento:</label>
                <p name="nome" class="pUser" id="nasc"><?php echo $nasc ?></p>       
            </div>
            <div class="sair">
                <button onclick="deslogar()">
                    <span>SAIR</span>
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </div>
        </div>  
    </main>
</body>
<script>
    function voltarMenu(){
        window.location.href="menu.php";
    }
    function deslogar(){
        window.location.href="logout.php";
    }
</script>
</html>