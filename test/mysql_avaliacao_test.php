<?php

require_once '../includes/funcoes.php';
require_once '../core/conexao_mysql.php';
require_once '../core/sql.php';
require_once '../core/mysql.php';

insert_teste (5, 'bla bla', 15, 1, '2022-01-10'); 
buscar_teste();
update_teste (5, 'ok', 16, 2, '2022-01-10'); 
buscar_teste();

//Teste inserção banco de dados
function insert_teste ($nota, $comentario, $usuario_id, $post_id, $data_criacao): void
{
    $dados = ['nota' => $nota, 'comentario' => $comentario, 'usuario_id' => $usuario_id, 'post_id' => $post_id, 'data_criacao' => $data_criacao]; 
    insere('avaliacao', $dados);
}

//Teste select banco de dados
function buscar_teste(): void
{
    $avaliacao = buscar('avaliacao', [ 'id', 'nota', 'comentario', 'usuario', 'post'], [], ''); 
    print_r($avaliacao);
}

//Teste update banco de dados
function update_teste ($id, $nota, $comentario): void
{
    $dados = ['nota' => $nota, 'comentario' => $comentario, 'usuario' => $comentario, 'post' => $comentario]; 
    $criterio = [['id', '=', $id]];
    atualiza('avaliacao', $dados, $criterio);
}
?>