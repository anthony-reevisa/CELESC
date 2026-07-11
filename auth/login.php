<?php
require_once __DIR__ . "/../data/data.php";
include __DIR__ . "/../toolbox/cursor.php";

session_start();

$email = trim($_POST['email']);
$pass  = trim($_POST['pass']);

// verificar existencia do usuário
$stmt = $reevisa->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
$stmt->execute([
    'email' => $email
]);

$esencia = $stmt->fetch(PDO::FETCH_ASSOC);

if ($esencia === false) {
    header("Location: /login?error=1");
    exit;
}

$_SESSION = [
    "name" => $esencia['name'],
    "email" => $esencia['email'],
    "pass" => $esencia['pass'],
    "icon" => $esencia['icon'],
    "id" => $esencia['id']
];

header("Location: /dashboard");