function checkBookingForm() {

    var errormessage = "";
	//check if all fields have been filled out and check validity of input
    if (document.getElementById('checkinDate').value == "") {		
    	errormessage += "Checkin Date. \n";
		document.getElementById('checkinDate').style.borderColor = "red";
	} else if(document.getElementById('checkinDate').value != "") {
        document.getElementById('checkinDate').style.borderColor = "initial";
        }
    if (document.getElementById('checkoutDate').value == "") {		
        errormessage += "Checkout Date. \n";
        document.getElementById('checkoutDate').style.borderColor = "red";
    } else if(document.getElementById('checkoutDate').value != "") {
        document.getElementById('checkoutDate').style.borderColor = "initial";
        }
    	
	//validate phone number	
    if (document.getElementById('contactNumber').value == "") {		
    	errormessage += "Phone number. \n";
		document.getElementById('contactNumber').style.borderColor = "red";
	} else if(document.getElementById('contactNumber').value != "") {
		if (isNaN(document.getElementById('contactNumber').value)) {
			document.getElementById('contactNumber').style.borderColor = "red";
			alert("Invalid phone number.");
            errormessage += "Phone number. \n";
            return false;
        }
        
		if (document.getElementById('contactNumber').value.length < 10 || document.getElementById('contactNumber').value.length > 11) {
			document.getElementById('contactNumber').style.borderColor = "red";
			alert("Invalid phone number length - must be 10 digits.");
            errormessage += "Phone number length invalid - must be 10 digits. \n";
            return false;
		}
		else {
            document.getElementById('contactNumber').style.borderColor = "initial";
        }        		
    }    
	
	//get field input values
	if (errormessage != "") {
        alert("Please fill in the following...\n" + errormessage);
        return false;
    }
    if (errormessage == "") {
        alert("Thankou, your booking details have been submitted.");		
    }
    var room;
    var checkinDate;
    var checkoutDate;
    var contactNumber;
    var bookingExtra;
    
    room = document.getElementById('room').value;
    checkinDate = document.getElementById('checkinDate').value;
    checkoutDate = document.getElementById('checkoutDate').value;
    contactNumber = document.getElementById('contactNumber').value;
    bookingExtra = document.getElementById('bookingExtras').value;

    alert(room + "\n" + checkinDate + "\n" + checkoutDate + "\n" + contactNumber);
    alert("extras: " + bookingExtra);
}

function resetForm(){
    //alert("Delete?");
    document.getElementById("bookingform").reset();
}
