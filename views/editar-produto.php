<style>
    body {
        height: 100vh;
        background-image: url('<?= $_SERVER['BASE_URL'] ?>assets/images/products_bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<div style="padding: 2%;">

    <div style="background-color: white; padding: 5px 10px; border-radius: 10px; margin-bottom: 20px;">
        <h1>Editar Produto</h1>

        <p style="color:black"><a href="<?= $_SERVER['BASE_URL'] ?>" style="color:black">Home</a> / <a href="<?= $_SERVER['BASE_URL'] ?>produto" style="color:black">Produtos</a> / Editar Produto</p>
    </div>


    <form method="POST" class="form" style="background-color: white; padding:30px; border-radius: 10px;">

        <div class="form-row">
            <div class="form-field w30">
                <label for="codigo">Código de Barras:</label>
                <input type="text" name="codigo" required value="<?= $produto->codigo ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w70">
                <label for="name">Nome do Produto:</label>
                <input type="text" name="nome" required value="<?= $produto->nome ?>" />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->
        
        <div class="form-row">
            <div class="form-field w33">
                <label class="preco">Preço do Produto:</label>
                <input type="text" name="preco" required value="<?= number_format($produto->preco, 2, ',', '.') ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w33">
                <label for="quantidade">Quantidade:</label>
                <input type="text" name="quantidade" required value="<?= number_format($produto->quantidade, 2, ',', '.') ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w33">
                <label for="quantidade_minima">Qtd. Mínima:</label>
                <input type="text" name="quantidade_minima" required value="<?= number_format($produto->quantidade_minima, 2, ',', '.') ?>" />
            </div>
        </div>
        <!-- form-row -->

        <div class="form-row">
            <div class="form-field w100">
                <label for="id_do_fornecedor">Fornecedor:</label>
                <select name="id_do_fornecedor" id="id_do_fornecedor">
                    <?php foreach ($fornecedores as $fornecedor): ?>
                    <option value="<?= $fornecedor->id ?>" <?= ($fornecedor->id == $produto->id_do_fornecedor) ? 'selected' : ''; ?>><?= $fornecedor->nome ?> - <?= $fornecedor->cnpj ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- provider_id -->
            </div>
            <!-- form-field -->
            
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
    let baseUrl = '<?= $_SERVER['BASE_URL'] ?>';
</script>
