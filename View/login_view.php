<?php // VIEW do login. Variável do Controller: $erro ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do dono</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>💈 Barbearia Navalha de Ouro</h1>
        <nav>
            <a href="index.html">Início</a>
            <a href="catalogo.php">Catálogo</a>
            <a href="agendar.php">Agendar</a>
        </nav>
    </header>

    <main>
        <h2>Área do dono</h2>
        <?php if ($erro != ""): ?>
            <p class="erro"><?php echo $erro; ?></p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <label>Senha:</label>
            <input type="password" name="senha">
            <button type="submit">Entrar</button>
        </form>
    </main>
</body>
</html>
