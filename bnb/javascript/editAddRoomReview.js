function editAddRoomReview() {
    if (document.getElementById('roomreview').value == "") {
        document.getElementById('roomreview').style.borderColor = "red";
        alert("The room review has no comments.");
        return false;
    } else {
        alert("Your room review has been updated.");
        //go to updateroomreview.php to UPDATE bookings DB roomreview
        return true;
    }
}

function resetForm(){
    document.getElementById("editaddreview").reset();
}
