<h1>Adicionar Cliente</h1>

<form method="POST" class="form">

    Nome:<br />
    <input type="text" name="name" required /><br /><br />

    CPF:<br />
    <input type="text" name="cpf" id="cpf" required /><br /><br />

    Telefone:<br />
    <input type="text" name="phone" id="phone" required /><br /><br />

    Celular:<br />
    <input type="text" name="cellphone" id="cellphone" required /><br /><br />

    CEP:<br />
    <input type="text" name="zipcode" id="cep" onblur="pesquisacep(this.value);" required /><br /><br />

    Rua:<br />
    <input type="text" name="street" id="rua" required  /><br /><br />

    Número:<br />
    <input type="text" name="number" id="number" required /><br /><br />

    Bairro:<br />
    <input type="text" name="district" id="bairro" required /><br /><br />

    Cidade:<br />
    <input type="text" name="city" id="cidade" required  /><br /><br />

    Estado:<br />
    <input type="text" name="state" id="uf" required  /><br /><br />

    <button type="submit" class="btn btn-add btn-lg"><i class="fas fa-plus"></i> Adicionar Cliente</button>
 
</form>
<!-- form -->

<script src="<?= BASE_URL ?>assets/js/viacep.js"></script>