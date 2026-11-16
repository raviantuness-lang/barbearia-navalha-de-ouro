<?php // VIEW do catálogo público. Variáveis do Controller: $itens e $busca ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>💈 Barbearia Navalha de Ouro</h1>
        <nav>
            <a href="index.html">Início</a>
            <a href="agendar.php">Agendar</a>
        </nav>
    </header>

    <main>
        <h2>Catálogo</h2>

        <form action="catalogo.php" method="get">
            <label>Buscar pelo nome:</label>
            <input type="text" name="busca" value="<?php echo $busca; ?>">
            <button type="submit">Buscar</button>
            <a href="catalogo.php">Limpar</a>
        </form>

        <?php if (count($itens) === 0): ?>
            <p>Nenhum item encontrado.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Serviço</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($itens as $item): ?>
                        <tr>
                            <td><?php echo $item["nome"]; ?></td>
                            <td><?php echo $item["descricao"]; ?></td>
                            <td>R$ <?php echo number_format($item["preco"], 2, ",", "."); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
</body>
</html>
