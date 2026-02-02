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
    <title>Reserva</title>
    <link rel="stylesheet" href="../../assets/css/form/form.css">
    <script src="../../assets/js/alerts.js"></script>
</head>

<body>
    <?php require_once '../../includes/nav.php' ?>
    <main>
        <div class="container">
            <div class="form-block">
                <h1>Reservar espaço</h1>
                <form action="store.php" method="post">
                    <div class="input-block">
                        <div class="input-box">
                            <select name="space_id" id="space_id" required>
                                <option value="">Selecione um espaço</option>
                                <?php foreach ($spaces as $space): ?>
                                    <option value="<?= $space['id'] ?>">
                                        <?= $space['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="input-box">
                            <input type="date" name="booking_date" id="booking_date">
                        </div>

                        <div class="input-box">
                            <input type="time" name="start_time" id="start_time">
                        </div>

                        <div class="input-box">
                            <input type="time" name="end_time" id="end_time">
                        </div>
                    </div>

                    <button type="submit" class="btn">Reservar</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>