<?php
    $tid = $_GET['T_id'];
    $pid = $_GET['P_id'];
    $tdatetime = $_GET['T_DateTime'];
    

/* Logic of DB */
if (empty($tid) or empty($pid) ) {
  echo "Warning! Must enter Primary Key(tid) And (pid).";
} 
else {
  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
  $sql = "SELECT max(P_id) AS max FROM `patient` ";
  $result = mysqli_query($conn , $sql);
  $row = mysqli_fetch_array($result);
  $largest = $row['max'];

  if (!$conn) {
    die("Connection Failed. ");
  } 
  else {
    $queryCheck = "SELECT * FROM `token` WHERE T_id = $tid and P_id = $pid ";
    $myResultCheck = mysqli_query($conn, $queryCheck);
    if (mysqli_num_rows($myResultCheck) > 0) {
      echo '<q>' . 'Record Already Exist' . '</q>';
    } 
    else {
      if( $pid <= $largest ){
        $query = "INSERT INTO `token` (`T_id`, `P_id`, `T_DateTime`) VALUES ('$tid', '$pid', '$tdatetime')";
        if (mysqli_query($conn, $query)) {
          echo '<q>' . "Record Insertion Succeed" . '</q>';
        } 
        else {
          echo "Error" . $query . "<br>" . mysqli_error($conn);
        }
      }
      else{
        echo "Sorry! p_id max limit is from 0 to ". $largest ;
      }
    }
  }
  mysqli_close($conn);
}
?>