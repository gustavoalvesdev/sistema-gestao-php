<style>
    body {
        height: 100vh;
        background-image: url('<?= $_SERVER['BASE_URL'] ?>assets/images/products_bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<p style="margin: 30px 0;"><a class="btn btn-add btn-lg" href="<?= $_SERVER['BASE_URL'].'produto/adicionar' ?>"><i class="fas fa-plus"></i> Adicionar Produto</a></p>

<p style="color:#333"><a href="<?= $_SERVER['BASE_URL'] ?>" style="color:#333">Home</a> / Produtos</p>

<?php if(isset($_SESSION['uploadJson'])): ?>

        <?php 
            echo $_SESSION['uploadJson'];
            unset($_SESSION['uploadJson']);
        ?>

<?php endif; ?>

<p>
    <form method="POST" action="<?= $_SERVER['BASE_URL'] ?>cliente/json" enctype="multipart/form-data">
        <label for="jsonFile">Importar Via JSON:</label><br><br>
        <input type="file" name="jsonFile" id="jsonFile" />
        <input type="submit" name="action" value="Enviar" />
    </form>
</p>

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
    <?php foreach($produtos as $produto): ?>

        <tr style="background-color: white; border: 1px solid #4052AE;">
            <td><?= $produto->codigo ?></td>
            <td><?= mb_strtoupper($produto->nome); ?></td>
            <td>R$ <?= number_format($produto->preco, 2, ',', '.') ?></td>
            <td><?= $produto->quantidade ?></td>
            <td>
                <a class="btn btn-edit" href="<?= $_SERVER['BASE_URL'] ?>produto/editar/<?= $produto->id ?>"><i class="fas fa-pencil-alt"></i> Editar</a>

                <a onclick="return confirm('Tem certeza que deseja excluir este produto?')" class="btn btn-delete" href="<?= $_SERVER['BASE_URL'] ?>produto/excluir/<?= $produto->id ?>"><i class="fas fa-minus-circle"></i> Excluir</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>
<br><br>    
<script>
    document.getElementById('busca').focus();
</script>