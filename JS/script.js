let campoParcelamento = document.getElementById('campoParcelamento');
let valorTotal = document.getElementById('total-venda');
let valorTotalValue = valorTotal.value;

function gerarParcelamento(){
    let input = document.getElementById('quantidade-parcelas');
    let inputValue = input.value;
    let parcelas = document.getElementsByClassName('parcelas');

    // CALCULO PARA DIVIDIR VALOR NOS INPUTS;
    let valorParcelasDividia = valorTotalValue / inputValue;

    while(parcelas.length > 0){
        parcelas[0].remove();
    }

    for(let i = 0; i < inputValue; i++){
        createInput(valorParcelasDividia,i);
    }
}


function createInput(valorPD,i){
        let br = document.createElement('br');
        let inputDate = document.createElement('input');
        let inputValor = document.createElement('input');
        let inputObservacao = document.createElement('input');


        // INPUT DATE
        let typeDate = 'date';
        let className = 'parcelas';
        let classNameDate = 'parcelas input-field col s3';
        let classNameValor = 'parcelas input-field col s3';
        let classNameObs = 'parcelas input-field col s5';
        let nameDate = "parcelaDate"+i;

        inputDate.setAttribute('type', typeDate);
        inputDate.setAttribute('class', classNameDate);
        inputDate.setAttribute('name', nameDate);

        // INPUT VALOR
        let typeValue = 'number';
        let nameValue = "parcela"+i;
        let value = valorPD;

        inputValor.setAttribute('type', typeValue);
        inputValor.setAttribute('class', classNameValor);
        inputValor.setAttribute('name', nameValue);
        inputValor.setAttribute('value', value);

        // INPUT OBSERVAÇÃO
        let typeObs = 'number';
        let nameObs = "parcelaObs"+i;
        let placeholderObs = 'Observação';

        inputObservacao.setAttribute('type', typeObs);
        inputObservacao.setAttribute('class', classNameObs);
        inputObservacao.setAttribute('name', nameObs);
        inputObservacao.setAttribute('placeholder', placeholderObs);

        // BR
        
        br.setAttribute('class', className);

        campoParcelamento.appendChild(inputDate);
        campoParcelamento.appendChild(inputValor);
        campoParcelamento.appendChild(inputObservacao);
        campoParcelamento.appendChild(br);
}

// INICIANDO O MATERIALIZE

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var options;
    var instances = M.FormSelect.init(elems, options);
});


let produtoCampo = document.getElementById('produto');

produtoCampo.addEventListener('click', teste);

function teste(){
    console.log('teste');
}