<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/styles/dashboard.css">
</head>
<body>
    <div class="menu">
        <div class="header-menu">
            <a class="icon" href="/dashboard">RE<span class="greem">E</span>-TOOLS</a>

            <button class="toggle" id="btntggl"></button>
        </div>
        <hr>
        <div class="tools">
            <h3>tools</h3>
            <a href="" class="btntool">Verificar PTAs</a>
            <a href="" class="btntool">BTN-NULL</a>
            <a href="" class="btntool">BTN-NULL</a>
            <a href="" class="btntool">BTN-NULL</a>
        </div>
        <div class="footer-menu">
            <a href="/settings"><img src="/media/user.svg" alt=""><?= $_SESSION['name']?></a>
        </div>
    </div>
</body>
</html>