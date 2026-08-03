<?php
defined('CONTROL') or die('Acesso negado.');//verifica se existe a constante CONTROL definida caso eu tente entrar direto no login.php sem passar pelo index (pois a constante está definida lá); caso nao exista, o processo morre

//verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //verifica se usuário e senha foram submetidos
    // O PHP já entrega os dados do formulário como array
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $erro = null;

    if (empty($usuario) || empty($senha)){
        $erro = "Usuário e senha são obrigatórios!";
    }

    //verifica se usuário e senha são válidos
    if (empty($erro)) {
        $usuarios = require_once __DIR__ . '/../inc/usuarios.php';//importando os usuários

        //iterando entre os usuários
        foreach ($usuarios as $user) {
            if ($user['usuario'] == $usuario && password_verify($senha, $user['senha'])) {

                //faz o login
                $_SESSION['usuario'] = $usuario;

                //volta à página inicial
                header('location: index.php?rota=home');
            }
        }

        //login inválido
        $erro = "Usuário e/ou senha inválidos!";
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="index.php?rota=login" method="post">
        <h3>Login</h3>
        <div>
            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" id="usuario">
        </div>
        <div>
            <label for="senha">Senha</label>
            <input type="text" name="senha" id="senha">
        </div>
        <div>
            <button type="submit">Entrar</button>
        </div>
        </form>

        <!-- verifica se há mensagem de erro e a mostra na tela -->
        <?php if(!empty($erro)) : ?>
            <p><?php echo $erro ?></p>
        <?php endif; ?>
</body>
</html>
