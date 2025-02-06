<style>
    body {
        height: 100vh;
        background-image: url('<?= $_SERVER['BASE_URL'] ?>assets/images/provider_bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
		background-attachment: fixed;
    }
</style>

<h1 style="color: #333">Lista de Fornecedores</h1>

<p style="margin: 30px 0;"><a class="btn btn-add btn-lg" href="<?= $_SERVER['BASE_URL'].'fornecedor/adicionar' ?>"><i class="fas fa-plus"></i> Adicionar Fornecedor</a></p>

<p style="color:#333"><a href="<?= $_SERVER['BASE_URL'] ?>" style="color:#333">Home</a> / Fornecedores</p>

<form method="GET" class="form-busca" action="<?= $_SERVER['BASE_URL'] ?>fornecedor/busca/">
    <br /><br />
    <fieldset style="background-color: white">
        <input type="text" id="busca" name="busca" value="<?= ($_GET['busca']) ?? ''; ?>" placeholder="Digite nome ou CNPJ do fornecedor" style="width:100%; height:40px; font-size: 18px" />
        <!-- busca -->
    </fieldset>
</form>
<!-- form-busca -->

<table style="border: 1px solid #4052AE; background-color: #4052AE; overflow: auto" width="100%">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>
    
    <?php foreach($fornecedores as $fornecedor): ?>

        <tr style="background-color: white; border: 1px solid #4052AE;">
            <td><?= mb_strtoupper($fornecedor->nome, "utf8") ?></td>
            <td><?= mb_strtolower($fornecedor->email, "utf8") ?></td>
            <td>
                <a class="btn btn-edit" href="<?= $_SERVER['BASE_URL'] ?>fornecedor/editar/<?= $fornecedor->id ?>"><i class="fas fa-pencil-alt"></i> Editar</a>

                <a onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')" class="btn btn-delete" href="<?= $_SERVER['BASE_URL'] ?>fornecedor/excluir/<?= $fornecedor->id ?>"><i class="fas fa-minus-circle"></i> Excluir</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>
<br />
<?php if (isset($paginas)): ?>
    <?php for($i = 1; $i <= $paginas; $i++): ?>
        <?php if ($pagina_atual == $i): ?>
            <a style="font-weight: bold;" href="<?= $_SERVER['BASE_URL'] . 'fornecedor/pagina/' . $i ?>"><?= $i ?></a>
        <?php else: ?>
            <a href="<?= $_SERVER['BASE_URL'] . 'fornecedor/pagina/' . $i ?>"><?= $i ?></a>
        <?php endif; ?>
    <?php endfor; ?>
<?php endif; ?>
<script>
    document.getElementById('busca').focus();
</script>