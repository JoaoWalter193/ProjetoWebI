<?php
    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
       //fazer a conexao 
        include_once('config.php');
        //verificar se tem no BD
        $sql = "SELECT * FROM usuarios WHERE email= '$email' and senha = '$senha'";
        $result = $connection->query($sql);

        //realizar sessao
        if (mysqli_num_rows($result) < 1) {
            //usuario nao encontrado
            //senha incorreta
            unset($_SESSION["email"]);
            unset($_SESSION["senha"]);
            header("Location: login.php");
        } else {
            $usuario = $result->fetch_assoc();
                //inicio de sessao
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["senha"] = $senha;
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['role'] = $usuario['role'];
        }

    } else {
        //nao estao completos os campos necessarios
        header("Location: login.php");
        print_r("erro");
    }
    //redirecionar caso seja o adm
    if ($_SESSION['role'] == 'admin') {
        header("Location: admboard.php");
    } else if ($_SESSION['role'] == 'usuario') {
        header("Location: menu.php");
    } else {
        echo "ERRO PRA KRL";
    }