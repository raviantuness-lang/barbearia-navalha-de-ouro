<?php
// CONTROLLER do catálogo público, com busca pelo nome.
require "model/Item.php";

if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
} else {
    $busca = "";
}

$itens = pesquisarItens($busca);
require "view/catalogo_view.php";
?>
