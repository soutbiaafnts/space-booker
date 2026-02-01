<?php
require_once "../../includes/auth.php";
require_once "../../config/database.php";

$pdo = connect();
$stmt = $pdo->query("SELECT id, name FROM spaces ORDER BY name");
$spaces = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Reserva</title>
</head>

<body>
    <header>
        <h1>Criar Reserva</h1>
    </header>
    <main>
        <?php if(isset($_GET['error'])): ?>
            <?php if($_GET['error'] === 'conflict'): ?>
                <p>Já existe uma reserva para esse espaço nesse horário.</p>
            <?php elseif($_GET['error'] === "internal"): ?>
                <p>Ocorreu um erro ao tentar salvar a reserva.</p>
            <?php endif; ?>
        <?php endif; ?>
        
        <form action="store.php" method="post">
            <label for="space_id">Espaço</label>
            <select name="space_id" id="space_id" required>
                <option value="">Selecione um espaço</option>
                <?php foreach ($spaces as $space): ?>
                    <option value="<?= $space['id'] ?>">
                        <?= $space['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="booking_date">Data da reserva</label>
            <input type="date" name="booking_date" id="booking_date"><br><br>

            <label for="start_time">Horário de início</label>
            <input type="time" name="start_time" id="start_time"><br><br>

            <label for="end_time">Horário de encerramento</label>
            <input type="time" name="end_time" id="end_time"><br><br>

            <button type="submit">Reservar</button>
        </form>
    </main>
    <footer>
        DEW I - Trabalho Final - Bianca Fontes
    </footer>
</body>

</html>