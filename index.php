<?php
require "toolbox/router.php";

ROUTER(
    [
        // PUBLICS //
        "/" => "models/home.php",
        "/login" => "models/login.php",
        "/register" => "models/register.php",
        "/dashboard" => "models/dashboard.php",

        // PRIVATES //
        "/auth-register" => "register.php",
        "/auth-login" => "login.php"
    ],

    "error.php",
    ["auth", "config","data"]
);