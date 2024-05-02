<?php
$tituloPagina = 'Editar Saída';
require_once $_SERVER['DOCUMENT_ROOT'] . '/defi/templates/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/defi/models/saida.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/defi/models/categoria.php';

if(!isset($_SESSION['id_usuario'])){
    header('Location: /defi/views/login.php');
}


try {
    $id = $_GET['id'];
    $novaSaida = new Saida($id);
    $categorias = Categoria::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<section class="nav-right-cont">
    <form action="/defi/controllers/saida_editar_controller.php" method="post">
        <div class="login">
            <label for="valor">Valor</label>
            <input type="number" class="inputLogin" name="valor" id="valor" value='<?= $novaSaida->valor_saida ?>'>

            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" cols="30" rows="10"><?= $novaSaida->descricao ?></textarea>

            <label for="data">Data</label>
            <input type="date" class="inputLogin" name="data" id="data" value='<?= $novaSaida->data_saida ?>'>

            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria" class="inputLogin">
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria['id_categoria'] ?>" <?= $novaSaida->id_categoria == $categoria['id_categoria'] ? 'selected' : '' ?>><?= $categoria['nome_categoria'] ?></option>
                <?php endforeach; ?>
            </select>

            <fieldset>
                <legend>Esta pago?</legend>

                <label for="radiosim">Sim</label>
                <input type="radio" name="pago" id="radiosim" value="1" <?= $novaSaida->pago == 1 ? 'checked' : '' ?>>
                
                <label for="radionao">Não</label>
                <input type="radio" name="pago" id="radionao" value="0" <?= $novaSaida->pago == 0 ? 'checked' : '' ?>>
            </fieldset>

            <input type="hidden" name="id" value="<?= $novaSaida->id_saida ?>">

            <button type="submit" class="bEntrar">Atualizar</button>
        </div>
    </form>
</section>
</body>

</html>