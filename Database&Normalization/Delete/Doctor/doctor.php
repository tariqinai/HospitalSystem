<?php
$did = $_GET['D_id'];

/* Logic of DB */
if (empty($did)) {
  echo "Warning! Must enter Primary Key(did) To delete record.";
} else {
  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
  if (!$conn) {
    die("Connection Failed. ");
  } else {
    $queryCheck = "SELECT * FROM `doctor` WHERE D_id = $did ";
    $myResultCheck = mysqli_query($conn, $queryCheck);
    if (mysqli_num_rows($myResultCheck) > 0) {
      $query = "DELETE FROM `doctor` WHERE `doctor`.`D_id` = $did ";
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
