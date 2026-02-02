<?php require_once 'auth.php'; ?>

<link rel="stylesheet" href="../assets/css/nav/nav.css">

<nav class="sidebar">
    <header>
        <div class="image-text">
            <div class="text header-text">
                <span class="name">SpaceBooker</span>
                <span class="owner">DEW I - Bianca Fontes</span>
            </div>
        </div>
        <span class="point">•</span>
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