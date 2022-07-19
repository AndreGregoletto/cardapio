const Mask = require('vanilla-masker');

try{
  Mask(document.getElementById('price')).maskMoney({
    // Decimal precision -> "90"
    precision: 2,
    // Decimal separator -> ",90"
    separator: ',',
    // Number delimiter -> "12.345.678"
    delimiter: '.',
    // Money unit -> "R$ 12.345.678,90"
    unit: 'R$',
    // Money unit -> "12.345.678,90 R$"
    suffixUnit: '',
    // Force type only number instead decimal,
    // masking decimals with ",00"
    // Zero cents -> "R$ 1.234.567.890,00"
    zeroCents: true
    })

}catch(e) {

}

try {
  Mask(document.getElementById('zipcode')).maskPattern('99999-999')
}catch(e) {

}
