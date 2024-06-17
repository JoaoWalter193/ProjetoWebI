<?php
    //validacao de sessao
session_start();
if (isset($_SESSION["email"]) && $_SESSION["role"] == "admin") {
    $logado = $_SESSION["email"];
} else if (isset($_SESSION["email"]) && $_SESSION["role"] == "usuario" || !isset($_SESSION['email']) && !isset($_SESSION['role'])){
    header("Location: Login.php");
}

    
    
    if(!empty($_GET['id'])){
        include_once('config.php');
        
        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

        $result = $connection->query($sqlSelect);



        if ($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
                $id = $user_data['id'];
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $cel = $user_data['cel'];
                $cpf = $user_data['cpf'];
                $nasc = $user_data['nasc'];
                $senha = $user_data['senha'];
                $senha2 = $user_data['confSenha'];  
            }

        } else {
            header('Location: usuariosAdm.php');
        }

}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/estiloFormUser.css">
    <script src="https://kit.fontawesome.com/03e61e10fd.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR USUARIO-S&R</title>
</head>
<body>
<header>
        <div class="header">
            <div class="voltar">
                <a href="usuariosAdm.php"><button id="botao_voltar">VOLTAR</button></a>
                <a href="usuariosAdm.php"><i class="fa-solid fa-arrow-left-long"></i></a> <!--Se der tempo fazer com que mude a cor do botao -->
            </div>    
            <h1 id="titulo"><b>USUÁRIO-FORMULÁRIO</b></h1>
        </div>
    </header>
    <div class="box">
        <form action="updateUser.php" method="POST" id="formCadastro">
                <br>
                <div class="inputs">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome?>" required>
                </div>
                <div class="inputs">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email?>" required>
                </div>
                <div class="inputs">
                    <label for="celular">Celular:</label>
                    <input type="number" name="celular" id="celular" class="inputUser" value="<?php echo $cel?>" required>
                </div>
                <div class="inputs">    
                    <label for="cpf">CPF:</label>
                    <input type="number" name="cpf" id="cpf" class="inputUser" value="<?php echo $cpf?>" required>
                </div>
                <label for="dataNascimento">Data de Nascimento:</label>
                <input type="date" name="dataNascimento" id="dataNascimento" value="<?php echo $nasc?>" required>
                <br>
                <div class="inputs">    
                    <label for="senha">Senha:</label>
                    <input type="text" name="senha" id="senha" class="inputUser" value="<?php echo $senha?>" required>
                </div>
                <div class="inputs">    
                    <label for="confirmarSenha">Cnf Senha:</label>
                    <input type="text" name="confirmarSenha" id="confirmarSenha" class="inputUser" value="<?php echo $senha2 ?>" required>
                </div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <br><br><br><br>
                <input type="submit" name="update" id="update" value="ATUALIZAR">
        </form>
    </div>
</body>
</html>
