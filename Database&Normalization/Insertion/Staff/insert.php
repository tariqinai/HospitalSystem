<?php
$sid = $_POST['sid'];
$sname = $_POST['sname'];
$scontact = $_POST['scontact'];
$scnic = $_POST['scnic'];
$saddress = $_POST['saddress'];
$ssalary = $_POST['ssalary'];
$sdesignation = $_POST['sdesignation'];
$sshift = $_POST['sid'];

/* Logic of DB */
$conn = mysqli_connect('localhost', 'root', '', 'hospital');
if (!$conn) {
  die("Connection Failed. " . mysqli_connect_error());
}
$query = "INSERT INTO `staff` (`s_id`, `s_Name`, `s_Contact`, `s_CNIC`, `s_Address`, `s_Salary`, `s_Desigation`, `s_Shift`) 
  VALUES ('$sid', '$sname', '$scontact', '$scnic', '$saddress', '$ssalary', '$sdesignation', '$sshift')";
$myResult = mysqli_query($conn, $query);
if (mysqli_num_rows($myResult) > 0) {
  echo '<h1>' . 'Record Already Exist' . '</h1>';
} 
else {
  if (mysqli_query($conn, $query)) {
    echo "Record Insertion Succeed";
  } else {
    echo "Error" . $query . "<br>" . mysqli_error($conn);
  }
}
mysqli_close($conn);
