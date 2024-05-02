<?php

session_start();
if(!isset($_SESSION['id_usuario'])){
    header('Location: /defi/views/login.php');
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/defi/models/saida.php";

try {
    $id = $_GET ['id'];

    $saida = new Saida ($id);
    $saida->deletar();
    header('Location: /defi/views/admin/gerenciar_saidas.php');

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>