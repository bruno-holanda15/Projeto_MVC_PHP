<?php 
    require_once __DIR__ . "/../inicio-html.php";
?>

<a href="/novo-curso" class="btn btn-primary mb-3" role="button"> Novo Curso</a>
<ul class="list-group">

    <?php foreach ($cursos as $curso): ?>
        <li class="list-group-item d-flex flex-row justify-content-between">
            <?= $curso->getDescricao(); ?>
            <div>
                <a href="/editar-curso?id=<?php echo $curso->getId(); ?>" class="btn btn-warning">Editar</a>
              
                <a href="/excluir-curso?id=<?php echo $curso->getId(); ?>" class="btn btn-danger">Excluir</a>
                
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<?php
    require_once __DIR__ . "/../fim-html.php";
?>