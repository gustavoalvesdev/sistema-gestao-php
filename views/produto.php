<br /><br />
<a class="btn btn-add btn-lg" href="<?= BASE_URL.'produto/add' ?>"><i class="fas fa-plus"></i> Adicionar Produto</a>

<form method="GET" class="form-busca">
    <br /><br />
    <fieldset>
        <input type="text" id="busca" name="busca" value="<?= ($_GET['busca']) ?? ''; ?>" placeholder="Digite o código de barras ou o nome do produto" style="width:100%; height:40px; font-size: 18px" />
        <!-- busca -->
    </fieldset>
</form>
<!-- form-busca -->

<table border="1" width="100%">
    <tr>
        <th>Cód.</th>
        <th>Nome</th>
        <th>Preço Unit.</th>
        <th>Qtd.</th>
        <th>Ações</th>
    </tr>
    <?php foreach($list as $item): ?>

        <tr>
            <td><?= $item['cod'] ?></td>
            <td><?= $item['name'] ?></td>
            <td>R$ <?= number_format($item['price'], 2, ',', '.') ?></td>
            <td><?= $item['quantity'] ?></td>
            <td>
                <a class="btn btn-edit" href="<?= BASE_URL ?>produto/edit/<?= $item['id'] ?>"><i class="fas fa-pencil-alt"></i> Editar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<script>
    document.getElementById('busca').focus();
</script>