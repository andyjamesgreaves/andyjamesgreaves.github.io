<?php
  include "config.php"; //load in any variables
  $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

  //check if the connection was good
  if (mysqli_connect_errno()) {
      echo "Error: Unable to connect to MySQL. ".mysqli_connect_error() ;
      exit; //stop processing the page further
  }

  $searchresult = '';

  $sq = $_GET['sq'];

  $fromdate = $_REQUEST['fromdate'];
  $enddate = $_REQUEST['enddate'];

  //prepare a query and send it to the server
  $query = "SELECT roomID, roomname, roomtype, beds FROM  room 
  WHERE roomID NOT IN (SELECT roomID 
  FROM bookings 
  WHERE checkinDate >= '$fromdate'
  AND checkoutDate <= '$enddate')";
  $result = mysqli_query($DBC,$query);
  $rowcount = mysqli_num_rows($result);
  
  //makes sure we have rooms
  if ($rowcount > 0) {  
      $searchresult = '<table border="1"><thead><tr><th>RoomID</th><th>Room name</th><th>Room type></th><th>Beds</th></tr></thead>';
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['roomID'];
        $searchresult .= '<tr><td>'.$row['roomID'].'</td><td>'.$row['roomname'].'</td><td>'.$row['roomtype'].'</td><td>'.$row['beds'].'</td>';
        $searchresult .= '</tr>'.PHP_EOL;

        /*
        $data['roomID']=$row['roomID'];
        $data['roomname']=$row['roomname'];
        $data['roomtype']=$row['roomtype'];
        $data['beds']=$row['beds'];
        
        $id = $row['roomID'];	
        echo '<tr><td>'.$row['roomID'].'</td><td>'.$row['roomname'].'</td><td>'.$row['roomtype'].'</td><td>'.$row['beds'].'</td>';
        echo '</tr>'.PHP_EOL;
        
        $rows[] = $row;
        $searchresult = json_encode($rows);
        header('Content-Type: text/json; charset=utf-8'); 
         
        echo json_encode($data);
        */         
    } 
    $searchresult .= '</table>'; 
  } else echo "<h2>No rooms found!</h2>"; //suitable feedback

  mysqli_free_result($result); //free any memory used by the query
  mysqli_close($DBC); //close the connection once done
  
  echo  $searchresult;
  //echo json_encode($data); //send to ajax
  ?>



  