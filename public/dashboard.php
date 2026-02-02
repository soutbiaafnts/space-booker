<?php
require_once '../includes/auth.php';
require_once '../config/database.php';

$pdo = connect();
$stmt = $pdo->prepare("SELECT id, name, email FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header('Location: logout.php');
    exit;
}

$success = $_GET['success'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceBooker</title>
    <link rel="stylesheet" href="../assets/css/dashboard/style.css">
</head>

<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <div class="text header-text">
                    <span class="name">SpaceBooker</span>
                    <span class="owner">DEW I - Bianca Fontes</span>
                </div>
            </div>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../public/dashboard.php">
                            <span class="text tex-nav">Início</span>
                        </a>
                    </li>

                    <h3>Usuário</h3>
                    <li class="nav-link">
                        <a href="../modules/users/list.php">
                            <span class="text tex-nav">Ver usuários</span>
                        </a>
                    </li>

                    <h3>Espaços</h3>
                    <li class="nav-link">
                        <a href="../modules/spaces/list.php">
                            <span class="text tex-nav">Ver espaços</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../modules/spaces/create.php">
                            <span class="text tex-nav">Criar espaço</span>
                        </a>
                    </li>

                    <h3>Reservas</h3>
                    <li class="nav-link">
                        <a href="../modules/bookings/list.php">
                            <span class="text tex-nav">Minhas reservas</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../modules/bookings/create.php">
                            <span class="text tex-nav">Reservar espaço</span>
                        </a>
                    </li>

                    <h3>Cuidado</h3>
                    <li class="nav-exit">
                        <a href="../public/logout.php" class="exit">
                            <span class="text tex-nav">Sair</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <h1>Olá, <?= htmlspecialchars($user['name']) ?>!</h1>
        <?php if ($success === 'registered'): ?>
            <script>
                alert('Usuário cadastrado com sucesso!');
            </script>
        <?php endif; ?>

        <section class="dashboard-links">
            <div class="link">
                <h2>Minhas Reservas</h2>
                <a href="../modules/bookings/list.php"><button class="btn">Acessar</button></a>
            </div>

            <div class="link">
                <h2>Espaços</h2>
                <a href="../modules/spaces/list.php"><button class="btn">Listar</button></a>
                <a href="../modules/spaces/create.php"><button class="btn">Cadastrar</button></a>
            </div>

            <div class="link">
                <h2>Usuários</h2>
                <a href="../modules/users/list.php"><button class="btn">Listar</button></a>
                <a href="../modules/users/edit.php"><button class="btn">Editar o meu</button></a>
            </div>
            <div class="link">
                <a href="logout.php"><button class="btn">Sair</button></a>
            </div>
        </section>
    </main>
    <footer>
        DEW I - Trabalho Final - Bianca Fontes
    </footer>
</body>

</html>