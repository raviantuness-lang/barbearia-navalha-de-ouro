<?php
// Guarda das páginas do dono: se não estiver logado, volta para o login.
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}
?>
