<?php
include ('session.php');
if ($login_session != "admin"){ 
  header('Location: registercustomer.php');
}
?>

<!DOCTYPE HTML>
<html><head>
<title>List Customer</title>
<meta name="description" content="Ongaonga Bed & Breakfast" />
<meta name="keywords" content="Bed & Breakfast" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
<script>
function searchResult(searchstr) {
  if (searchstr.length==0) {

    return;
  }
  xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    //take JSON text from the server and convert it to JavaScript objects
    //mbrs will become a two dimensional array of our customers much like 
    //a PHP associative array
      var mbrs = JSON.parse(this.responseText);              
      var tbl = document.getElementById("tblcustomers"); //find the table in the HTML
      
      //clear any existing rows from any previous searches
      //if this is not cleared rows will just keep being added
      var rowCount = tbl.rows.length;
      for (var i = 1; i < rowCount; i++) {
         //delete from the top - row 0 is the table header we keep
         tbl.deleteRow(1); 
      }      
      
      //populate the table
      //mbrs.length is the size of our array
      for (var i = 0; i < mbrs.length; i++) {
         var mbrid = mbrs[i]['customerID'];
         var fn    = mbrs[i]['firstname'];
         var ln    = mbrs[i]['lastname'];
      
         //concatenate our actions urls into a single string
         var urls  = '<a href="viewcustomer.php?id='+mbrid+'">[view]&nbsp;</a>';
             urls += '<a href="editcustomer.php?id='+mbrid+'">[edit]&nbsp;</a>';
             urls += '<a href="deletecustomer.php?id='+mbrid+'">[delete]</a>';
         
         //create a table row with three cells  
         tr = tbl.insertRow(-1);
         var tabCell = tr.insertCell(-1);
             tabCell.innerHTML = fn; //firstname
         var tabCell = tr.insertCell(-1);
             tabCell.innerHTML = ln; //lastname      
         var tabCell = tr.insertCell(-1);
             tabCell.innerHTML = urls; //action URLS            
        }
    }
  }
  //call our php file that will look for a customer or customers matchign the seachstring
  xmlhttp.open("GET","customersearch.php?sq="+searchstr,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><span class="logo_colour">Ongaonga Bed & Breakfast</span></a></h1>
          <h2>Make yourself at home is our slogan. We offer some of the best beds on the east coast. Sleep well and rest well.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li class="selected"><a href="index.php">Home</a></li>
          <li><a href="listrooms.php">Rooms</a></li>
          <li><a href="currentbookings.php">Bookings</a></li>
          <li><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;" href="registercustomer.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
      <div id="site_content">
        <div class="sidebar">
        <h3>Existing Customers</h3>
          <a href="viewcustomer.php">Customer Details View</a><br><br>
          <a href="editcustomer.php">Customer Details Update</a><br><br>
          <a href="deletecustomer.php">Customer Details Delete</a><br><br>
        </div>
        <div id="content">
              <h1>Customer List Search by Lastname</h1>
              <h2><a style="color: blue;" href='registercustomer.php'>[Create new Customer]</a>&nbsp;&nbsp;<a style="color: blue;" href="/bnb/">[Return to main page]</a>
              </h2>
              <form>
                <label for="lastname">Lastname: </label>
                <input id="lastname" type="text" size="30" 
                      onkeyup="searchResult(this.value)" 
                      onclick="javascript: this.value = ''" 
                      placeholder="Start typing a last name">    
              </form><br><br>
              <table id="tblcustomers" border="1">
              <thead><tr><th>First name</th><th>Last name </th><th>Actions</th></tr></thead>
              </table>
        </div>        
      </div>
      <div id="footer">
          Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
      </div>
  </div>  
</body>
</html>
  