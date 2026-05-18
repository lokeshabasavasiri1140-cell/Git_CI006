<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
</head>
<body>

<h2>Student Refund System Login</h2>

<form action="login.php" method="POST">

    <label>USN:</label><br>
    <input type="text" name="usn" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <br><br>

<label>Semester:</label><br>

<select name="semester">

<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>

</select>
    <button type="submit">Login</button>

</form>

</body>
</html>