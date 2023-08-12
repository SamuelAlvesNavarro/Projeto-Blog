<?php

function limparDados(string $dados) : string
{
    $tags = '<p><strong><i><ul><ol><li><h1><h2><h3>';

    $retorno = htmlentities(strip_tags($dados, $tags));

    return $retorno;
}

?>