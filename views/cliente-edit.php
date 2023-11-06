
<style>
    body {
        height: 100vh;
        background-image: url('<?= BASE_URL ?>assets/images/customers_bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }
</style>

<div style="padding: 2%;">
    

    <div style="background-color: white; padding: 5px 10px; border-radius: 10px; margin-bottom: 20px;">
        <h1>Editar Cliente</h1>
        <p style="color:black"><a href="<?= BASE_URL ?>" style="color:black">Home</a> / <a href="<?= BASE_URL ?>cliente" style="color:black">Clientes</a> / Editar Cliente</p>
    </div>

    <form method="POST" class="form" style="background-color: white; padding:30px; border-radius: 10px;">

        <div class="form-row">
            <div class="form-field w33">
                <label for="name">Nome:</label>
                <input type="text" name="name" value="<?= $customer->name ?>" required />
            </div>
            <!-- form-field -->
            <div class="form-field w33">
                <label for="rg">RG:</label>
                <input type="text" name="rg" value="<?= $customer->rg ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w33" id="row-cpf">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" value="<?= $customer->cpf ?>" />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->

        <div class="form-row">
            <div class="form-field w50">
                <label for="email">E-mail:</label>
                <input type="email" name="email" value="<?= $customer->email ?>"  />
            </div>
            <!-- form-field -->
            <div class="form-field w25">
                <label for="cellphone">Celular:</label>
                <input type="text" name="cellphone" value="<?= $customer->cellphone ?>"  />
            </div>
            <!-- form-field -->
            <div class="form-field w25" id="row-phone">
                <label for="phone">Telefone Fixo:</label>
                <input type="text" name="phone" value="<?= $customer->phone ?>" />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->

        <div class="form-row">
            <div class="form-field w30">
                <label for="zipcode">CEP:</label>
                <input type="text" name="zipcode" id="cep" onblur="pesquisacep(this.value);" value="<?= $customer->zipcode ?>"  />
            </div>
            <!-- form-field -->
            <div class="form-field w50">
                <label for="rua">Endereço:</label>
                <input type="text" name="street" id="rua" value="<?= $customer->street ?>"   />
            </div>
            <!-- form-field -->
            <div class="form-field w20" id="row-number">
                <label for="number">Número:</label>
                <input type="text" name="number" id="number" value="<?= $customer->number ?>"   />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->

        <div class="form-row">
            <div class="form-field w25">
                <label for="bairro">Bairro:</label>
                <input type="text" name="district" id="bairro" value="<?= $customer->district ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w25">
                <label for="cidade">Cidade:</label>
                <input type="text" name="city" id="cidade" value="<?= $customer->city ?>"   />
            </div>
            <!-- form-field -->
            <div class="form-field w25">
                <label for="complement">Complemento:</label>
                <input type="text" name="complement" id="complement" value="<?= $customer->complement ?>"  />
            </div>
            <!-- form-field -->

            <div class="form-field w25">
                <label for="uf">Estado:</label>
                <input type="text" name="state" id="uf" value="<?= $customer->state ?>"   />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->

        <br />

        <div class="form-row">
            <button type="submit" class="btn btn-edit btn-lg"><i class="fas fa-plus"></i> Editar Cliente</button>
        </div>

    
    </form>
    <!-- form -->
</div>


<script src="<?= BASE_URL ?>assets/js/viacep.js"></script>