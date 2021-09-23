<?php include __DIR__.'/../header.php'; ?>

<a href="\novo-curso" class="btn btn-primary mb-2">Adicionar novo curso</a>
<ul class="list-group">
    <?php foreach ($cursos as $curso): ?>
        <li class="list-group-item">
            <?= $curso->getDescricao(); ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php include __DIR__.'/../footer.php'; ?>