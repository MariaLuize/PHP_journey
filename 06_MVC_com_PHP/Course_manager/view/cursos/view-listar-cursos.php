<?php include __DIR__.'/../header.php'; ?>

<a href="\novo-curso" class="btn btn-info mb-2">Adicionar novo curso</a>
<ul class="list-group">
    <?php foreach ($cursos as $curso): ?>
        <li class="list-group-item d-flex justify-content-between">
            <?= $curso->getDescricao(); ?>
            <span>
                <a href="/update-curso?id=<?= $curso->getId(); ?>" class="btn btn-outline-warning btn-sm">Update</a>
                <a href="/excluir-curso?id=<?= $curso->getId(); ?>" class="btn btn-outline-danger btn-sm">Excluir</a>
            </span>
            
        </li>
    <?php endforeach; ?>
</ul>

<?php include __DIR__.'/../footer.php'; ?>
