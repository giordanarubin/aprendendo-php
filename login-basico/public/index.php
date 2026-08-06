<?php

//iniciar a sessão
session_start();

//constante de controle, pra que o fluxo de dados passe sempre pelo index, sem acesso a outras pastas
define('CONTROL', true);

//verificar se há usuário logado
$usuario_logado = $_SESSION['usuario'] ?? null;//se existir usuario logado, retorna ele; se nao, retorna null

//verifica qual é a rota na URL
if(empty($usuario_logado)){//empty retorna true para variavel vazia ou null
    $rota = 'login';
} else {
    $rota = $_GET['rota'] ?? 'home';//array que coleta dados atraves do método get
}

// se o usuário está logado mas a rota é login, redireciona para home
if(!empty($usuario_logado) && $rota == 'login'){
    $rota = 'home';
}

//analisa a rota
$rotas = [
    'login' => 'login.php',
    'home' => 'home.php',
    'page1' => 'page1.php',
    'page2' => 'page2.php',
    'page3' => 'page3.php',
    'logout' => 'logout.php'
];

if(!key_exists($rota, $rotas)){//checa se o index rota existe no array rotas
    die('Acesso negado.');
} else {
    require_once $rotas[$rota];
};