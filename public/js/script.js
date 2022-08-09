const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".mobile-nav-container");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav-link");

navLink.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}


/*FOR SHOP NOW DROPDOWN*/
let coll = document.getElementById('shop-collapsible');
coll.addEventListener("click", function() {
this.classList.toggle("active");
let shopDropDown = document.getElementById('mobile-shop-dropdown');
    if (shopDropDown.style.display === "block") {
        this.classList.remove('top');
        this.classList.add('bottom');
        shopDropDown.style.display = "none";
    } else {
        shopDropDown.style.display = "block";
        this.classList.remove('bottom');
        this.classList.add('top');
    } 
    
});



/*FOR CART VALUE*/
let cartValue = document.getElementsByClassName('cart-value');
for (let i = 0; i < cartValue.length; i++) {
    if(cartValue[i].innerHTML === "") {
        cartValue[i].style.display = 'none';
    }
}
