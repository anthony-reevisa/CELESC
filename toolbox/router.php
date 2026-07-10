<?php
function ROUTER($routes = [], $notFound = null, $allowedDirs = []){

    $rootDir = dirname($_SERVER["SCRIPT_FILENAME"]);
    $baseDir = realpath($rootDir . "/public");

    // Añadir directorios extra permitidos
    $extraDirs = [];
    foreach ($allowedDirs as $dir) {
        $resolved = realpath($rootDir . "/" . ltrim($dir, "/"));
        if ($resolved) $extraDirs[] = $resolved;
    }

    if (!$baseDir) die("ERROR 404");

    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $uri = rtrim($uri, "/") ?: "/";

    if (isset($routes[$uri])) {

        $target = ltrim($routes[$uri], "/");

        // Buscar en public/ primero, luego en los dirs permitidos
        $searchDirs = array_merge([$baseDir], $extraDirs);

        foreach ($searchDirs as $dir) {
            $file = realpath($dir . "/" . $target);

            if ($file && str_starts_with($file, $dir) && file_exists($file)) {
                require $file;
                return;
            }
        }
    }

    http_response_code(404);

    if ($notFound) {
        $file = realpath($baseDir . "/" . ltrim($notFound, "/"));
        if ($file && str_starts_with($file, $baseDir) && file_exists($file)) {
            require $file;
            return;
        }
    }

    echo "404";
}
