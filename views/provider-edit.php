<h1>Editar Fornecedor</h1>

<form method="POST" class="form">

    Nome do Fornecedor:<br />
    <input type="text" name="name" required value="<?= $info['name'] ?>" /><br /><br />

    Site do Fornecedor:<br />
    <input type="text" name="url" value="<?= $info['url'] ?>" /><br /><br />

    <button type="submit" name="action" class="btn btn-edit btn-lg"><i class="fas fa-pencil"></i> Editar Fornecedor</button>
 
</form>
<!-- form -->