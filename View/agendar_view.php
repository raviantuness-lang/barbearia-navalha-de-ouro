<?php // VIEW do agendamento. Variáveis do Controller: $servicos, $servico, $data, $livres, $erro e $ok ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar horário</title>
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
        <h2>Agendar horário</h2>

        <?php if ($ok): ?>
            <p class="ok">Agendamento confirmado! Esperamos você.</p>
        <?php endif; ?>

        <?php if ($erro != ""): ?>
            <p class="erro"><?php echo $erro; ?></p>
        <?php endif; ?>

        <form action="agendar.php" method="get">
            <label>1. Escolha o serviço:</label>
            <select name="servico">
                <?php foreach ($servicos as $s): ?>
                    <option value="<?php echo $s["nome"]; ?>" <?php if ($s["nome"] == $servico): ?>selected<?php endif; ?>><?php echo $s["nome"]; ?> - R$ <?php echo number_format($s["preco"], 2, ",", "."); ?></option>
                <?php endforeach; ?>
            </select>
            <label>2. Escolha o dia (domingo fechado):</label>
            <input type="date" name="data" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $data; ?>">
            <button type="submit">Ver horários livres</button>
        </form>

        <?php if ($data != ""): ?>
            <?php if (count($livres) === 0): ?>
                <p>Sem horários livres nesse dia. Tente outro dia.</p>
            <?php else: ?>
                <form action="agendar.php" method="post">
                    <input type="hidden" name="servico" value="<?php echo $servico; ?>">
                    <input type="hidden" name="data" value="<?php echo $data; ?>">
                    <label>3. Horários livres em <?php echo $data; ?>:</label>
                    <select name="hora">
                        <?php foreach ($livres as $hora): ?>
                            <option value="<?php echo $hora; ?>"><?php echo $hora; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Seu nome:</label>
                    <input type="text" name="nome">
                    <label>Telefone (só números, com DDD):</label>
                    <input type="text" name="telefone">
                    <button type="submit">Confirmar agendamento</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </main>
</body>
</html>
