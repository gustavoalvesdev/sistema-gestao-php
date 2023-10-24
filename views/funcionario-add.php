<h1>Adicionar Funcionário</h1>

<form method="POST" class="form">

    <div class="form-row">
        <div class="form-field w33">
            <label for="name">Nome:</label>
            <input type="text" name="name" required />
        </div>
        <!-- form-field -->
        <div class="form-field w33">
            <label for="rg">RG:</label>
            <input type="text" name="rg" />
        </div>
        <!-- form-field -->
        <div class="form-field w33" id="row-cpf">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" />
        </div>
        <!-- form-field -->
    </div>
    <!-- form-row -->

    <div class="form-row">
        <div class="form-field w50">
            <label for="email">E-mail:</label>
            <input type="email" name="email"  />
        </div>
        <!-- form-field -->
        <div class="form-field w25">
            <label for="cellphone">Celular:</label>
            <input type="text" name="cellphone" />
        </div>
        <!-- form-field -->
        <div class="form-field w25" id="row-phone">
            <label for="phone">Telefone Fixo:</label>
            <input type="text" name="phone" />
        </div>
        <!-- form-field -->
    </div>
    <!-- form-row -->

    <div class="form-row">
        <div class="form-field w50">
            <label for="password">Senha:</label>
            <input type="password" name="password"  />
        </div>
        <!-- form-field -->
        <div class="form-field w25">
            <label for="role">Cargo:</label>
            <input type="text" name="role" />
        </div>
        <!-- form-field -->

        <div class="form-field w25">
            <label for="access_level">Nível de Acesso:</label>
            <select name="access_level">
                <option value="1">Usuário</option>
                <option value="2">Administrador</option>
            </select>
        </div>
        <!-- form-field -->
    </div>
    <!-- form-row -->

    <div class="form-row">
        <div class="form-field w30">
            <label for="zipcode">CEP:</label>
            <input type="text" name="zipcode" id="cep" onblur="pesquisacep(this.value);"  />
        </div>
        <!-- form-field -->
        <div class="form-field w50">
            <label for="address">Endereço:</label>
            <input type="text" name="street" id="rua"   />
        </div>
        <!-- form-field -->
        <div class="form-field w20" id="row-number">
            <label for="address_number">Número:</label>
            <input type="text" name="number" id="number"   />
        </div>
        <!-- form-field -->
    </div>
    <!-- form-row -->

    <div class="form-row">
        <div class="form-field w25">
            <label for="bairro">Bairro:</label>
            <input type="text" name="district" id="bairro" />
        </div>
        <!-- form-field -->
        <div class="form-field w25">
            <label for="cidade">Cidade:</label>
            <input type="text" name="city" id="cidade"   />
        </div>
        <!-- form-field -->
        <div class="form-field w25">
            <label for="complement">Complemento:</label>
            <input type="text" name="complement" id="complement"   />
        </div>
        <!-- form-field -->

        <div class="form-field w25">
            <label for="uf">Estado:</label>
            <input type="text" name="state" id="uf"   />
        </div>
        <!-- form-field -->
    </div>
    <!-- form-row -->
    <br>
    <div class="form-row">
        <button type="submit" class="btn btn-add btn-lg"><i class="fas fa-plus"></i> Adicionar Cliente</button>
    </div>
    <!-- form-row -->
 
</form>
<!-- form -->

<script src="<?= BASE_URL ?>assets/js/viacep.js"></script>