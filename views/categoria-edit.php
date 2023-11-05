<h1>Editar Categoria</h1>

<p style="color:black"><a href="<?= BASE_URL ?>" style="color:black">Home</a> / <a href="<?= BASE_URL ?>categoria" style="color:black">Categorias</a> / Editar Categoria</p>

<form method="POST" class="form">

    <div class="form-row">
        <div class="form-field w100">
            <label for="name">Nome:</label>
            <input type="text" name="name" value="<?= mb_strtoupper($category->name) ?>" required />
        </div>
        <!-- form-field -->
    </div>
    <!-- form-row -->

    <div class="form-row">
        <button type="submit" class="btn btn-edit btn-lg"><i class="fas fa-pencil-alt"></i> Editar Categoria</button>
    </div>
    <!-- form-row -->
 
</form>
<!-- form -->