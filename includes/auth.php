<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /space-booker/public/login.php');
    exit();
}