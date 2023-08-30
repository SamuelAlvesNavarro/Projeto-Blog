<?php

/*
CREATE TABLE avaliacao (
id int NOT NULL AUTO_INCREMENT,
nota int NOT NULL,
comentario varchar(255) NOT NULL,
usuario_id int NOT NULL,
post_id int NOT NULL,
data_criacao datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id),
CONSTRAINT fk_avaliacao_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id),
CONSTRAINT fk_avaliacao_post FOREIGN KEY (post_id) REFERENCES post (id)
);
*/

require_once '../includes/funcoes.php';
require_once '../core/conexao_mysql.php';
require_once '../core/sql.php';
require_once '../core/mysql.php';

insert_teste(5, 'bla bla', 1, 1, 'now()'); 
buscar_teste();
update_teste (1, 2, 'ok', 16, 1, 'now()'); 
buscar_teste();
delete_teste(rand(37, 62));

//Teste inserção banco de dados
function insert_teste($nota, $comentario, $usuario_id, $post_id, $data_criacao): void
{
    $dados = ['nota' => $nota, 'comentario' => $comentario, 'usuario_id' => $usuario_id, 'post_id' => $post_id, 'data_criacao' => $data_criacao]; 
    insere('avaliacao', $dados);
}

//Teste select banco de dados
function buscar_teste(): void
{
    $avaliacao = buscar('avaliacao', ['*'], [], ''); 
    print_r($avaliacao);
}

//Teste update banco de dados
function update_teste($id, $nota, $comentario, $usuario_id, $post_id, $data_criacao): void
{
    $dados = ['nota' => $nota, 'comentario' => $comentario, 'usuario_id' => $usuario_id, 'post_id' => $post_id, 'data_criacao' => $data_criacao]; 
    $criterio = [['id', '=', $id]];
    atualiza('avaliacao', $dados, $criterio);
}
function delete_teste($id){
    $criterio = [['id', '=', $id]];
    deleta('avaliacao', $criterio);
    
}
?>