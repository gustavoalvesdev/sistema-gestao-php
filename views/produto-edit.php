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

        <div class="form-row">
            <div class="form-field w30">
                <label for="cod">Código de Barras:</label>
                <input type="text" name="cod" required value="<?= $product->cod ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w70">
                <label for="name">Nome do Produto:</label>
                <input type="text" name="name" required value="<?= $product->name ?>" />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->
        
        <div class="form-row">
            <div class="form-field w33">
                <label class="price">Preço do Produto:</label>
                <input type="text" name="price" required value="<?= number_format($product->price, 2, ',', '.') ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w33">
                <label for="quantity">Quantidade:</label>
                <input type="text" name="quantity" required value="<?= number_format($product->quantity, 2, ',', '.') ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w33">
                <label for="quantity">Qtd. Mínima:</label>
                <input type="text" name="min_quantity" required value="<?= number_format($product->min_quantity, 2, ',', '.') ?>" />
            </div>
        </div>
        <!-- form-row -->

        <div class="form-row">
            <button class="btn btn-edit btn-lg" type="submit"><i class="fas fa-pencil-alt"></i> Editar</button>
        </div>
        <!-- form-row -->  
    
    </form>
    <!-- form -->

</div>
<script>
    let baseUrl = '<?= BASE_URL ?>';
</script>
<script src="<?= BASE_URL ?>assets/js/categories_handle.js"></script>
