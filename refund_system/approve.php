<?php

include 'db.php';

$id = $_GET['id'];

$sql = "UPDATE refund_request 
        SET status='Approved' 
        WHERE id='$id'";

mysqli_query($conn, $sql);

header("Location: hod_dashboard.php");

?>