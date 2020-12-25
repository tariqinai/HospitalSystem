<?php
  if(isset($_GET['s_Id'])){
    $sid = $_GET['s_Id'];
  }
  if(isset($_GET['s_Name'])){
    $sname = $_GET['s_Name'];
  }
  if(isset($_GET['s_Contact'])){
    $scontact = $_GET['s_Contact'];
  }
  if(isset($_GET['s_CNIC'])){
    $scnic = $_GET['s_CNIC'];
  }
  if(isset($_GET['s_Address'])){
    $saddress = $_GET['s_Address'];
  }
  if(isset($_GET['s_Salary'])){
    $ssalary = $_GET['s_Salary'];
  }
  if(isset($_GET['s_Designation'])){
    $sdesignation = $_GET['s_Designation'];
  }
  if(isset($_GET['s_Shift'])){
    $sshift = $_GET['s_Shift'];
  }

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
        $query = "INSERT INTO `staff` (`s_id`, `s_Name`, `s_Contact`, `s_CNIC`, `s_Address`, `s_Salary`, `s_Designation`, `s_Shift`) VALUES ('$sid', '$sname', '$scontact', '$scnic', '$saddress', '$ssalary', '$sdesignation', '$sshift')";  
        if (mysqli_query($conn, $query)) {
          echo '<q>'."Record Insertion Succeed".'</q>';
        } 
        else {
          echo "Error" . $query . "<br>" . mysqli_error($conn);
        }
      }
    }
    
  }
  mysqli_close($conn);
?>
