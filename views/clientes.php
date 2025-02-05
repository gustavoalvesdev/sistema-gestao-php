<style>
    body {
        height: 100vh;
        background-image: url('<?= $_SERVER['BASE_URL'] ?>assets/images/customers_bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
		background-attachment: fixed;
    }
</style>

<br /><br />

<p style="margin: 30px 0;"><a class="btn btn-add btn-lg" href="<?= $_SERVER['BASE_URL'].'cliente/adicionar' ?>"><i class="fas fa-plus"></i> Adicionar Cliente</a></p>

<p style="color:#333"><a href="<?= $_SERVER['BASE_URL'] ?>" style="color:#333">Home</a> / Clientes</p>

<?php if(isset($_SESSION['formatoInvalido'])): ?>

    <p style="color:red">
        <?php 

            echo $_SESSION['formatoInvalido'];
            unset($_SESSION['formatoInvalido']);

        ?>
    </p>

<?php endif; ?>

<?php if(isset($_SESSION['uploadJson'])): ?>

        <?php 
            echo $_SESSION['uploadJson'];
            unset($_SESSION['uploadJson']);
        ?>

<?php endif; ?>

<p>
    <form method="POST" action="<?= $_SERVER['BASE_URL'] ?>produto/json" enctype="multipart/form-data">
        <label for="jsonFile">Importar Via JSON:</label><br><br>
        <input type="file" name="jsonFile" id="jsonFile" />
        <input type="submit" name="action" value="Enviar" />
    </form>
</p>

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
                <a class="btn btn-edit" href="<?= $_SERVER['BASE_URL'] ?>cliente/editar/<?= $cliente->id ?>"><i class="fas fa-pencil-alt"></i> Editar</a>

                <a onclick="return confirm('Tem certeza que deseja excluir este cliente?')" class="btn btn-delete" href="<?= $_SERVER['BASE_URL'] ?>cliente/excluir/<?= $cliente->id ?>"><i class="fas fa-minus-circle"></i> Excluir</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>
<br />
<?php for($i = 1; $i <= $paginas; $i++): ?>
    <?php if ($pagina_atual == $i): ?>
        <a style="font-weight: bold;" href="<?= $_SERVER['BASE_URL'] . 'cliente/' . $i ?>"><?= $i ?></a>
    <?php else: ?>
        <a href="<?= $_SERVER['BASE_URL'] . 'cliente/' . $i ?>"><?= $i ?></a>
    <?php endif; ?>
<?php endfor; ?>

<script>
    document.getElementById('busca').focus();
</script>