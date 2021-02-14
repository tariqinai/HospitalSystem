<?php
    $oid = $_GET['O_id'];
    $rconsent = $_GET['R_Consent'];
    $rname = $_GET['R_Name'];
    $raddress = $_GET['R_Address'];
    $rcnic = $_GET['R_CNIC'];
    $rcontact = $_GET['R_Contact'];
    $pid = $_GET['P_id'];
    

/* Logic of DB */
if (empty($oid) or empty($pid) ) {
  echo "Warning! Must enter Primary Key(oid) And Foreign Key(pid).";
} else {

  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
  $sql = "SELECT max(p_id) AS max FROM `patient` ";
  $result = mysqli_query($conn , $sql);
  $row = mysqli_fetch_array($result);
  $largest = $row['max'];

  $sql1 = "SELECT * FROM `operation` WHERE O_id = $oid ";
  $result1 = mysqli_query($conn , $sql1);
  $row = mysqli_fetch_assoc($result1);
  if(empty($rname)){$rname = $row['R_Name'];}
  if(empty($rconsent)){$rconsent = $row['R_Consent'];}
  if(empty($raddress)){$raddress = $row['R_Address'];}
  if(empty($rcnic)){$rcnic = $row['R_CNIC'];}
  if(empty($rcontact)){$rcontact = $row['R_Contact'];}
  if (!$conn){
    die("Connection Failed. ");
  } 
  else {
    $queryCheck = "SELECT * FROM `operation` WHERE O_id = $oid ";
    $myResultCheck = mysqli_query($conn, $queryCheck);
    if (mysqli_num_rows($myResultCheck) < 1) {
      echo '<q>' . 'Record Not Found.' . '</q>';
    } 
    else {
      if( $pid <= $largest ){
        $query = "UPDATE `operation` SET `R_Consent` = '$rconsent', `R_Name` = '$rname', `R_Address` = '$raddress', `R_CNIc` = '$rcnic', `R_Contact` = '$rcontact',`p_id` = '$pid' WHERE `operation`.`O_id` = $oid";
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