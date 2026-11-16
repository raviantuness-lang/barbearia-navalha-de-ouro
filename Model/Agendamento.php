<?php
// MODEL dos agendamentos: lê e grava o arquivo agendamentos.txt (sem HTML).
// Cada linha do arquivo: servico|nome|telefone|data|hora
date_default_timezone_set("America/Bahia");

// Horários de atendimento (de hora em hora). Domingo a barbearia fecha.
function todosHorarios() {
    return ["09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00"];
}

function listarAgendamentos() {
    $agendamentos = [];
    $texto = file_get_contents(__DIR__ . "/../agendamentos.txt");
    $linhas = explode("\n", $texto);
    foreach ($linhas as $linha) {
        if ($linha != "") {
            $partes = explode("|", $linha, 5);
            $agendamentos[] = [
                "servico" => $partes[0],
                "nome" => $partes[1],
                "telefone" => $partes[2],
                "data" => $partes[3],
                "hora" => $partes[4]
            ];
        }
    }
    return $agendamentos;
}

// Devolve os horários livres de uma data (YYYY-MM-DD).
function horariosLivres($data) {
    if (strtotime($data) === false) {
        return [];
    }
    // date("w") dá o dia da semana: 0 é domingo.
    if (date("w", strtotime($data)) == 0) {
        return [];
    }
    $ocupados = [];
    foreach (listarAgendamentos() as $agendamento) {
        if ($agendamento["data"] == $data) {
            $ocupados[] = $agendamento["hora"];
        }
    }
    $livres = [];
    foreach (todosHorarios() as $hora) {
        if (in_array($hora, $ocupados)) {
            continue;
        }
        // Hoje, não mostra horário que já passou.
        if ($data == date("Y-m-d") && $hora <= date("H:i")) {
            continue;
        }
        $livres[] = $hora;
    }
    return $livres;
}

// Devolve o texto do primeiro erro encontrado, ou "" se está tudo certo.
function validarAgendamento($servico, $nome, $telefone, $data, $hora) {
    if ($servico == "" || $nome == "" || $telefone == "" || $data == "" || $hora == "") {
        return "Preencha todos os campos.";
    }
    if (strpos($servico . $nome, "|") !== false) {
        return "Não use o caractere | nos campos.";
    }
    if (!ctype_digit($telefone) || strlen($telefone) < 10 || strlen($telefone) > 11) {
        return "Telefone inválido: digite só números, com DDD.";
    }
    if (!in_array($hora, horariosLivres($data))) {
        return "Esse horário não está livre. Escolha outro.";
    }
    return "";
}

function salvarAgendamento($servico, $nome, $telefone, $data, $hora) {
    $linha = $servico . "|" . $nome . "|" . $telefone . "|" . $data . "|" . $hora . "\n";
    file_put_contents(__DIR__ . "/../agendamentos.txt", $linha, FILE_APPEND);
}
?>
