<style>
    body {
        height: 100vh;
        background-image: url('<?= BASE_URL ?>assets/images/customers_bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
		background-attachment: fixed;
    }
</style>

<br /><br />

<p style="margin: 30px 0;"><a class="btn btn-add btn-lg" href="<?= BASE_URL.'cliente/adicionar' ?>"><i class="fas fa-plus"></i> Adicionar Cliente</a></p>

<p style="color:#333"><a href="<?= BASE_URL ?>" style="color:#333">Home</a> / Clientes</p>

<form method="GET" class="form-busca">
    <br /><br />
    <fieldset style="background-color: white">
        <input type="text" id="busca" name="busca" value="<?= ($_GET['busca']) ?? ''; ?>" placeholder="Digite o CPF ou o nome do cliente" style="width:100%; height:40px; font-size: 18px" />
        <!-- busca -->
    </fieldset>
</form>
<!-- form-busca -->

<table style="border: 1px solid #4052AE; background-color: #4052AE; overflow: auto" width="100%">
    <tr>
        <th>Nome</th>
        <th>Celular</th>
        <th>Telefone</th>
        <th>Ações</th>
    </tr>
    <?php foreach($clientes as $cliente): ?>

        <tr style="background-color: white; border: 1px solid #4052AE;">
            <td><?= mb_strtoupper($cliente->nome, "utf8") ?></td>
            <td><?= $cliente->celular ?></td>
            <td><?= $cliente->telefone ?></td>
            <td>
                <a class="btn btn-edit" href="<?= BASE_URL ?>cliente/editar/<?= $cliente->id ?>"><i class="fas fa-pencil-alt"></i> Editar</a>

                <a onclick="return confirm('Tem certeza que deseja excluir este cliente?')" class="btn btn-delete" href="<?= BASE_URL ?>cliente/excluir/<?= $cliente->id ?>"><i class="fas fa-minus-circle"></i> Excluir</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<script>
    document.getElementById('busca').focus();
</script>