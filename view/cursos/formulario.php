<?php 
    require_once __DIR__ . "/../inicio-html.php";
?>

<form action="/salvar-curso" method="POST">
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" class="form-control">
    </div>
    <button class="btn btn-primary">Salvar</button>

</form>

<?php
    require_once __DIR__ . "/../fim-html.php";
?>