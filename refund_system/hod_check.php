<?php

$username = $_POST['username'];
$password = $_POST['password'];

if($username == "hod" && $password == "123"){

    header("Location: hod_dashboard.php");

} else {

    echo "Invalid HOD Login";

}

?>