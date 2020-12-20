<?php
$conn = mysqli_connect('localhost', 'root', '', 'hospital');
if (!$conn) {
  die("Connection Failed. " . mysqli_connect_error());
} 
else {
  $query = "SELECT * from staff";
  $myResult = mysqli_query($conn, $query); 
    if (mysqli_query($conn, $query)) {
      while( $myData =  mysqli_fetch_assoc($myResult)){
        echo $myData['s_id'];
        echo $myData['s_CNIC'];
        echo $myData['s_Address'];
      }
    } else {
      echo "Error" . $query . "<br>" . mysqli_error($conn);
    }
    echo mysqli_num_rows($myResult);
}
mysqli_close($conn);
