<?php
// CONTROLLER do catálogo do dono: cadastrar, editar e excluir itens.
require "protegido.php";
require "model/Item.php";

$erro = "";
$indice = "";
$form = ["nome" => "", "descricao" => "", "preco" => ""];

// EXCLUIR: gerenciar_catalogo.php?excluir=2
if (isset($_GET['excluir'])) {
    excluirItem($_GET['excluir']);
    header("Location: gerenciar_catalogo.php");
    exit;
}

// EDITAR: gerenciar_catalogo.php?editar=2 (o formulário vem preenchido com o item)
if (isset($_GET['editar'])) {
    $indice = $_GET['editar'];
    $item = buscarItem($indice);
    if ($item == null) {
        $indice = "";
    } else {
        $form = $item;
    }
}

// FORMULÁRIO ENVIADO: sem índice cadastra, com índice atualiza
if (isset($_POST['nome'])) {
    $indice = $_POST['indice'];
    $form = [
        "nome" => $_POST['nome'],
        "descricao" => $_POST['descricao'],
        "preco" => $_POST['preco']
    ];
    $erro = validarItem($form["nome"], $form["descricao"], $form["preco"]);
    if ($erro == "") {
        if ($indice == "") {
            salvarItem($form["nome"], $form["descricao"], $form["preco"]);
        } else {
            atualizarItem($indice, $form["nome"], $form["descricao"], $form["preco"]);
        }
        header("Location: gerenciar_catalogo.php");
        exit;
    }
}

$itens = listarItens();
require "view/gerenciar_view.php";
?>
