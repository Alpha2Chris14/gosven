var firstname = document.getElementById("firstName").value;
var lastname = document.getElementById("lasttName").value;
var email = document.getElementById('email').value;

const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

if(firstname == null || firstname == ""){
    document.getElementById('firstName_error').innerText = "firstname is required";
}

if(lasttname == null || lastname == ""){
    document.getElementById('lastname_error').innerText = "firstname is required";
}

if(email == "" | email == null){
    document.getElementById('email_error').innerText = "Email Is Required";
}
else if(!re.test(String(email).toLowerCase())){
    document.getElementById('email_error').innerText = "Invalid Format Check Email";
}