<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/defi/models/entrada.php';

session_start();

try {
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $cat = $_POST['categoria'];

    $entrada = new Entrada();
    $entrada->valor_entrada = $valor;
    $entrada->descricao = $descricao;
    $entrada->data_entrada = $data;
    $entrada->id_categoria = $cat;
    $entrada->id_usuario = $_SESSION['id_usuario'];

    $entrada->criar();

    header('Location: /defi/views/admin/gerenciar_entradas.php');
    exit();


} catch (PDOException $e) {
    echo $e->getMessage();
}