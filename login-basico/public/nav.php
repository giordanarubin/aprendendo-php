<?php 
defined('CONTROL') or die('Acesso negado.');
?>

<hr>
<span>Usuário: <strong><?php echo $_SESSION['usuario'] ?></strong></span>
<span><a href="index.php?rota=logout">Sair</a></span>
<hr>

<nav>
    <a href="?rota=home">Home</a>
    <a href="?rota=page1">Página 1</a>
    <a href="?rota=page2">Página 2</a>
    <a href="?rota=page3">Página 3</a>
    <a href="index.php?rota=logout">Sair</a>
</nav>