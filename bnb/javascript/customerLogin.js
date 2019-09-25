function customerLogin() {
    var username="";
    var password="";

    //check if all fields have been filled out and check validity of input
    if (document.getElementById('username').value == "") {		
    	errormessage += "Username. \n";
		document.getElementById('username').style.borderColor = "red";
	} else if(document.getElementById('username').value != "") {
        var usernameValid = "true";
		document.getElementById('username').style.borderColor = "initial";
		}
    if (document.getElementById('password').value == "") {        		
    	errormessage += "Password. \n";
		document.getElementById('password').style.borderColor = "red";
	} else if(document.getElementById('password').value != "") {
        var passwordValid = "true";
		document.getElementById('password').style.borderColor = "initial";
        }


    username = document.getElementById('username').value;
    //run some ajax to check if username is valid in customer DB and return true or false
    

    password = document.getElementById('password').value;		
    //run some ajax to check if password is valid in customer DB and return true or false

    //check if username and password is true to login customer
    if(usernameValid == "true" && passwordValid == "true") {
        alert("You have been successfully logged in.");
        return true;
    } else {
        alert("Your Username or Password is incorrect.")
        return false;
    }
}

function resetForm(){
    alert("resetForm Function");
}

function checkUser() {
    alert("checkUser Function");
}

function checkSession() {
    alert("checkSession Function");
}