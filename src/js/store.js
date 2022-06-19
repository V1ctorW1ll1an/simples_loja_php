(() => {
    const valor_parcial = document.getElementById("valor_parcial");
    const valor_desconto = document.getElementById("valor_desconto");
    const valor_acrescimo = document.getElementById("valor_acrescimo");
    const valor_total = document.getElementById("valor_total");

    const calcTotalValue = (e) => {
        const valor_parcial_value = valor_parcial.value
            ? parseFloat(valor_parcial.value)
            : 0;
        const valor_desconto_value = valor_desconto.value
            ? parseFloat(valor_desconto.value)
            : 0;
        const valor_acrescimo_value = valor_acrescimo.value
            ? parseFloat(valor_acrescimo.value)
            : 0;
        valor_total.value =
            valor_parcial_value - valor_desconto_value + valor_acrescimo_value;
    };

    [valor_parcial, valor_desconto, valor_acrescimo].map((ipt) =>
        ipt.addEventListener("input", calcTotalValue)
    );
})();
