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
    <title>Listar Usuários</title>
</head>
<body>
    <header>
        <h1>Usuários</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>Cargo</th>
                <th>Criação</th>
                <th>Ações</th>
            </tr>

            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['password'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['created_at'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $user['id'] ?>">Editar</a> |
                        <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
    <footer>

    </footer>
</body>
</html>