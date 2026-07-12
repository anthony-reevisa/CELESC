<?php

require_once __DIR__ . "/../data/data.php";

$result = $reevisa->query("SELECT * FROM leads")->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);