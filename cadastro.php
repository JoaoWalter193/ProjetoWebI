<?php
    if(isset($_POST['enviar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cel = $_POST['celular'];
        $cpf = $_POST['cpf'];
        $nasc = $_POST['dataNascimento'];
        $senha = $_POST['senha'];
        $confSenha = $_POST['confirmarSenha'];
        if ($senha != $confSenha){
            echo '<script>alert("Por favor insira senhas iguais");</script>';
        } else {
        
        include_once('config.php');

        $result = mysqli_query($connection, "INSERT INTO usuarios(nome,email,cel,cpf,nasc,senha,confSenha) 
        VALUES ('$nome','$email','$cel','$cpf','$nasc','$senha','$confSenha')");
        header("Location: login.php");
        }    
}
?>


    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="styles/estiloCadastro.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro-S&R</title>
    </head>
    <body>
        <img src="Imagens/Logo.png" class="logo">
        <div class="box">
            <form action="cadastro.php" method="POST" id="formCadastro">
                    <h3 class="titulo"><b>CADASTRO</b></h3>
                    <br>
                    <div class="inputs">
                        <label for="nome">Nome Completo:</label>
                        <input type="text" name="nome" id="nome" class="inputUser" required>
                    </div>
                    <div class="inputs">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" class="inputUser" required>
                    </div>
                    <div class="inputs">
                        <label for="celular">Celular:</label>
                        <input type="text" name="celular" id="celular" class="inputUser" required>

                    </div>
                    <div class="inputs">    
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="inputUser"required>
                        <span id="cpfError">CPF inválido!</span>
                    </div>
                    <div class="inputs">
                    <label for="dataNascimento">Data de Nascimento:</label>
                    <input type="date" name="dataNascimento" id="dataNascimento" required>
                    </div>
                    <div class="inputs">    
                        <label for="senha">Digite sua senha:</label>
                        <input type="password" name="senha" id="senha" class="inputUser"required>
                    </div>
                    <div class="inputs">    
                        <label for="confirmarSenha">Confirme sua Senha:</label>
                        <input type="password" name="confirmarSenha" id="confirmarSenha" class="inputUser"required>
                    </div>
                    <br><br><br><br>
                    <input type="submit" name="enviar" id="enviar" value="Cadastrar">
            </form>
        </div>
    </body>
    </html>

