<!DOCTYPE html>
<html>
    <head>
        <title>Usuários | Projeto para Web com PHP</title> 
        <link rel="stylesheet"
        href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        include 'includes/topo.php';
                        include 'includes/valida_login.php';
                        if($_SESSION['login']['usuario']['adm'] !==1){
                            header('Location: index.php');
                        }
                    ?> 
                </div>
            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-md-12">
                    <?php include 'includes/menu.php'; ?>
                </div>
                <div class="col-md-10" style="padding-top: 50px;">
                    <h2>Usuário</h2>
                    <?php include 'includes/busca.php'; ?>
                    <?php
                        require_once 'includes/funcoes.php';
                        require_once 'core/conexao_mysql.php';
                        require_once 'core/sql.php';
                        require_once 'core/mysql.php';

                        foreach ($_GET as $indice => $dado) {
                            $$indice = limparDados ($dado);
                        }

                        $data_atual = date('Y-m-d H:i:s');

                        $criterio = [];

                        if (!empty($busca)){
                            $criterio[] = ['nome', 'like', "%{$busca}%"];
                        }
                        
                        $result = buscar (
                                'usuario',
                                [
                                    'id',
                                    'nome',
                                    'email',
                                    'data_criacao',
                                    'ativo',
                                    'adm'
                                ],
                                $criterio,
                                'data_criacao DESC, nome ASC'
                            );
                            
                    ?>