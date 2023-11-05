<h1>Adicionar Categoria</h1>

<p style="color:black"><a href="<?= BASE_URL ?>" style="color:black">Home</a> / <a href="<?= BASE_URL ?>categoria" style="color:black">Categorias</a> / Adicionar Categoria</p>

<form method="POST" class="form">
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