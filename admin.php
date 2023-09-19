<?php
    date_default_timezone_set('America/Sao_Paulo');
    require_once 'includes/funcoes.php'; 
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    $salt = 'muca';

    $dados = [
        'nome' => 'Samuel Alves',
        'email' => 'samu@gmail.com',
        'senha' => crypt ('123', $salt),
        'ativo' => 1,
        'adm' => 1
    ];

    insere(
        'usuario',
        $dados
    );
    header("Location:index.php");
?>