<?php
// CONTROLLER do login e da saída do dono (senha fixa só para estudo).
session_start();

// Sair: login.php?sair=1
if (isset($_GET['sair'])) {
    session_destroy();
    header("Location: index.html");
    exit;
}

$erro = "";
if (isset($_POST['senha'])) {
    if ($_POST['senha'] == "navalha123") {
        $_SESSION['logado'] = true;
        header("Location: gerenciar_catalogo.php");
        exit;
    }
    $erro = "Senha incorreta.";
}
require "view/login_view.php";
?>
