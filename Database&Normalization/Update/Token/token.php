<?php
    $tid = $_GET['T_id'];
    $pid = $_GET['P_id'];
    $tdatetime = $_GET['T_DateTime'];
    

/* Logic of DB */
if (empty($tid) or empty($pid) ) {
  echo "Warning! Must enter Primary Key(tid) And (pid).";
} else {

  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
  $sql = "SELECT max(P_id) AS max FROM `patient` ";
  $result = mysqli_query($conn , $sql);
  $row = mysqli_fetch_array($result);
  $largest = $row['max'];

  $sql1 = "SELECT * FROM `token` WHERE T_id = $tid AND P_id = $pid " ;
  $result1 = mysqli_query($conn , $sql1);
  $row = mysqli_fetch_assoc($result1);
  if(empty($tdatetime)){$tdatetime = $row['T_DateTime'];}
  if (!$conn){
    die("Connection Failed. ");
  } 
  else {
    $queryCheck = "SELECT * FROM `token` WHERE T_id = $tid and P_id = $pid ";
    $myResultCheck = mysqli_query($conn, $queryCheck);
    if (mysqli_num_rows($myResultCheck) < 1) {
      echo '<q>' . 'Record Not Found.' . '</q>';
    } 
    else {
      if( $pid <= $largest ){
        $query = "UPDATE `token` SET `T_DateTime` = '$tdatetime' WHERE `Token`.`T_id` = $tid AND `Token`.`P_id` = $pid ";
        if (mysqli_query($conn, $query)) {
          echo '<q>' . "Record Updatation Succeed" . '</q>';
        } 
        else {
          echo "Error" . $query . "<br>" . mysqli_error($conn);
        }
      }
      else{
        echo "Sorry! p_id max limit is from 0 to ". $largest ;
      }
    }
  }
  mysqli_close($conn);
}
?>