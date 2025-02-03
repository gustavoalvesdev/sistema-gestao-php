<style>
    body {
        height: 100vh;
        background-image: url('<?= $_SERVER['BASE_URL'] ?>assets/images/products_bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>''

<div style="padding: 2%;">
    <div style="background-color: white; padding: 5px 10px; border-radius: 10px; margin-bottom: 20px;">
        <h1>Adicionar Produto</h1>
        
        <p style="color:black"><a href="<?= $_SERVER['BASE_URL'] ?>" style="color:black">Home</a> / <a href="<?= $_SERVER['BASE_URL'] ?>produto" style="color:black">Produtos</a> / Adicionar Produto</p>
    </div>
    
    
    <form method="POST" class="form" style="background-color: white; padding:30px; border-radius: 10px;">
    
        <div class="form-row">
            <div class="form-field w30">
                <label for="codigo">Código de Barras:</label>
                <input type="text" name="codigo" id="codigo" required />
            </div>
            <!-- form-field -->
            <div class="form-field w70">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->
    
    
        <div class="form-row">
            <div class="form-field w33">
                <label for="preco">Preço do Produto:</label>
                <input type="text" name="preco" id="preco" placeholder="R$ " required />
            </div>
            <!-- form-field -->
            <div class="form-field w33">
                <label for="quantidade">Qtd. Estoque:</label>   
                <input type="text" name="quantidade" id="quantidade" required />       
            </div>
            <!-- form-field -->
            <div class="form-field w33">
                <label for="quantidade_minima">Qtd. Mínima:</label>    
                <input type="text" name="quantidade_minima" id="quantidade_minima" required />    
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->   

        <div class="form-row">
            <div class="form-field w100">
                <label for="id_do_fornecedor">Fornecedor:</label>
                <select name="id_do_fornecedor" id="id_do_fornecedor">
                    <?php foreach ($fornecedores as $fornecedor): ?>
                    <option value="<?= $fornecedor->id ?>"><?= $fornecedor->nome ?> - <?= $fornecedor->cnpj ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- provider_id -->
            </div>
            <!-- form-field -->
            
        </div>
        <!-- form-row -->             
        <br />
        <div class="form-row">
            <button type="submit" class="btn btn-add btn-lg"><i class="fas fa-plus"></i> Adicionar Produto</button>
        </div>
        <!-- form-row -->     
     
    </form>
    <!-- form -->
</div>


<script>
    let baseUrl = '<?= $_SERVER['BASE_URL'] ?>';
</script>