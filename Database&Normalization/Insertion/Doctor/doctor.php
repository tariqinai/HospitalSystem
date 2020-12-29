<?php
    $did = $_GET['D_id'];
    $dspecialization = $_GET['D_Specialization'];
    $sid = $_GET['s_id'];
    

/* Logic of DB */
if (empty($dspecialization)) {
  $dspecialization = NULL;
}
if (empty($did) or empty($sid) ) {
  echo "Warning! Must enter Primary Key(did) And Foreign Key(sid).";
} else {

  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
  if (!$conn) {
    die("Connection Failed. ");
  } else {
    $queryCheck = "SELECT * FROM `doctor` WHERE D_id = $did ";
    $myResultCheck = mysqli_query($conn, $queryCheck);
    if (mysqli_num_rows($myResultCheck) > 0) {
      echo '<q>' . 'Record Already Exist' . '</q>';
    } 
    else {
      $query = "INSERT INTO `doctor` (`D_id`, `D_Specialization`, `s_id`) VALUES ('$did', '$dspecialization', '$sid')";
      if (mysqli_query($conn, $query)) {
        echo '<q>' . "Record Insertion Succeed" . '</q>';
      } else {
        echo "Error" . $query . "<br>" . mysqli_error($conn);
      }
    }
  }
  mysqli_close($conn);
}
?>