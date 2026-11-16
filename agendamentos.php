<?php
// CONTROLLER dos agendamentos (só o dono).
require "protegido.php";
require "model/Agendamento.php";

$agendamentos = array_reverse(listarAgendamentos());
require "view/agendamentos_view.php";
?>
