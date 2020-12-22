<?php
  $sid = $_GET['s_Id'];
  $sname = $_GET['s_Name'];
  $scontact = $_GET['s_Contact'];
  $scnic = $_GET['s_CNIC'];
  $saddress = $_GET['s_Address'];
  $ssalary = $_GET['s_Salary'];
  $sdesignation = $_GET['s_Designation'];
  $sshift = $_GET['s_Shift'];

  /* Logic of DB */
  if(empty($sid) And empty($sname) And empty($scontact) And empty($scnic) And empty($saddress) And empty($ssalary) And empty($sdesignation) And empty($sshift) ){
    echo '<q>'."Please Enter Some Record ...".'</q>';
  }
  else{
  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
    if (!$conn) {
      die("Connection Failed. ");
    } 
    else{
      $queryCheck = " SELECT * FROM staff WHERE s_id = $sid ";
      $myResultCheck = mysqli_query($conn, $queryCheck);
      if ( mysqli_num_rows($myResultCheck) > 0 ) { 
        echo '<q>'.'Record Already Exist'.'</q>'; 
      }
      else{
        $query = "INSERT INTO `staff` (`s_id`, `s_Name`, `s_Contact`, `s_CNIC`, `s_Address`, `s_Salary`, `s_Designation`, `s_Shift`) 
        VALUES ('$sid', '$sname', '$scontact', '$scnic', '$saddress', '$ssalary', '$sdesignation', '$sshift')";  
        if (mysqli_query($conn, $query)) {
          echo '<q>'."Record Insertion Succeed".'</q>';
        } 
        else {
          echo "Error" . $query . "<br>" . mysqli_error($conn);
        }
      }
    }
    mysqli_close($conn);
  }
  
?>
