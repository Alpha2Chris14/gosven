let slideBack = document.getElementsByClassName('slideBack');
for (let i = 0; i < slideBack.length; i++) {
    slideBack[i].onmouseover = function() {
        let container = document.getElementsByClassName('product-category-container');
        for (let j = 0; j < container.length; j++) {
            sideScroll(container[i], 'left', 25, 300, 10);
        }
    }
}

let slideForward = document.getElementsByClassName('slideForward');
for (let i = 0; i < slideForward.length; i++) {
    slideForward[i].onmouseover = function() {
        let container = document.getElementsByClassName('product-category-container');
        for (let j = 0; j < container.length; j++) {
            sideScroll(container[i], 'right', 25, 300, 10);
        }
    }
}

function sideScroll(element,direction,speed,distance,step){
    scrollAmount = 0;
    let slideTimer = setInterval(function(){
        if(direction == 'left'){
            element.scrollLeft -= step;
        } else {
            element.scrollLeft += step;
        }
        scrollAmount += step;
        if(scrollAmount >= distance){
            window.clearInterval(slideTimer);
        }
    }, speed);
}
