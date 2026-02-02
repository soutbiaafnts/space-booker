<?php
require_once '../../includes/auth.php';
require_once '../../config/database.php';

$pdo = connect();

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link rel="stylesheet" href="../../assets/css/table/table.css">
</head>

<body>
    <?php require_once '../../includes/nav.php' ?>

    <main class="container">
        <div class="head">
            <h1>Usuários registrados</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                    <th>Cargo</th>
                    <th>Criação</th>
                    <th class="actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['password'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td><?= $user['created_at'] ?></td>
                        <td class="actions">
                            <a href="edit.php?id=<?= $user['id'] ?>"><span class="edit">Editar</span></a>
                            <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário')"><span class="delete">Excluir</span></a>
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