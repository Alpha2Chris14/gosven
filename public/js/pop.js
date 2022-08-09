let checkOutButton = document.getElementsByClassName('cart-checkout');
let popUp = document.getElementById('pop-up-wrapper');
for (let i = 0; i < checkOutButton.length; i++) {
    checkOutButton[i].addEventListener('click', function() {
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