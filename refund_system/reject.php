<?php
include 'db.php';

$id = $_GET['id'];

$sql = "UPDATE refund_request SET status='Rejected' WHERE id=$id";

if(mysqli_query($conn, $sql)){
    header("Location: admin_dashboard.php");
} else {
    echo "Error";
}
?>