<?php // VIEW das mensagens (dono). Variável do Controller: $mensagens ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens</title>
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
        <h2>Mensagens recebidas</h2>

        <?php if (count($mensagens) === 0): ?>
            <p>Nenhuma mensagem recebida ainda.</p>
        <?php else: ?>
            <?php foreach ($mensagens as $mensagem): ?>
                <div class="mensagem">
                    <h3><?php echo $mensagem["nome"]; ?></h3>
                    <p>E-mail: <?php echo $mensagem["email"]; ?><br>
                       Telefone: <?php echo $mensagem["telefone"]; ?></p>
                    <p><?php echo $mensagem["mensagem"]; ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
</body>
</html>
