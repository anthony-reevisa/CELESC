<?php
require __DIR__ . "/../data/data.php";
session_start();

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = trim($_POST['name']) ?? false;
    $protocolo_uc = trim($_POST['protocolo_uc']) ?? false;

    if(!$name || !$protocolo_uc){
        echo "campo vazio";
        exit();
    }

    $query = "INSERT INTO leads (name,protocolo,coop,user_id) VALUES (:name, :protocolo, :coop, :user_id)";
    $resutl = $reevisa->prepare($query);
    $resutl->execute([
        ":name" => $name,
        ":protocolo" => $protocolo_uc,
        ":coop" => "CELESC",
        ":user_id" => $_SESSION['id']
    ]);

    if($reevisa->lastInsertId()){
        echo "registrado";
        exit();
    }

    else{
        echo "error al registrar";
        exit();
    }
    
}