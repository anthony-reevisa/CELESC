<?php

require_once __DIR__ . "/../data/data.php";

$lastId = isset($_GET['last_id']) ? (int)$_GET['last_id'] : 0;

while (true) {
    $stmt = $reevisa->prepare("SELECT * FROM leads WHERE id > :id ORDER BY id ASC");
    $stmt->execute([
        'id' => $lastId
    ]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)) {
        echo json_encode($result);
        exit;
    }

    // Espera 500 ms antes de volver a consultar
    usleep(500000);
}