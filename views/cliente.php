<style>
    body {
        height: 100vh;
        background-image: url('<?= BASE_URL ?>assets/images/customers_bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<br /><br />

<h1 style="color: white">Lista de Clientes</h1>

<a class="btn btn-add btn-lg" href="<?= BASE_URL.'cliente/add' ?>"><i class="fas fa-plus"></i> Adicionar Cliente</a>

<form method="GET" class="form-busca">
    <br /><br />
    <fieldset style="background-color: white">
        <input type="text" id="busca" name="busca" value="<?= ($_GET['busca']) ?? ''; ?>" placeholder="Digite o CPF ou o nome do cliente" style="width:100%; height:40px; font-size: 18px" />
        <!-- busca -->
    </fieldset>
</form>
<!-- form-busca -->

<table style="border: 1px solid #4052AE; background-color: #4052AE;" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Celular</th>
        <th>Ações</th>
    </tr>
    <?php foreach($list as $item): ?>

        <tr style="background-color: white; border: 1px solid #4052AE;">
            <td><?= $item['id'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['cpf'] ?></td>
            <td><?= $item['cellphone'] ?></td>
            <td>
                <a class="btn btn-edit" href="<?= BASE_URL ?>cliente/edit/<?= $item['id'] ?>"><i class="fas fa-pencil-alt"></i> Editar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<script>
    document.getElementById('busca').focus();
</script>