<style>
    body {
        height: 100vh;
        background-image: url('<?= BASE_URL ?>assets/images/workers_bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
		background-attachment: fixed;
    }
</style>

<h1 style="color: #333">Lista de Funcionários</h1>

<p style="margin: 30px 0;"><a class="btn btn-add btn-lg" href="<?= BASE_URL.'funcionario/adicionar' ?>"><i class="fas fa-plus"></i> Adicionar Funcionário</a></p>

<p style="color:#333"><a href="<?= BASE_URL ?>" style="color:#333">Home</a> / Funcionários</p>

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
    <?php foreach($funcionarios as $funcionario): ?>

        <tr style="background-color: white; border: 1px solid #4052AE;">
            <td><?= mb_strtoupper($funcionario->nome, "utf8") ?></td>
            <td><?= $funcionario->celular ?></td>
            <td><?= $funcionario->telefone ?></td>
            <td><?= $funcionario->nivel_de_acesso ?></td>
            <td>
                <a class="btn btn-edit" href="<?= BASE_URL ?>funcionario/editar/<?= $funcionario->id ?>"><i class="fas fa-pencil-alt"></i> Editar</a>

                <a onclick="return confirm('Tem certeza que deseja excluir este funcionário?')" class="btn btn-delete" href="<?= BASE_URL ?>funcionario/excluir/<?= $funcionario->id ?>"><i class="fas fa-minus-circle"></i> Excluir</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<script>
    document.getElementById('busca').focus();
</script>