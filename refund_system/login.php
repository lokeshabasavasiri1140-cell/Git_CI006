<?php

include 'db.php';

$usn = $_POST['usn'];
$password = $_POST['password'];
$semester = $_POST['semester'];

$sql = "SELECT * FROM student 
        WHERE usn='$usn' 
        AND password='$password'
        AND semester='$semester'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    
    header("Location: dashboard.php?usn=$usn");

} else {

    echo "Invalid USN or Password";

}

?>