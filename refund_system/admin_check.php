<?php

$username = $_POST['username'];
$password = $_POST['password'];

if($username == "admin" && $password == "123"){

    header("Location: admin_dashboard.php");

} else {

    echo "Invalid Admin Login";

}

?>