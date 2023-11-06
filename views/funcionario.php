<style>
    body {
        height: 100vh;
        background-image: url('<?= BASE_URL ?>assets/images/customers_bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
		background-attachment: fixed;
    }
</style>

<h1 style="color: white">Lista de Funcionários</h1>

<p style="margin: 30px 0;"><a class="btn btn-add btn-lg" href="<?= BASE_URL.'funcionario/add' ?>"><i class="fas fa-plus"></i> Adicionar Funcionário</a></p>

<p style="color:white"><a href="<?= BASE_URL ?>" style="color:white">Home</a> / Funcionários</p>

<form method="GET" class="form-busca">
    <br /><br />
    <fieldset style="background-color: white">
        <input type="text" id="busca" name="busca" value="<?= ($_GET['busca']) ?? ''; ?>" placeholder="Digite o CPF ou o nome do funcionário" style="width:100%; height:40px; font-size: 18px" />
        <!-- busca -->
    </fieldset>
</form>
<!-- form-busca -->

<table style="border: 1px solid #4052AE; background-color: #4052AE; overflow: auto" width="100%">
    <tr>
        <th>Nome</th>
        <th>Celular</th>
        <th>Telefone</th>
        <th>Nível</th>
        <th>Ações</th>
    </tr>
    <?php foreach($workers as $worker): ?>

        <tr style="background-color: white; border: 1px solid #4052AE;">
            <td><?= mb_strtoupper($worker->nome, "utf8") ?></td>
            <td><?= $worker->celular ?></td>
            <td><?= $worker->telefone ?></td>
            <td><?= $worker->nivel_acesso ?></td>
            <td>
                <a class="btn btn-edit" href="<?= BASE_URL ?>funcionario/edit/<?= $worker->id ?>"><i class="fas fa-pencil-alt"></i> Editar</a>

                <a onclick="return confirm('Tem certeza que deseja excluir este funcionário?')" class="btn btn-delete" href="<?= BASE_URL ?>funcionario/delete/<?= $worker->id ?>"><i class="fas fa-minus-circle"></i> Excluir</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<script>
    document.getElementById('busca').focus();
</script>