<?php
    $did = $_GET['D_id'];
    $dspecialization = $_GET['D_Specialization'];
    $sid = $_GET['s_id'];
    

/* Logic of DB */
if (empty($did) or empty($sid) ) {
  echo "Warning! Must enter Primary Key(did) And Foreign Key(sid).";
} else {

  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
  $sql = "SELECT max(s_id) AS max FROM `staff` ";
  $result = mysqli_query($conn , $sql);
  $row = mysqli_fetch_array($result);
  $largest = $row['max'];

  $sql1 = "SELECT * FROM `doctor` WHERE D_id = $did ";
  $result1 = mysqli_query($conn , $sql1);
  $row = mysqli_fetch_assoc($result1);
  if(empty($dspecialization)){$dspecialization = $row['D_Specialization'];}
  if (!$conn){
    die("Connection Failed. ");
  } 
  else {
    $queryCheck = "SELECT * FROM `doctor` WHERE D_id = $did ";
    $myResultCheck = mysqli_query($conn, $queryCheck);
    if (mysqli_num_rows($myResultCheck) < 1) {
      echo '<q>' . 'Record Not Found.' . '</q>';
    } 
    else {
      if( $sid <= $largest ){
        $query = "UPDATE `doctor` SET `D_Specialization` = '$dspecialization', `s_id` = '$sid' WHERE `doctor`.`D_id` = $did";
        if (mysqli_query($conn, $query)) {
          echo '<q>' . "Record Updatation Succeed" . '</q>';
        } 
        else {
          echo "Error" . $query . "<br>" . mysqli_error($conn);
        }
      }
      else{
        echo "Sorry! s_id max limit is from 0 to ". $largest ;
      }
    }
  }
  mysqli_close($conn);
}
?>