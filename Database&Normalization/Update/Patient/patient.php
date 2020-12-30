<?php
    $pid = $_GET['P_id'];
    $pname = $_GET['P_Name'];
    $pcontact = $_GET['P_Contact'];
    $pcnic = $_GET['P_CNIC'];
    $paddress = $_GET['P_Address'];
    $page = $_GET['P_Age'];

  /* Logic of DB */
  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
    if (!$conn) {
      die("Connection Failed. ");
    } 
    else{
      $queryCheck = " SELECT * FROM patient WHERE P_id = $pid ";
      $myResultCheck = mysqli_query($conn, $queryCheck);
      if ( mysqli_num_rows($myResultCheck) < 1 ) { 
        echo '<q>'.'Record Not Founded'.'</q>'; 
      }
      else{
        $row = mysqli_fetch_assoc(mysqli_query($conn, $queryCheck));
        if(empty($pname)){$pname= $row['P_Name'];}
        if(empty($pcontact)){$pcontact= $row['P_Contact'];}
        if(empty($pcnic)){$pcnic= $row['P_CNIC'];}
        if(empty($paddress)){$paddress= $row['P_Address'];}
        if(empty($page)){$page = $row['P_Age'];}
        $query = "UPDATE `patient` SET `P_Name` = '$pname', `P_Contact` = '$pcontact', `P_CNIC` = '$pcnic', `P_Address` = '$paddress', `P_Age` = '$page' WHERE `patient`.`P_id` = $pid";  
        if (mysqli_query($conn, $query)) {
          echo '<q>'."Record Update Succeed".'</q>';
        } 
        else {
          echo "Error" . $query . "<br>" . mysqli_error($conn);
        }
      }
    } 
  mysqli_close($conn);
?>
