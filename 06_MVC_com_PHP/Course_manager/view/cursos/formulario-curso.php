<?php include __DIR__.'/../header.php'; ?>
<!-- https://www.php.net/manual/en/function.isset.php -->
<form action='/salvar-curso<?= isset($curso)? '?id='.$curso->getId(): '';?>' method='post'>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" 
            class="form-control" 
            id="descricao"  name="descricao" 
            placeholder="Insira a descrição do curso"
            value="<?= isset($curso) ? $curso->getDescricao(): '';?>">
    </div>
    <button class="btn btn-light">Salvar Curso</button>

</form>

<?php include __DIR__.'/../footer.php'; ?>