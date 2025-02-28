<style>
    body {
        height: 100vh;
        background-image: url('<?= $_SERVER['BASE_URL'] ?>assets/images/workers_bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<div style="padding: 2%;">

    <div style="background-color: white; padding: 5px 10px; border-radius: 10px; margin-bottom: 20px;">
        <h1>Editar Funcionário</h1>

        <p style="color:black"><a href="<?= $_SERVER['BASE_URL'] ?>" style="color:black">Home</a> / <a href="<?= $_SERVER['BASE_URL'] ?>funcionario" style="color:black">Funcionários</a> / Editar Funcionário</p>
    </div>


    <form method="POST" class="form" style="background-color: white; padding:30px; border-radius: 10px;">

        <div class="form-row">
            <div class="form-field w33">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?= mb_strtoupper($funcionario->nome) ?>" required />
            </div>
            <!-- form-field -->
            <div class="form-field w33">
                <label for="rg">RG:</label>
                <input type="text" name="rg" value="<?= $funcionario->rg ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w33" id="row-cpf">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" value="<?= $funcionario->cpf ?>" />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->

        <div class="form-row">
            <div class="form-field w50">
                <label for="email">E-mail:</label>
                <input type="email" name="email" value="<?= $funcionario->email ?>"  />
            </div>
            <!-- form-field -->
            <div class="form-field w25">
                <label for="celular">Celular:</label>
                <input type="text" name="celular" value="<?= $funcionario->celular ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w25" id="row-phone">
                <label for="telefone">Telefone Fixo:</label>
                <input type="text" name="telefone" value="<?= $funcionario->telefone ?>" />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->

        <div class="form-row">
            <div class="form-field w50">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" value="<?= $funcionario->senha ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w25">
                <label for="cargo">Cargo:</label>
                <input type="text" name="cargo" value="<?= mb_strtoupper($funcionario->cargo) ?>" />
            </div>
            <!-- form-field -->

            <div class="form-field w25">
                <label for="nivel_de_acesso">Nível de Acesso:</label>
                <select name="nivel_de_acesso">
                    <option value="Usuário" <?= ($funcionario->nivel_de_acesso == 'Usuário') ? 'selected': '' ?>>Usuário</option>
                    <option value="Administrador" <?= ($funcionario->nivel_de_acesso == 'Administrador') ? 'selected': '' ?>>Administrador</option>
                </select>
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->

        <div class="form-row">
            <div class="form-field w30">
                <label for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" onblur="pesquisacep(this.value);" value="<?= $funcionario->cep ?>"  />
            </div>
            <!-- form-field -->
            <div class="form-field w50">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" value="<?= mb_strtoupper($funcionario->endereco) ?>"   />
            </div>
            <!-- form-field -->
            <div class="form-field w20" id="row-number">
                <label for="numero">Número:</label>
                <input type="text" name="numero" id="numero" value="<?= $funcionario->numero ?>" />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->

        <div class="form-row">
            <div class="form-field w25">
                <label for="bairro">Bairro:</label>
                <input type="text" name="bairro" id="bairro" value="<?= mb_strtoupper($funcionario->bairro) ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w25">
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" value="<?= mb_strtoupper($funcionario->cidade) ?>" />
            </div>
            <!-- form-field -->
            <div class="form-field w25">
                <label for="complemento">Complemento:</label>
                <input type="text" name="complemento" id="complemento" value="<?= mb_strtoupper($funcionario->complemento) ?>" />
            </div>
            <!-- form-field -->

            <div class="form-field w25">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado" value="<?= mb_strtoupper($funcionario->estado) ?>" />
            </div>
            <!-- form-field -->
        </div>
        <!-- form-row -->
        <br>
        <div class="form-row">
            <button type="submit" class="btn btn-add btn-lg"><i class="fas fa-plus"></i> Editar Funcionário</button>
        </div>
        <!-- form-row -->
    
    </form>
    <!-- form -->
</div>


<script src="<?= $_SERVER['BASE_URL'] ?>assets/js/viacep.js"></script>