let radio_250 = document.querySelector('#radio_price_250'),
    radio_250_500 = document.querySelector('#radio_price_250-500'),
    radio_500_750 = document.querySelector('#radio_price_500-750'),
    radio_750_1000 = document.querySelector('#radio_price_750-1000'),
    radio_1000 = document.querySelector('#radio_price_1000'),
    input_price1 = document.querySelector('.price_input1'),
    input_price2 = document.querySelector('.price_input2');


function price(){
    radio_250.addEventListener('change', (e) => {
        input_price1.value = 0;
        input_price2.value = 250;
    })

    radio_250_500.addEventListener('change', (e) => {
        input_price1.value = 250;
        input_price2.value = 500;
    })

    radio_500_750.addEventListener('change', (e) => {
        input_price1.value = 500;
        input_price2.value = 750;
    })

    radio_750_1000.addEventListener('change', (e) => {
        input_price1.value = 750;
        input_price2.value = 1000;
    })

    radio_1000.addEventListener('change', (e) => {
        input_price1.value = 1000;
        input_price2.value = 0;
    })

}




price();
