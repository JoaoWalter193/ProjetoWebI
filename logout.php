<?php
//codigo complexo feito para realizar o logout das contas
session_start();
session_destroy();

header("Location: login.php");
