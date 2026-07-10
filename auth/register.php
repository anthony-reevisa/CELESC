<?php
require_once __DIR__ . "/../data/data.php";
include __DIR__ . "/../toolbox/cursor.php";

session_start();

$name  = trim($_POST['name']);
$email = trim($_POST['email']);
$pass  = trim($_POST['pass']);
$icon = "null";

$stmt = $reevisa->prepare("
    INSERT INTO users (name, email, pass, icon)
    VALUES (?, ?, ?, ?)
");

$stmt->execute([
    $name,
    $email,
    $pass,
    $icon
]);

if ($reevisa->lastInsertId()) {
    $_SESSION = [
        "name" => $name,
        "email" => $email,
        "pass" => $pass,
        "icon" => $icon
    ];

    GO("/dashboard");
}

else {
    echo "Error al registrar";
}