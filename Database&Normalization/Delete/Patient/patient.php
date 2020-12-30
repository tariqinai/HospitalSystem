<?php
    $pid = $_GET['P_id'];

  /* Logic of DB */
  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
    if (!$conn) {
      die("Connection Failed. ");
    } 
    else{
      if(empty($pid)){
        echo "Please Enter an id to Delete Record...";
      }
      else{
        $queryCheck = " SELECT * FROM patient WHERE P_id = $pid ";
        $myResultCheck = mysqli_query($conn, $queryCheck);
        if ( mysqli_num_rows($myResultCheck) > 0 ) { 
          $query = "DELETE FROM `patient` WHERE `patient`.`P_id` = $pid";  
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