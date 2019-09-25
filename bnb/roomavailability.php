<!DOCTYPE HTML>
<html>
<head>
  <title>Search Room Availability</title>
  <meta name="description" content="Ongaonga Bed & Breakfast" />
  <meta name="keywords" content="Bed & Breakfast" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style"/>

  <script> src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!--AJAX--><!--
  <script>
  $(document).ready(function() {
    $("#roomavailability").submit(function() {
      $.getJSON("roomsearch.json", function(data) {
        var room_data = '';
        $.each(data, function(roomID, value) {
          room_data += '<tr>';
          room_data += '<td>' + value.roomID + '</td>';          
          room_data += '<td>' + value.roomname + '</td>';
          room_data += '<td>' + value.roomtype + '</td>';
          room_data += '<td>' + value.beds + '</td>';
          room_data += '</tr>';
          alert(" roomID = "+value.roomID+"\n roomname = "+value.roomname+"\n roomtype = "+value.roomtype+"\n beds = "+value.beds);
        });
        $('#rooms_table').append(room_data);
      });
    });
  });
</script>
<script>
$(document).ready(function() {
  $("#roomavailability").submit(function() { 
      alert("clicked.");
      function searchResult(searchstr) {
        /*
        if (searchstr.length==0) {
          document.getElementById("roomslist").innerHTML="";
          return;
        }*/
        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
          //if (this.readyState==4 && this.status==200) {
            document.getElementById("roomslist").innerHTML=this.responseText;
          //}
        }
        xmlhttp.open("GET","roomssearch.php?sq="+searchstr,true);
        xmlhttp.send();
      }
  });
});
</script>-->
<script>
  function ajax_post(){
    alert("clicked.");
    // Create our XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();

    // Create some variables we need to send to our PHP file
    var url = "roomsearch.php";
    var fromdate = document.getElementById("fromdate").value;
    var enddate = document.getElementById("enddate").value;

    // Access the onreadystatechange event for the XMLHttpRequest object
    xmlhttp.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
			  document.getElementById("roomslist").innerHTML = xmlhttp.responseText;
	    }
    }
    xmlhttp.open("GET", url, true)
    xmlhttp.send(null); // Actually execute the request
    return false;
  }
</script>
</head>
<body>  
    <?php
      date_default_timezone_set('NZ');
      include "checksession.php";
    //checkUser();
    ?>
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
          <li><a href="index.php">Home</a></li>
          <li><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;" href="listrooms.php">Rooms</a></li>
          <li><a href="currentbookings.php">Bookings</a></li>
          <li><a href="registercustomer.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
        <h1><b>Search for Room Availability<b></h1>
        <h2><a href='makebooking.php' style="color: blue;">[Make a Booking]</a>&nbsp;&nbsp;<a href='listrooms.php' style="color: blue;">[Return to Room Listing]</a></h2>      
        <br>
        <div>          
          <form id="roomavailability" name="roomavailability"> <!--method="POST" action="roomsearch.php"-->
            <label>Start Date: </label><input name="fromdate" id="fromdate" class="form-control" placeholder="dd-mm-yyyy" required/>
            <label>End Date: </label><input name="enddate" id="enddate" class="form-control" placeholder="dd-mm-yyyy" required/>
            <br><br>            
            <input type="submit" name="submit" id="submit" value="&nbsp;Search availability&nbsp;" onclick="ajax_post();" /><br><br>            
          </form>
            <div id="roomslist">
              
          </div>
        </div>
        <br>        
      </div> <!--content-->      
    </div> <!--site-content-->
    <div id="footer">
      Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
    </div>
  </div>
</body>
</html>

<script>
  $(document).ready(function(){
    $(function(){
      $("#fromdate").datepicker({dateFormat: 'yy-mm-dd', minDate: 0,});
      $("#enddate").datepicker({dateFormat: 'yy-mm-dd', minDate: 0,});
    });
  });  
</script>



