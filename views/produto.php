<style>
    body {
        height: 100vh;
        background-image: url('<?= BASE_URL ?>assets/images/products_bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<p style="margin: 30px 0;"><a class="btn btn-add btn-lg" href="<?= BASE_URL.'produto/add' ?>"><i class="fas fa-plus"></i> Adicionar Produto</a></p>

<p style="color:white"><a href="<?= BASE_URL ?>" style="color:white">Home</a> / Produtos</p>

<form method="GET" class="form-busca">
    <br /><br />
    <fieldset style="background-color: white">
        <input type="text" id="busca" name="busca" value="<?= ($_GET['busca']) ?? ''; ?>" placeholder="Digite o código de barras ou o nome do produto" style="width:100%; height:40px; font-size: 18px" />
        <!-- busca -->
    </fieldset>
</form>
<!-- form-busca -->

<table style="border: 1px solid #4052AE; background-color: #4052AE;" width="100%">
    <tr>
        <th>Cód.</th>
        <th>Nome</th>
        <th>Preço Unit.</th>
        <th>Qtd.</th>
        <th>Ações</th>
    </tr>
    <?php foreach($list as $product): ?>

        <tr style="background-color: white; border: 1px solid #4052AE;">
            <td><?= $product->cod ?></td>
            <td><?= mb_strtoupper($product->name); ?></td>
            <td>R$ <?= number_format($product->price, 2, ',', '.') ?></td>
            <td><?= $product->quantity ?></td>
            <td>
                <a class="btn btn-edit" href="<?= BASE_URL ?>produto/edit/<?= $product->id ?>"><i class="fas fa-pencil-alt"></i> Editar</a>

                <a class="btn btn-delete" href="<?= BASE_URL ?>produto/delete/<?= $product->id ?>"><i class="fas fa-minus-circle"></i> Excluir</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>
<br><br>    
<script>
    document.getElementById('busca').focus();
</script>