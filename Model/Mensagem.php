<?php
// MODEL das mensagens: lê e grava o arquivo mensagens.txt (sem HTML).
// Cada linha do arquivo: nome|email|telefone|mensagem

// Devolve o texto do primeiro erro encontrado, ou "" se está tudo certo.
function validarMensagem($nome, $email, $telefone, $mensagem) {
    if ($nome == "" || $email == "" || $telefone == "" || $mensagem == "") {
        return "Preencha todos os campos.";
    }
    if (strpos($nome . $email . $telefone . $mensagem, "|") !== false) {
        return "Não use o caractere | nos campos.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "E-mail inválido.";
    }
    if (!ctype_digit($telefone) || strlen($telefone) < 10 || strlen($telefone) > 11) {
        return "Telefone inválido: digite só números, com DDD.";
    }
    return "";
}

// FILE_APPEND acrescenta no fim do arquivo, sem apagar o que já existe.
function salvarMensagem($nome, $email, $telefone, $mensagem) {
    $linha = $nome . "|" . $email . "|" . $telefone . "|" . $mensagem . "\n";
    file_put_contents(__DIR__ . "/../mensagens.txt", $linha, FILE_APPEND);
}

// Lê o arquivo e devolve um array com as mensagens (a mais nova primeiro).
function listarMensagens() {
    $mensagens = [];
    $texto = file_get_contents(__DIR__ . "/../mensagens.txt");
    $linhas = explode("\n", $texto);
    foreach ($linhas as $linha) {
        if ($linha != "") {
            $partes = explode("|", $linha, 4);
            $mensagens[] = [
                "nome" => $partes[0],
                "email" => $partes[1],
                "telefone" => $partes[2],
                "mensagem" => $partes[3]
            ];
        }
    }
    return array_reverse($mensagens);
}
?>
