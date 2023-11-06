<style>
    body {
        background-image: url('<?= BASE_URL ?>assets/images/categories_bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<div style="padding: 2%;">

    <div style="background-color: white; padding: 5px 10px; border-radius: 10px; margin-bottom: 20px;">
        <h1>Adicionar Categoria</h1>
    
        <p style="color:black"><a href="<?= BASE_URL ?>" style="color:black">Home</a> / <a href="<?= BASE_URL ?>categoria" style="color:black">Categorias</a> / Adicionar Categoria</p>
    </div>


    <form method="POST" class="form" style="background-color: white; padding:30px; border-radius: 10px;">
        <div class="form-row">
            <div class="form-field w100">
                <label for="name">Nome da Categoria:</label>
                <input type="text" name="name" required />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->

        <div class="form-row">
            <button type="submit" class="btn btn-add btn-lg"><i class="fas fa-plus"></i> Adicionar Categoria</button>
        </div>
        <!-- form-row -->
    
    </form>
    <!-- form -->
</div>
