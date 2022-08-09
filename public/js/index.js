
//   first section Buttons for horizontal scroll for index.html file
let button = document.getElementById('slide');
button.onmouseover = function () {
    let container = document.getElementById('container');
    sideScroll(container,'right',25,300,10);
};

let back = document.getElementById('slideBack');
back.onmouseover = function () {
    let container = document.getElementById('container');
    sideScroll(container,'left',25,300,10);
};

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

  // second section Buttons for horizontal scroll for index.html
let button2 = document.getElementById('second-slide');
button2.onmouseover = function () {
    let container2 = document.getElementById('second-container');
    secondSideScroll(container2,'right',25,300,10);
};

let back2 = document.getElementById('second-slideBack');
back2.onmouseover = function () {
    let container2 = document.getElementById('second-container');
    secondSideScroll(container2,'left',25,300,10);
};

function secondSideScroll(element,direction,speed,distance,step){
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

