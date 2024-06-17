<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/estiloLogin.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-S&R</title>
</head>

<body>
    <img src="Imagens/Logo.png" class="logo">
    <form class="tela-login" action="cnfLogin.php" method="POST">
        <div class="login">
            <h1>LOGIN</h1>
        </div>
        <div class="email_senha">
            <div class="e-mail">
                <label for="email">E-mail: </label>
                <input type="text" id="email" name="email">
            </div>
            <br>
            <div class="senha">
                <label for="senha">Senha: </label>
                <input type="password" id="senha" name="senha">
                <span class="toggle-password" onclick="togglePasswordVisibility()"><img src="Imagens/olhoaberto.png"
                id="mostrar-senha" class="olho"></span>
            </div>
        </div>
        <br>
        <br>
        <div class="cadastro">
            <p> Não tem uma conta?<a href="cadastro.php">Cadastre-se</a></p>
        </div>
        <input class="botao" type="submit" name="submit" value="Login">
    </form>
</body>

</html>
<script>
    function togglePasswordVisibility() {
        var senhaInput = document.getElementById("senha");
        var mostrarSenhaImg = document.getElementById("mostrar-senha");

        if (senhaInput.type === "password") {
            senhaInput.type = "text";
            mostrarSenhaImg.src = "Imagens/olhoaberto.png";
        } else {
            senhaInput.type = "password";
            mostrarSenhaImg.src = "Imagens/olhofechado.png";

        }
    }

</script>