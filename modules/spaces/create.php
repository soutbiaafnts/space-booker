<?php
require_once '../../includes/auth.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaço</title>
    <link rel="stylesheet" href="../../assets/css/form/form.css">
    <script src="../../assets/js/alerts.js"></script>
</head>

<body>
    <?php require_once '../../includes/nav.php' ?>
    <main>
        <div class="container">
            <div class="form-block">
                <h1>Criar espaço</h1>

                <form action="store.php" method="post">
                    <div class="input-block">
                        <div class="input-box">
                            <input type="text" placeholder="Nome do espaço" name="name" id="name" required>
                        </div>

                        <div class="input-box">
                            <input type="text" name="description" placeholder="Descreva o espaço" id="description" required>
                        </div>

                        <div class="input-box">
                            <input type="text" placeholder="Local" name="location" id="location" required>
                        </div>

                        <div class="input-box">
                            <input type="number" placeholder="Capacidade" name="capacity" id="capacity" required>
                        </div>
                    </div>

                    <button type="submit" class="btn">Criar</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>