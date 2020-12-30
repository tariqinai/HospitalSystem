<?php
$tid = $_GET['T_id'];
$pid = $_GET['P_id'];

/* Logic of DB */
if (empty($tid) or empty($pid) ) {
  echo "Warning! Must enter Primary Key(tid) AND (pid) To delete record.";
} else {
  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
  if (!$conn) {
    die("Connection Failed. ");
  } else {
    $queryCheck = "SELECT * FROM `token` WHERE T_id = $tid AND P_id = $pid ";
    $myResultCheck = mysqli_query($conn, $queryCheck);
    if (mysqli_num_rows($myResultCheck) > 0) {
      $query = "DELETE FROM `token` WHERE `token`.`T_id` = $tid AND `token`.`P_id` = $pid ";
      if (mysqli_query($conn, $query)) {
        echo '<q>' . "Record Deletion Succeed" . '</q>';
      } 
      else 
      {
        echo "Error" . $query . "<br>" . mysqli_error($conn);
      }
    } 
    else {
      echo '<q>' . 'Record Not Found.' . '</q>';
    }
  }
  mysqli_close($conn);
}
