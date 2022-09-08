<h1>Adicionar Produto</h1>

<form method="POST" class="form">

    Código de Barras:<br />
    <input type="text" name="cod" required /><br /><br />

    Nome do Produto:<br />
    <input type="text" name="name" required /><br /><br />

    Categoria:<br />
    <select name="category_id" id="category">
        <option>SELECIONE A CATEGORIA</option>
        <?php foreach($list as $item): ?>
            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <br /><br />

    Subcategoria:<br />
    <select name="subcategory_id" id="subcategories" disabled>
        <option value="0">SELECIONE A SUBCATEGORIA...</option>
    </select>
    <br /><br />

    Preço do Produto:<br />
    <input type="text" name="price" required /><br /><br />

    Quantidade:<br />
    <input type="text" name="quantity" required /><br /><br />

    Qtd. Mínima:<br />
    <input type="text" name="min_quantity" required /><br /><br />

    <button type="submit" class="btn btn-add btn-lg"><i class="fas fa-plus"></i> Adicionar Produto</button>
 
</form>
<!-- form -->

<script>
    let baseUrl = '<?= BASE_URL ?>';
</script>
<script src="<?= BASE_URL ?>assets/js/categories_handle.js"></script>