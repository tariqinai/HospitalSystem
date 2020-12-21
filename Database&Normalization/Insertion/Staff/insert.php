<?php
  $sid = $_POST['s_Id'];
  $sname = $_POST['s_Name'];
  $scontact = $_POST['s_Contact'];
  $scnic = $_POST['s_CNIC'];
  $saddress = $_POST['s_Address'];
  $ssalary = $_POST['s_Salary'];
  $sdesignation = $_POST['s_Designation'];
  $sshift = $_POST['s_Shift'];

  /* Logic of DB */
  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
  if (!$conn) {
    die("Connection Failed. ");
  } 
  else{
    $queryCheck = " SELECT * FROM staff WHERE s_id = $sid ";
    $myResultCheck = mysqli_query($conn, $queryCheck);
    if ( mysqli_num_rows($myResultCheck) > 0 ) { 
      echo '<h1>' . 'Record Already Exist' . '</h1>'; 
    }
    else{
      $query = "INSERT INTO `staff` (`s_id`, `s_Name`, `s_Contact`, `s_CNIC`, `s_Address`, `s_Salary`, `s_Designation`, `s_Shift`) 
      VALUES ('$sid', '$sname', '$scontact', '$scnic', '$saddress', '$ssalary', '$sdesignation', '$sshift')";  
      if (mysqli_query($conn, $query)) {
        echo '<h1>'."Record Insertion Succeed".'</h1>';
      } 
      else {
        echo "Error" . $query . "<br>" . mysqli_error($conn);  
      }
    }
  }
  mysqli_close($conn);
?>
