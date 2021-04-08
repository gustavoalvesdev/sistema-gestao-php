<h1>Adicionar Produto</h1>

<form method="POST" class="form">

    Código de Barras:<br />
    <input type="text" name="cod" required /><br /><br />

    Nome do Produto:<br />
    <input type="text" name="name" required /><br /><br />

    Categoria:<br />
    <select name="category">
        <?php foreach($list as $item): ?>
            <option><?= $item['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <br /><br />

    Subcategoria:<br />
    <select name="category">
        <option>LÁPIS</option>
        <option>APONTADOR</option>
        <option>TESOURA</option>
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