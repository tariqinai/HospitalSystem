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
  } /else {
    echo "Error" . $query . "<br>" . mysqli_error($conn);
  
}
mysqli_close($conn);

?>