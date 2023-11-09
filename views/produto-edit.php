<style>
    body {
        height: 100vh;
        background-image: url('<?= BASE_URL ?>assets/images/products_bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<div style="padding: 2%;">

    <div style="background-color: white; padding: 5px 10px; border-radius: 10px; margin-bottom: 20px;">
        <h1>Editar Produto</h1>

        <p style="color:black"><a href="<?= BASE_URL ?>" style="color:black">Home</a> / <a href="<?= BASE_URL ?>produto" style="color:black">Produtos</a> / Editar Produto</p>
    </div>


    <form method="POST" class="form" style="background-color: white; padding:30px; border-radius: 10px;">

        Código de Barras:<br />
        <input type="text" name="cod" required value="<?= $product->cod ?>" /><br /><br />

        Nome do Produto:<br />
        <input type="text" name="name" required value="<?= $product->name ?>" /><br /><br />

        Categoria:<br />
        <select name="category_id" id="category">
            <?php foreach($categories as $category): ?>
                <?php if ($category->soft_delete != 1): ?>
                    <option value="<?= $category->id ?>" <?= ($category->id == $product->category_id) ? 'selected' : '' ?> ><?= mb_strtoupper($category->name) ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br /><br />

        Subcategoria:<br />
        <select name="subcategory_id" id="subcategories" disabled>
            <option value="0">SELECIONE A SUBCATEGORIA...</option>
        </select>
        <br /><br />

        Preço do Produto:<br />
        <input type="text" name="price" required value="<?= number_format($product->price, 2, ',', '.') ?>" /><br /><br />

        Quantidade:<br />
        <input type="text" name="quantity" required value="<?= number_format($product->quantity, 2, ',', '.') ?>" /><br /><br />

        Qtd. Mínima:<br />
        <input type="text" name="min_quantity" required value="<?= number_format($product->min_quantity, 2, ',', '.') ?>" /><br /><br />

        <button class="btn btn-edit btn-lg" type="submit"><i class="fas fa-pencil-alt"></i> Editar</button>
    
    </form>
    <!-- form -->

</div>
<script>
    let baseUrl = '<?= BASE_URL ?>';
</script>
<script src="<?= BASE_URL ?>assets/js/categories_handle.js"></script>
