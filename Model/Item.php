<?php
// MODEL do catálogo: lê e grava o arquivo itens.txt (sem HTML).
// Cada linha do arquivo: nome|descricao|preco
// O número de cada item é a posição dele na lista (0, 1, 2...).

// Devolve o texto do primeiro erro encontrado, ou "" se está tudo certo.
function validarItem($nome, $descricao, $preco) {
    if ($nome == "" || $descricao == "" || $preco == "") {
        return "Preencha todos os campos.";
    }
    if (strpos($nome, "|") !== false || strpos($descricao, "|") !== false) {
        return "Não use o caractere | no nome nem na descrição.";
    }
    if (!is_numeric($preco)) {
        return "O preço precisa ser um número. Use ponto, por exemplo 35.50.";
    }
    return "";
}

function salvarItem($nome, $descricao, $preco) {
    $linha = $nome . "|" . $descricao . "|" . $preco . "\n";
    file_put_contents(__DIR__ . "/../itens.txt", $linha, FILE_APPEND);
}

function listarItens() {
    $itens = [];
    $texto = file_get_contents(__DIR__ . "/../itens.txt");
    $linhas = explode("\n", $texto);
    foreach ($linhas as $linha) {
        if ($linha != "") {
            $partes = explode("|", $linha, 3);
            $itens[] = [
                "nome" => $partes[0],
                "descricao" => $partes[1],
                "preco" => $partes[2]
            ];
        }
    }
    return $itens;
}

// Reescreve o arquivo inteiro com a lista recebida (sem FILE_APPEND).
function gravarItens($itens) {
    $texto = "";
    foreach ($itens as $item) {
        $texto = $texto . $item["nome"] . "|" . $item["descricao"] . "|" . $item["preco"] . "\n";
    }
    file_put_contents(__DIR__ . "/../itens.txt", $texto);
}

function excluirItem($indice) {
    $itens = listarItens();
    if (isset($itens[$indice])) {
        unset($itens[$indice]);
        gravarItens($itens);
    }
}

// Devolve um item só, ou null se a posição não existir.
function buscarItem($indice) {
    $itens = listarItens();
    if (!isset($itens[$indice])) {
        return null;
    }
    return $itens[$indice];
}

function atualizarItem($indice, $nome, $descricao, $preco) {
    $itens = listarItens();
    if (isset($itens[$indice])) {
        $itens[$indice] = [
            "nome" => $nome,
            "descricao" => $descricao,
            "preco" => $preco
        ];
        gravarItens($itens);
    }
}

// Devolve só os itens cujo nome contém o texto buscado (sem diferenciar maiúsculas).
function pesquisarItens($termo) {
    $itens = listarItens();
    if ($termo == "") {
        return $itens;
    }
    $encontrados = [];
    foreach ($itens as $item) {
        if (stripos($item["nome"], $termo) !== false) {
            $encontrados[] = $item;
        }
    }
    return $encontrados;
}
?>
