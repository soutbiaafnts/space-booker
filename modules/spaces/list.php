<?php
    require_once '../../includes/auth.php';
    require_once '../../config/database.php';

    $pdo = connect();

    $stmt = $pdo->query("SELECT * FROM spaces");
    $spaces = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>
<body>
    <header>
        <h1>Espaços</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Local</th>
                <th>Capacidade</th>
            </tr>

            <?php foreach ($spaces as $space): ?>
            <tr>
                <td><?= $space['name'] ?></td>
                <td><?= $space['description'] ?></td>
                <td><?= $space['location'] ?></td>
                <td><?= $space['capacity'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>
    <footer>

    </footer>
</body>
</html>