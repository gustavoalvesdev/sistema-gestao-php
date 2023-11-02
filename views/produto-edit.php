<h1>Editar Produto</h1>

<form method="POST" class="form">

    Código de Barras:<br />
    <input type="text" name="cod" required value="<?= $product->cod ?>" /><br /><br />

    Nome do Produto:<br />
    <input type="text" name="name" required value="<?= $product->name ?>" /><br /><br />

    Categoria:<br />
    <select name="category_id" id="category">
        <option value="<?= $info['category_id'] ?>"><?= mb_strtoupper($category_name) ?></option>
    </select>
    <br /><br />

    Subcategoria:<br />
    <select name="subcategory_id" id="subcategories">
        <?php foreach($subcategories as $item): ?>
            <option value="<?= $item['id'] ?>" <?= ($item['id'] == $info['subcategory_id']) ? 'selected' : '' ?>><?= mb_strtoupper($item['name']) ?></option>
        <?php endforeach; ?>
    </select>
    <br /><br />

    Preço do Produto:<br />
    <input type="text" name="price" required value="<?= number_format($info['price'], 2, ',', '.') ?>" /><br /><br />

    Quantidade:<br />
    <input type="text" name="quantity" required value="<?= number_format($info['quantity'], 2, ',', '.') ?>" /><br /><br />

    Qtd. Mínima:<br />
    <input type="text" name="min_quantity" required value="<?= number_format($info['min_quantity'], 2, ',', '.') ?>" /><br /><br />

    <button class="btn btn-edit btn-lg" type="submit"><i class="fas fa-pencil-alt"></i> Editar</button>
 
</form>
<!-- form -->