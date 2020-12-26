<?php
  $conn = mysqli_connect('localhost', 'root', '', 'carecenter');
  $queryCheck = " INSERT INTO `doctor` (`D_id`, `D_Specialization`, `s_id`) VALUES ('1', 'Heart Surgen', '04')";
  $myResultCheck = mysqli_query($conn, $queryCheck);
  
  $query = "SELECT * FROM doctor WHERE D_id=1 ";
  $myResultCheck1 = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($myResultCheck1);
  echo $row['D_id'].'<br>';
  echo $row['D_Specialization'].'<br>';
  echo $row['s_id'].'<br>';
  mysqli_close($conn);
?>