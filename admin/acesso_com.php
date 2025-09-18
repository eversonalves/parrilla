<?php 

// Autentificação do usuário.

// 1º Passo - Definir nome da sessão.

session_name('parrillaa');
session_start();


// 2º Passo - Verificar se a sessão é valida.

if(!isset($_SESSION['login_usuario'])){

    // Usuário não autenticado, redireciona para a tela de login.
    
    header('location: login.php');
    exit;
}

// 3º Passo - Verificar se o nome da sessão corresponde a sessão atual.

if(!isset($_SESSION['nome_da_sessao'])){
    $_SESSION['nome_da_sessao'] = session_name();
}elseif($_SESSION['nome_da_sessao']!== session_name()){
    session_destroy();
    header('location: login.php');
}

// 4º Passo - Validar o agente (usuário) é o IP.

// 5º Passo - Se o IP ou navegador mudarem, invalida a sessão.

?>