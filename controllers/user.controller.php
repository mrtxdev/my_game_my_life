<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../database.php'; 
require_once __DIR__ . '/../models/user.model.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function register() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $pass = $_POST['pass'] ?? '';

        if (empty($name) || empty($email) || empty($pass)) {
            echo "<script>alert('Preencha todos os campos!'); window.location.href = '/view/register.view.php';</script>";
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Formato de e-mail inválido!'); window.location.href = '/view/register.view.php';</script>";
            exit;
        }

        if (mb_strlen($name) < 10) {
            echo "<script>alert('O apelido de player tem que conter pelo menos 10 caracteres!'); window.location.href = '/view/register.view.php';</script>";
            exit;
        }

        if (mb_strlen($pass) < 8) {
            echo "<script>alert('A senha tem que conter pelo menos 8 caracteres!'); window.location.href = '/view/register.view.php';</script>";
            exit;
        }

        $pdo = getDatabaseConnection();
        
        $checkSql = 'SELECT id FROM users WHERE email = :email';
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->execute(['email' => $email]);
        if ($checkStmt->fetch()) {
            echo "<script>alert('Este e-mail já está cadastrado por outro player!'); window.location.href = '/view/register.view.php';</script>";
            exit;
        }

        $passHash = password_hash($pass, PASSWORD_DEFAULT);  
        $sql = "INSERT INTO users(name, email, pass) VALUES (:name, :email, :pass)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'pass' => $passHash
        ]);

        header('Location: /view/login.view.php');
        exit;
    }
} 

function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        $email = trim($_POST['email'] ?? '');
        $pass = $_POST['pass'] ?? '';

        if (empty($email) || empty($pass)) {
            echo "<script>alert('Preencha todos os campos!'); window.location.href = '/view/login.view.php';</script>";
            exit;
        }

        $sql = 'SELECT * FROM users WHERE email = :email';
        $pdo = getDatabaseConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'email' => $email
        ]);

        $user = $stmt->fetchObject(User::class);

        if ($user && password_verify($pass, $user->pass)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;
            $_SESSION['auth'] = true;
            header('Location: /index.php');
            exit;
        } else {
            echo "<script>alert('E-mail ou senha incorretos!'); window.location.href = '/view/login.view.php';</script>";
            exit;
        }
    }
}

function logout() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION = [];
    session_destroy();
    header('Location: /index.php');
    exit;
}

function auth() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
}

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'register') {
        register();
    } elseif ($_POST['action'] === 'login') {
        login();
    } elseif ($_POST['action'] === 'logout') {
        logout();
    }
}
