<?php
// CONTROLLER das mensagens (só o dono).
require "protegido.php";
require "model/Mensagem.php";

$mensagens = listarMensagens();
require "view/mensagens_view.php";
?>
