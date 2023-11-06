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
        <h1>Adicionar Produto</h1>
        
        <p style="color:black"><a href="<?= BASE_URL ?>" style="color:black">Home</a> / <a href="<?= BASE_URL ?>produto" style="color:black">Produtos</a> / Adicionar Produto</p>
    </div>
    
    
    <form method="POST" class="form" style="background-color: white; padding:30px; border-radius: 10px;">
    
        <div class="form-row">
            <div class="form-field w30">
                <label for="cod">Código de Barras:</label>
                <input type="text" name="cod" required />
            </div>
            <!-- form-field -->
            <div class="form-field w70">
                <label for="name">Nome:</label>
                <input type="text" name="name" required />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->
    
        <div class="form-row">
            <div class="form-field w50">
                <label for="category_id">Categoria:</label>
                <select name="category_id" id="category">
                    <option>SELECIONE A CATEGORIA</option>
                    <?php foreach($list as $item): ?>
                        <option value="<?= $item->id ?>"><?= mb_strtoupper($item->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- form-field -->
            <div class="form-field w50">
                <label for="subcategory_id">Subcategoria:</label>
                <select name="subcategory_id" id="subcategories" disabled>
                    <option value="0">SELECIONE A SUBCATEGORIA...</option>
                </select>
            </div>
        </div>
        <!-- form-row -->
    
        <div class="form-row">
            <div class="form-field w33">
                <label for="price">Preço do Produto:</label>
                <input type="text" name="price" placeholder="R$ " required />
            </div>
            <!-- form-field -->
            <div class="form-field w33">
                <label for="quantity">Quantidade:</label>   
                <input type="text" name="quantity" required />       
            </div>
            <!-- form-field -->
            <div class="form-field w33">
                <label for="min_quantity">Qtd. Mínima:</label>    
                <input type="text" name="min_quantity" required />    
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->                
    
        <div class="form-row">
            <button type="submit" class="btn btn-add btn-lg"><i class="fas fa-plus"></i> Adicionar Produto</button>
        </div>
        <!-- form-row -->     
     
    </form>
    <!-- form -->
</div>


<script>
    let baseUrl = '<?= BASE_URL ?>';
</script>
<script src="<?= BASE_URL ?>assets/js/categories_handle.js"></script>