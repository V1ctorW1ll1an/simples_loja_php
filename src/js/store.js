(() => {
    const valor_parcial = document.getElementById("valor_parcial");
    const valor_desconto = document.getElementById("valor_desconto");
    const valor_acrescimo = document.getElementById("valor_acrescimo");
    const valor_total = document.getElementById("valor_total");

    const removeCurrencyFormat = (currency) => {
        return parseFloat(currency.replace("R$ ", "").replace(",", "."));
    };

    const calcTotalValue = (e) => {
        const valor_parcial_value = removeCurrencyFormat(valor_parcial.value)
            ? removeCurrencyFormat(valor_parcial.value)
            : 0;
        const valor_desconto_value = removeCurrencyFormat(valor_desconto.value)
            ? removeCurrencyFormat(valor_desconto.value)
            : 0;
        const valor_acrescimo_value = removeCurrencyFormat(
            valor_acrescimo.value
        )
            ? removeCurrencyFormat(valor_acrescimo.value)
            : 0;
        valor_total.value = `R$ ${
            valor_parcial_value - valor_desconto_value + valor_acrescimo_value
        }`;
    };

    document
        .getElementById("cliente")
        .addEventListener("change", calcTotalValue);

    [valor_parcial, valor_desconto, valor_acrescimo].map((ipt) => {
        ipt.addEventListener("input", calcTotalValue);
        IMask(ipt, {
            mask: "R$ num",
            blocks: {
                num: {
                    mask: Number,
                    thousandsSeparator: " ",
                    min: 0,
                    max: 99999999,
                },
            },
        });
    });
})();
