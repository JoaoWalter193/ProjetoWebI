<?php
if(!empty($_GET['id']) && (!empty($_GET['table']))){

    include('config.php');

    $id = $_GET['id'];
    $table = $_GET['table'];

    $sqlSelect = "SELECT * FROM $table WHERE id='$id'";

    $result = $connection->query($sqlSelect);

    if ($result->num_rows > 0){
        mysqli_query($connection,"DELETE FROM $table WHERE id=$id");
    }
    
}

if ($table =='usuarios'){
    header("Location: usuariosAdm.php");
} else if ($table == 'produtos'){
    header('Location: prodtusoAdm.php');
} else {
    print('ERRO EM ALGUMA COISA MEU DEUS CORRE');
}