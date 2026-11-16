<?php
// CONTROLLER do agendamento (público): escolhe o serviço e o dia, vê os horários livres e confirma.
require "model/Item.php";
require "model/Agendamento.php";

$servicos = listarItens();
$servico = "";
$data = "";
$livres = [];
$erro = "";

// Passo 1: agendar.php?servico=...&data=... mostra os horários livres daquele dia
if (isset($_GET['data'])) {
    $servico = $_GET['servico'];
    $data = $_GET['data'];
    if ($data != "") {
        $livres = horariosLivres($data);
    }
}

// Passo 2: formulário enviado, confirma o agendamento
if (isset($_POST['nome'])) {
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $erro = validarAgendamento($servico, $_POST['nome'], $_POST['telefone'], $data, $_POST['hora']);
    if ($erro == "") {
        salvarAgendamento($servico, $_POST['nome'], $_POST['telefone'], $data, $_POST['hora']);
        header("Location: agendar.php?ok=1");
        exit;
    }
    $livres = horariosLivres($data);
}

$ok = isset($_GET['ok']);
require "view/agendar_view.php";
?>
