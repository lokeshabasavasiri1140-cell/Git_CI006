<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    header("Location: admin_dashboard.php");
} else {
    echo "Invalid Username or Password";
}

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

<h2>Admin Login</h2>

<form method="POST">

<label>Username:</label>
<input type="text" name="username" required><br><br>

<label>Password:</label>
<input type="password" name="password" required><br><br>

<button type="submit">Login</button>

</form>

</body>
</html>