<?php // VIEW do catálogo do dono. Variáveis do Controller: $itens, $form, $indice e $erro ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar catálogo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>💈 Barbearia Navalha de Ouro</h1>
        <nav>
            <a href="mensagens.php">Mensagens</a>
            <a href="agendamentos.php">Agendamentos</a>
            <a href="gerenciar_catalogo.php">Catálogo</a>
            <a href="login.php?sair=1">Sair</a>
        </nav>
    </header>

    <main>
        <h2>Gerenciar catálogo</h2>

        <?php if ($erro != ""): ?>
            <p class="erro"><?php echo $erro; ?></p>
        <?php endif; ?>

        <form action="gerenciar_catalogo.php" method="post">
            <input type="hidden" name="indice" value="<?php echo $indice; ?>">
            <label>Nome do serviço:</label>
            <input type="text" name="nome" value="<?php echo $form["nome"]; ?>">
            <label>Descrição:</label>
            <input type="text" name="descricao" value="<?php echo $form["descricao"]; ?>">
            <label>Preço em reais (com ponto, ex.: 35.50):</label>
            <input type="text" name="preco" value="<?php echo $form["preco"]; ?>">
            <button type="submit">Salvar item</button>
            <a href="gerenciar_catalogo.php">Cancelar</a>
        </form>

        <?php if (count($itens) === 0): ?>
            <p>Nenhum item cadastrado ainda.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Serviço</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($itens as $i => $item): ?>
                        <tr>
                            <td><?php echo $item["nome"]; ?></td>
                            <td><?php echo $item["descricao"]; ?></td>
                            <td>R$ <?php echo number_format($item["preco"], 2, ",", "."); ?></td>
                            <td>
                                <a href="gerenciar_catalogo.php?editar=<?php echo $i; ?>">Editar</a>
                                <a href="gerenciar_catalogo.php?excluir=<?php echo $i; ?>" onclick="return confirm('Excluir este item?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
</body>
</html>
