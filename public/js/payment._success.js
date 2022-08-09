let paymentBtn = document.getElementsByClassName('checkout-btn');
let popUp = document.getElementById('pop-up-wrapper');
for (let i = 0; i < paymentBtn.length; i++) {
    paymentBtn[i].addEventListener('click', function() {
        if (popUp.style.display === 'block') {
            popUp.style.display = 'none';
        } else {
            popUp.style.display = 'block';
        }
    });
}

popUp.addEventListener('click', function() {
    popUp.style.display = 'none';
});