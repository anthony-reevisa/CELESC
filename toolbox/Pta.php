<?php
require "vendor/autoload.php";
require "functions/driver.php";
require __DIR__ ."/../data/data.php";
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use HeadlessChromium\BrowserFactory;

//==================================================//
// OBTENER DATOS DE LA BASE //

$leads = $reevisa->query("SELECT * FROM leads")->fetch(PDO::FETCH_ASSOC);

$timeout = 10;
$user = "projetos2@reevisa.com.br";
$pass = "Celesc@0820";

$browser = BROWSER(false);
$page = PAGE($browser);

// INICIAR PROCESO DE ENTRADA
URL($page, "https://conecte.celesc.com.br/autenticacao/login");
sleep(1);
CLICK($page, 'ui-celesc-link[label="Já tenho o novo cadastro"]');
CLICK($page, "ui-celesc-button.password-login-toggle button");
SEND($page,'input[type="email"]', $user);
SEND($page,'input[type="password"]', $pass);
CLICK($page, "ui-celesc-button.submit button");
sleep(5);
SEND($page,'ui-celesc-input input', "8062508673");
sleep(1);
CLICK($page, 'ui-celesc-button[icon="arrow_forward"] button');
SCROLL($page,'section.container');
sleep(5);
SCREEN($page, "public/media/leads/ACRYSIO DIAS BITTENCOURT.png");
sleep(5);
CLICK($page, 'ui-celesc-link[size="small"]');
sleep(5);
