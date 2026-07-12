<?php
session_start();

if(empty($_SESSION['id'])){
    header("Location: /login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar PTAs</title>
    <link rel="stylesheet" href="/styles/pta.css">
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
            <a href="/dashboard" class="btntool">Dashboard</a>
            <a href="/pta-manager" class="btntool">Verificar PTAs</a>
            <a href="" class="btntool">BTN-NULL</a>
            <a href="" class="btntool">BTN-NULL</a>
            <a href="" class="btntool">BTN-NULL</a>
        </div>
        <div class="footer-menu">
            <a class="user" href="/settings"><img src="/media/user.svg" alt=""><?= $_SESSION['name']?></a>
        </div>
    </div>

    <!-- FERRAMENTA DE PTAs -->
    <div class="workbox">
        <div class="control">
            Control
            <form id="create_user" class="create_user">
                <input type="text" name="name" placeholder="Nome">
                <input type="text" name="protocolo_uc" placeholder="Protocol Ou UC">
                <button id="submit">Registrar</button>
            </form>
            <button id="active">Atualizar</button>
        </div>
        <div class="users" id="users">

        </div>
    </div>
    <script src="/js/tool.js"></script>
    <script src="/js/polling.js"></script>
    <script src="/js/addUser.js"></script>
</body>
</html>
