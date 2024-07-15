$(function () {
    $('input[name=preco], input[name=quantidade], input[name=quantidade_minima]').mask('#.##0,00', { reverse: true });
    $('input[name=cod]').mask('#');

    $('#cnpj').mask('00.000.000/0000-00', { reverse: true });
    $('#celular').mask('(00) 00000-0000');
    $('#telefone').mask('(00) 0000-0000');
    $('#cpf').mask('000.000.000-00', {reverse:true})
    $('#rg').mask('00.000.000-A', {
        translation: {
            'A': { pattern: /[0-9a-zA-Z]/, optional: true }
        }});
});