<br /><br />
<a class="btn btn-add btn-lg" href="<?= BASE_URL ?>fabricante/add"><i class="fas fa-plus"></i> Adicionar Fabricante</a>

<form method="GET" class="form-busca">
    <br /><br />
    <fieldset>
        <input type="text" id="busca" name="busca" value="<?= ($_GET['busca']) ?? ''; ?>" placeholder="Digite o mome do fabricante" style="width:100%; height:40px; font-size: 18px" />
        <!-- busca -->
    </fieldset>
</form>
<!-- form-busca -->

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Site</th>
        <th>Ações</th>
    </tr>
    <?php foreach($list as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['url'] ?></td>
            <td>
                <a class="btn btn-edit" href="<?= BASE_URL ?>fabricante/edit/<?= $item['id'] ?>"><i class="fas fa-pencil-alt"></i> Editar</a>
                
                <a class="btn btn-delete" href="<?= BASE_URL ?>fabricante/delete/<?= $item['id'] ?>"><i class="fas fa-minus-circle"></i> Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
    document.getElementById('busca').focus();
</script>