<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/defi/models/entrada.php";
try {
    $valor = $_POST['valor'];
    $data =   $_POST['data'];
    $descricao =  $_POST['descricao'];
    $categoria =  $_POST['categoria'];
    $id =  $_POST['id'];

    $entrada = new Entrada($id);
    $entrada->valor_entrada = $valor;
    $entrada->data_entrada = $data;
    $entrada->descricao = $descricao;
    $entrada->id_categoria = $categoria;
    
    $entrada->atualizar();

    header('Location: /defi/views/admin/gerenciar_entradas.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}

