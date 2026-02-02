<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="../assets/css/login/style.css">
</head>

<body>
    <main>
        <div class="container">
            <div class="form-block">
                <form action="login_process.php" method="post">
                    <h1>Entrar</h1>
                    <div class="input-box">
                        <input type="email" placeholder="E-mail" id="email" name="email" required>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Senha" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn">Entrar</button>
                </form>
                <?php if (isset($_GET['error'])) { ?>
                    <script>
                        alert("E-mail ou senha incorretos.");
                    </script>
                <?php } ?>
            </div>

            <div class="toggle-box">
                <div class="toggle-panel">
                    <h1>Olá, bem-vindo(a)!</h1>
                    <p>Não tem uma conta?</p>
                    <a href="./register.php">
                        <button class="btn register-btn">Cadastrar</button>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>