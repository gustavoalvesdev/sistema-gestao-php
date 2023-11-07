<style>
    body {
        height: 100vh;
        background-image: url('<?= BASE_URL ?>assets/images/provider_bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
		background-attachment: fixed;
    }
</style>

<h1 style="color: #333">Lista de Fornecedores</h1>

<p style="margin: 30px 0;"><a class="btn btn-add btn-lg" href="<?= BASE_URL.'fornecedor/add' ?>"><i class="fas fa-plus"></i> Adicionar Fornecedor</a></p>

<p style="color:#333"><a href="<?= BASE_URL ?>" style="color:#333">Home</a> / Fornecedores</p>

<form method="GET" class="form-busca">
    <br /><br />
    <fieldset style="background-color: white">
        <input type="text" id="busca" name="busca" value="<?= ($_GET['busca']) ?? ''; ?>" placeholder="Digite nome ou site do fornecedor" style="width:100%; height:40px; font-size: 18px" />
        <!-- busca -->
    </fieldset>
</form>
<!-- form-busca -->

<table style="border: 1px solid #4052AE; background-color: #4052AE; overflow: auto" width="100%">
    <tr>
        <th>Nome</th>
        <th>Site</th>
        <th>Ações</th>
    </tr>
    <?php foreach($providers as $provider): ?>

        <tr style="background-color: white; border: 1px solid #4052AE;">
            <td><?= mb_strtoupper($provider->name, "utf8") ?></td>
            <td><?= $provider->url ?></td>
            <td>
                <a class="btn btn-edit" href="<?= BASE_URL ?>fornecedor/edit/<?= $provider->id ?>"><i class="fas fa-pencil-alt"></i> Editar</a>

                <a onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')" class="btn btn-delete" href="<?= BASE_URL ?>provider/delete/<?= $provider->id ?>"><i class="fas fa-minus-circle"></i> Excluir</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<script>
    document.getElementById('busca').focus();
</script>