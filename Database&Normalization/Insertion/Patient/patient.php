<?php
    $pid = $_GET['P_id'];
    $pname = $_GET['P_Name'];
    $pcontact = $_GET['P_Contact'];
    $pcnic = $_GET['P_CNIC'];
    $paddress = $_GET['P_Address'];
    $page = $_GET['P_Age'];

/* Logic of DB */
if (empty($pname)) {
  $pname = NULL;
}
if (empty($pcontact)) {
  $pcontact = NULL;
}
if (empty($pcnic)) {
  $pcnic = NULL;
}
if (empty($paddress)) {
  $paddress = NULL;
}
if (empty($page)) {
  $page = NULL;
}
if (empty($pid)) {
  echo "Warning! Must enter Primary Key.";
} else {

  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
  if (!$conn) {
    die("Connection Failed. ");
  } else {
    $queryCheck = " SELECT * FROM patient WHERE P_id = $pid ";
    $myResultCheck = mysqli_query($conn, $queryCheck);
    if (mysqli_num_rows($myResultCheck) > 0) {
      echo '<q>' . 'Record Already Exist' . '</q>';
    } else {
      $query = "INSERT INTO `patient` (`P_id`, `P_Name`, `P_Contact`, `P_CNIC`, `P_Address`, `P_Age` ) VALUES ('$pid', '$pname', '$pcontact', '$pcnic', '$paddress', '$page' )";
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