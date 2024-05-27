<style>
body {
    background-image: url('<?= BASE_URL ?>assets/images/home_bg.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
</style>

<h1 style="color: #333">SGI - Sistema de Gestão Interno</h1>

<p style="color:white">Home</p>

<div class="cards-container">

    <a href="<?= BASE_URL ?>produto">
        <div class="card" style="background-color: #A028A9">
            <p><strong><i class="fas fa-box"></i><br /> Produtos</strong></p>
        </div>
        <!-- card -->
    </a>
    
    <a href="<?= BASE_URL ?>fornecedor">
        <div class="card" style="background-color: #FF9632">
            <p><strong><i class="fas fa-industry"></i><br /> Fornecedores</strong></p>
        </div>
        <!-- card -->
    </a>

    <a href="<?= BASE_URL ?>cliente">
        <div class="card" style="background-color: #4052AE">
            <p><strong><i class="fas fa-users"></i><br /> Clientes</strong></p>
        </div>
        <!-- card -->
    </a>

    <a href="<?= BASE_URL ?>funcionario">
        <div class="card" style="background-color: #7A5449">
            <p><strong><i class="fas fa-briefcase"></i><br /> Funcionários</strong></p>
        </div>
        <!-- card -->
    </a>

    <div class="card" style="background-color: #F93F3B">
        <p><strong><i class="fas fa-cash-register"></i><br /> Vendas</strong></p>
    </div>
    <!-- card -->
    <div class="card" style="background-color: #84C25B">
        <p><strong><i class="fas fa-wallet"></i><br /> Contas</strong></p>
    </div>
    <!-- card -->

    <a href="<?= BASE_URL ?>relatorio">
        <div class="card" style="background-color: #00BCD0">
            <p><strong><i class="fas fa-copy"></i><br /> Relatórios</strong></p>
        </div>
        <!-- card -->
    </a>

    <div class="card" style="background-color: #7D6320">
        <p><strong><i class="fas fa-chart-pie"></i><br /> Dashboards</strong></p>
    </div>
    <!-- card -->

</div>
<!-- cards-container -->