<?php

//impedir acesso direto aos outros arquivos sem passar pelo index
define('CONTROL', true);

//carrega arquivo de configuração de rotas
$routes = require_once('inc/routes.php');

//pega a rota da URL
$route = $_GET['route'] ?? 'home';

if (!in_array($route, $routes)){
    $route = '404';
}

//fluxo das rotas
switch($route){
    case 'home':
        require_once 'inc/header.php';
        require_once 'scripts/home.php';
        require_once 'inc/footer.php';
        break;
    case '404':
        require_once 'inc/header.php';
        require_once 'scripts/404.php';
        require_once 'inc/footer.php';
        break;
}