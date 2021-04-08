<style media="print">
    #btn-imprimir,
    #btn-voltar {
        display: none;
    }
</style>

<h1>Relatório de Produtos com Estoque Baixo</h1>

<table border="1" width="100%">
    <tr>
        <th>Nome do Produto</th>
        <th>Qtd.</th>
        <th>Qtd. Min.</th>
        <th>Diferença</th>
    </tr>

    <?php foreach($list as $item): ?>

        <tr>
            <td><?= $item['name'] ?></td>
            <td><?=  $item['quantity'] ?></td>
            <td><?=  $item['min_quantity'] ?></td>
            <td><?= floatval($item['min_quantity'] - $item['quantity']) ?></td>
        </tr>

    <?php endforeach; ?>
</table>

<script>
    const btnImprimir = document.querySelector('#btn-imprimir');

    btnImprimir.addEventListener('click', function(e) {
        e.preventDefault();

        window.print();

    });
</script>