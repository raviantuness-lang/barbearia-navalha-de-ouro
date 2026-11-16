<?php
// CONTROLLER do contato: recebe o formulário do index.html.
require "model/Mensagem.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

$erro = validarMensagem($nome, $email, $telefone, $mensagem);
if ($erro != "") {
    echo $erro . " <a href='index.html'>Voltar</a>";
    exit;
}

salvarMensagem($nome, $email, $telefone, $mensagem);
header("Location: index.html");
exit;
?>
