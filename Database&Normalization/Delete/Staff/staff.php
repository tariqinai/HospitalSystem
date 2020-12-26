<?php
    $sid = $_GET['s_Id'];

  /* Logic of DB */
  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
    if (!$conn) {
      die("Connection Failed. ");
    } 
    else{
      if(empty($sid)){
        echo "Please Enter an id to Delete Record...";
      }
      else{
        $queryCheck = " SELECT * FROM staff WHERE s_id = $sid ";
        $myResultCheck = mysqli_query($conn, $queryCheck);
        if ( mysqli_num_rows($myResultCheck) > 0 ) { 
          $query = "DELETE FROM `staff` WHERE `staff`.`s_id` = $sid";  
          if (mysqli_query($conn, $query)) {
            echo '<q>'."Record Delete Succeed".'</q>';
          } 
          else {
            echo "Error" . $query . "<br>" . mysqli_error($conn);
          }
        }
        else{
          echo '<q>'.'Record Not Founded'.'</q>'; 
        }
      } 
    }
  mysqli_close($conn);
?>