<h1>Editar Produto</h1>

<form method="POST" class="form">

    Código de Barras:<br />
    <input type="text" name="cod" required value="<?= $info['cod'] ?>" /><br /><br />

    Nome do Produto:<br />
    <input type="text" name="name" required value="<?= $info['name'] ?>" /><br /><br />

    Preço do Produto:<br />
    <input type="text" name="price" required value="<?= number_format($info['price'], 2, ',', '.') ?>" /><br /><br />

    Quantidade:<br />
    <input type="text" name="quantity" required value="<?= number_format($info['quantity'], 2, ',', '.') ?>" /><br /><br />

    Qtd. Mínima:<br />
    <input type="text" name="min_quantity" required value="<?= number_format($info['min_quantity'], 2, ',', '.') ?>" /><br /><br />

    <button class="btn btn-edit btn-lg" type="submit"><i class="fas fa-pencil-alt"></i> Editar</button>
 
</form>
<!-- form -->