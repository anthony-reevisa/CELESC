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
    
    // Servir archivos estáticos desde /public
    $staticFile = realpath($baseDir . $uri);

    if (
        $staticFile &&
        str_starts_with($staticFile, $baseDir) &&
        is_file($staticFile)
    ) {
        $ext = strtolower(pathinfo($staticFile, PATHINFO_EXTENSION));

        $mime = [
            'css'  => 'text/css',
            'js'   => 'application/javascript',
            'png'  => 'image/png',
            'jpg'  => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif'  => 'image/gif',
            'svg'  => 'image/svg+xml',
            'ico'  => 'image/x-icon',
            'woff' => 'font/woff',
            'woff2'=> 'font/woff2',
            'ttf'  => 'font/ttf',
        ];

        if (isset($mime[$ext])) {
            header("Content-Type: " . $mime[$ext]);
        }

        readfile($staticFile);
        return;
    }
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
