<style>
    body {
        height: 100vh;
        background-image: url('<?= BASE_URL ?>assets/images/customers_bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<div style="padding: 2%;">
    <div style="background-color: white; padding: 5px 10px; border-radius: 10px; margin-bottom: 20px;">
        <h1>Adicionar Cliente</h1>

        <p style="color:black"><a href="<?= BASE_URL ?>" style="color:black">Home</a> / <a href="<?= BASE_URL ?>cliente" style="color:black">Clientes</a> / Adicionar Cliente</p>
    </div>

    <form method="POST" class="form" style="background-color: white; padding:30px; border-radius: 10px;">
    
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
</div>




<script src="<?= BASE_URL ?>assets/js/viacep.js"></script>