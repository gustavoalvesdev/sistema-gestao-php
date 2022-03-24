<br /><br />
<a class="btn btn-add btn-lg" href="<?= BASE_URL ?>cidade/add"><i class="fas fa-plus"></i> Adicionar Cidade</a>

<form method="GET" class="form-busca">
    <br /><br />
    <fieldset>
        <input type="text" id="busca" name="busca" value="<?= ($_GET['busca']) ?? ''; ?>" placeholder="Digite o mome da cidade" style="width:100%; height:40px; font-size: 18px" />
        <!-- busca -->
    </fieldset>
</form>
<!-- form-busca -->

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Estado</th>
        <th>Ações</th>
    </tr>

    <?php foreach($list as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['name'] ?></td>
            <td>SÃO PAULO</td>
            <td>
                <a class="btn btn-edit" href="<?= BASE_URL ?>categoria/edit/3"><i class="fas fa-pencil-alt"></i> Editar</a>
                
                <a class="btn btn-delete" href="<?= BASE_URL ?>categoria/edit/3"><i class="fas fa-minus-circle"></i> Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<script>
    document.getElementById('busca').focus();
</script>