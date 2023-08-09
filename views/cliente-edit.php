<h1>Editar Cliente</h1>

<form method="POST" class="form">

    <div class="form-row">
        <div class="form-field w33">
            <label for="name">Nome:</label>
            <input type="text" name="name" value="<?= $info['name'] ?>" required />
        </div>
        <!-- form-field -->
        <div class="form-field w33">
            <label for="rg">RG:</label>
            <input type="text" name="rg" value="<?= $info['rg'] ?>" />
        </div>
        <!-- form-field -->
        <div class="form-field w33" id="row-cpf">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="<?= $info['cpf'] ?>" />
        </div>
        <!-- form-field -->
    </div>
    <!-- form-row -->

    <div class="form-row">
        <div class="form-field w50">
            <label for="email">E-mail:</label>
            <input type="email" name="email" value="<?= $info['email'] ?>" required />
        </div>
        <!-- form-field -->
        <div class="form-field w25">
            <label for="cellphone">Celular:</label>
            <input type="text" name="cellphone" value="<?= $info['cellphone'] ?>" required />
        </div>
        <!-- form-field -->
        <div class="form-field w25" id="row-phone">
            <label for="phone">Telefone Fixo:</label>
            <input type="text" name="phone" value="<?= $info['phone'] ?>" />
        </div>
        <!-- form-field -->
    </div>
    <!-- form-row -->

    <div class="form-row">
        <div class="form-field w30">
            <label for="zipcode">CEP:</label>
            <input type="text" name="zipcode" id="cep" onblur="pesquisacep(this.value);" value="<?= $info['zipcode'] ?>" required />
        </div>
        <!-- form-field -->
        <div class="form-field w50">
            <label for="rua">Endereço:</label>
            <input type="text" name="street" id="rua" value="<?= $info['street'] ?>" required  />
        </div>
        <!-- form-field -->
        <div class="form-field w20" id="row-number">
            <label for="number">Número:</label>
            <input type="text" name="number" id="number" value="<?= $info['number'] ?>" required  />
        </div>
        <!-- form-field -->
    </div>
    <!-- form-row -->

    <div class="form-row">
        <div class="form-field w25">
            <label for="bairro">Bairro:</label>
            <input type="text" name="district" id="bairro" value="<?= $info['district'] ?>" />
        </div>
        <!-- form-field -->
        <div class="form-field w25">
            <label for="cidade">Cidade:</label>
            <input type="text" name="city" id="cidade" value="<?= $info['city'] ?>" required  />
        </div>
        <!-- form-field -->
        <div class="form-field w25">
            <label for="complement">Complemento:</label>
            <input type="text" name="complement" id="complement" value="<?= $info['complement'] ?>"required  />
        </div>
        <!-- form-field -->

        <div class="form-field w25">
            <label for="uf">Estado:</label>
            <input type="text" name="state" id="uf" value="<?= $info['state'] ?>" required  />
        </div>
        <!-- form-field -->
    </div>
    <!-- form-row -->

    <button type="submit" class="btn btn-edit btn-lg"><i class="fas fa-plus"></i> Editar Cliente</button>
 
</form>
<!-- form -->

<script src="<?= BASE_URL ?>assets/js/viacep.js"></script>