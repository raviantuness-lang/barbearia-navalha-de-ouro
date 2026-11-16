<?php // VIEW dos agendamentos (dono). Variável do Controller: $agendamentos ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos</title>
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
        <h2>Agendamentos</h2>

        <?php if (count($agendamentos) === 0): ?>
            <p>Nenhum agendamento ainda.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Serviço</th>
                        <th>Cliente</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agendamentos as $agendamento): ?>
                        <tr>
                            <td><?php echo $agendamento["data"]; ?></td>
                            <td><?php echo $agendamento["hora"]; ?></td>
                            <td><?php echo $agendamento["servico"]; ?></td>
                            <td><?php echo $agendamento["nome"]; ?></td>
                            <td><?php echo $agendamento["telefone"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
</body>
</html>
