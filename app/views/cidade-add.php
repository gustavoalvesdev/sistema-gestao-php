<h1>Adicionar Cidade</h1>

<form method="POST" class="form">

    Nome da Cidade:<br />
    <input type="text" name="name" required /><br /><br />

    Estado:<br />
    <select name="state">
        <?php foreach($list as $item): ?>
            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <br /><br />

    <button type="submit" class="btn btn-add btn-lg"><i class="fas fa-plus"></i> Adicionar Cidade</button>
 
</form>
<!-- form -->