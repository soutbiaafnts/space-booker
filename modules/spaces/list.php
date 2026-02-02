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
    <title>Espaços</title>
    <link rel="stylesheet" href="../../assets/css/table/table.css">
</head>

<body>
    <?php require_once '../../includes/nav.php' ?>
    <main class="container">
        <div class="head">
            <h1>Espaços registrados</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Local</th>
                    <th>Capacidade</th>
                    <th class="actions">Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($spaces as $space): ?>
                    <tr>
                        <td><?= $space['id'] ?></td>
                        <td><?= $space['name'] ?></td>
                        <td><?= $space['description'] ?></td>
                        <td><?= $space['location'] ?></td>
                        <td><?= $space['capacity'] ?></td>
                        <td class="actions">
                            <a href="edit.php?id=<?= $space['id'] ?>"><span class="edit">Editar</span></a>
                            <a href="delete.php?id=<?= $space['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este espaço?')">
                                <span class="delete">Excluir</span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>

    </footer>
</body>

</html>