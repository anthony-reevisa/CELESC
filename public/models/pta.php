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
        <form id="create_user" class="create_user">
            <input type="text" name="name" placeholder="Nome">
            <input type="text" name="protocolo_uc" placeholder="Protocol Ou UC">
            <button type="submit">Registrar</button>
        </form>
        <div class="users">
            <div class="cliente">
                <h3>Michael gufman de tog <p>ID[56]</p></h3>
                <img src="" alt="">
            </div>
        </div>
    </div>
    <!-- <script src="/js/tool.js"></script> -->
    <script src="/js/polling.js"></script>
</body>
</html>
