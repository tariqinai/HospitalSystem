<?php
 $conn = mysqli_connect('localhost', 'root', '', 'carecenter'); 
 $queryCheck = "SELECT * FROM staff"; 
 $myResultCheck = mysqli_query($conn, $queryCheck); 
 echo mysqli_num_rows($myResultCheck) ;
?>