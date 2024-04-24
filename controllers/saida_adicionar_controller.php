<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/defi/models/saida.php';

session_start();

try {
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $cat = $_POST['categoria'];

    $saida = new Saida();
    $saida->valor_saida = $valor;
    $saida->descricao = $descricao;
    $saida->data_saida = $data;
    $saida->id_categoria = $cat;
    $saida->id_usuario = $_SESSION['id_usuario'];

    $saida->criar();

    header('Location: /defi/views/admin/gerenciar_saidas.php');
    exit();


} catch (PDOException $e) {
    echo $e->getMessage();
}