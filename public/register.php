<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="../assets/css/login/style.css">
    <script src="../assets/js/users/register.js"></script>
    <script src="../assets/js/alerts.js"></script>
</head>

<body>
    <main>
        <div class="container">
            <div class="form-block">
                <form action="store.php" method="post">
                    <h1>Cadastrar</h1>
                    <div class="input-box">
                        <input type="text" placeholder="Nome" name="name" id="name" required>
                    </div>

                    <div class="input-box">
                        <input type="email" placeholder="E-mail" name="email" id="email" required>
                    </div>

                    <div class="input-box">
                        <input type="password" placeholder="Senha" name="password" id="password" required>
                    </div>

                    <div class="input-box">
                        <input type="password" placeholder="Repita a senha" name="password_rep" id="password_rep" required>
                    </div>


                    <button type="submit" class="btn">Salvar</button>
                </form>
            </div>

            <div class="toggle-box">
                <div class="toggle-panel">
                    <h1>Você voltou!</h1>
                    <p>Já tem uma conta?</p>
                    <a href="./login.php">
                        <button class="btn register-btn">Entrar</button>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>