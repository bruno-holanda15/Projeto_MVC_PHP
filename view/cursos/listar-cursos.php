<?php 
    require_once __DIR__ . "/../inicio-html.php";
?>

<ul class="list-group">
    <?php foreach ($cursos as $curso): ?>
        <li class="list-group-item">
            <?= $curso->getDescricao(); ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php
    require_once __DIR__ . "/../fim-html.php";
?>