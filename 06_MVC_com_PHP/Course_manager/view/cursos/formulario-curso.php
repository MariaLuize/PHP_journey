<?php include __DIR__.'/../header.php'; ?>

<form action='/salvar-curso' method='post'>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao"  name="descricao" placeholder="Insira a descrição do curso">
    </div>
    <button class="btn btn-primary">Salvar Curso</button>

</form>

<?php include __DIR__.'/../footer.php'; ?>