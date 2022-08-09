/*FOR MOBILE USER DROPDOWN*/
let userColl = document.getElementById('user-collapsible');
userColl.addEventListener("click", function() {
this.classList.toggle("active");
let userDropDown = document.getElementById('mobile-user-dropdown');
    if (userDropDown.style.display === "block") {
        this.classList.remove('top');
        this.classList.add('bottom');
        userDropDown.style.display = "none";
    } else {
        userDropDown.style.display = "block";
        this.classList.remove('bottom');
        this.classList.add('top');
    } 
    
});


/*FOR USER DROPDOWN*/

let user_dropDown = document.getElementsByClassName("user-collapsible");

for (let i = 0; i < user_dropDown.length; i++) {
  user_dropDown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    let content = document.getElementsByClassName('drop-down__menu-box');
    for (let i = 0; i < content.length; i++) {
        if (content[i].style.display === "block") {
            this.classList.remove('top');
            this.classList.add('arrow-down');
            content[i].style.display = "none";
        } else {
          content[i].style.display = "block";
          this.classList.remove('arrow-down');
          this.classList.add('top');
        }
    }  
  });
}
