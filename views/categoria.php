<style>
    body {
        background-image: url('<?= BASE_URL ?>assets/images/categories_bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<br /><br />
<a class="btn btn-add btn-lg" href="<?= BASE_URL ?>categoria/add"><i class="fas fa-plus"></i> Adicionar Categoria</a>

<form method="GET" class="form-busca">
    <br /><br />
    <fieldset style="background-color: white">
        <input type="text" id="busca" name="busca" value="<?= ($_GET['busca']) ?? ''; ?>" placeholder="Digite o nome da categoria" style="width:100%; height:40px; font-size: 18px" />
        <!-- busca -->
    </fieldset>
</form>
<!-- form-busca -->

<table style="border: 1px solid #4052AE; background-color: #4052AE;" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>
    <?php foreach($list as $item): ?>
        <tr style="background-color: white; border: 1px solid #4052AE;">
            <td><?= $item['id'] ?></td>
            <td><?= $item['name'] ?></td>
            <td>
                <a class="btn btn-edit" href="<?= BASE_URL ?>categoria/edit/<?= $item['id'] ?>"><i class="fas fa-pencil-alt"></i> Editar</a>
                
                <a class="btn btn-delete" href="<?= BASE_URL ?>categoria/delete/<?= $item['id'] ?>"><i class="fas fa-minus-circle"></i> Excluir</a>

                <a class="btn btn-add" href="<?= BASE_URL ?>subcategoria/add/<?= $item['id'] ?>"><i class="fas fa-plus"></i>Subcategoria</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
    document.getElementById('busca').focus();
</script>