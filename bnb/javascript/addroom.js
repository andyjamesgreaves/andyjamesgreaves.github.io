function addroom() {
	var errormessage = "";

	//check if all fields have been filled out and check validity of input
    if (document.getElementById('roomname').value == "") {		
    	errormessage += "Roomname. \n";
		document.getElementById('roomname').style.borderColor = "red";
	} else if(document.getElementById('roomname').value != "") {
		document.getElementById('roomname').style.borderColor = "initial";
		}
	if (document.getElementById('description').value == "") {		
		errormessage += "Description. \n";
		document.getElementById('description').style.borderColor = "red";
	} else if(document.getElementById('description').value != "") {
		document.getElementById('description').style.borderColor = "initial";
		}
    
	//display error message (if any)
	if (errormessage != ""){		
		alert("Please complete the following fields: \n" + errormessage);
		return false;
	}
	//get field input values
	else {
		var roomname = "";
		var description = "";
		var roomtype = "";
		var beds = "";
		
		roomname = document.getElementById('roomname').value;
		description = document.getElementById('description').value;
		roomtype = document.getElementById('roomtype').value;
		beds = document.getElementById('beds').value;
		
		//run some ajax if conditions are met
		
		alert("The room has been added.");
		return true;
	}
}

function resetForm() {
	document.getElementById("addroom").reset();
}
