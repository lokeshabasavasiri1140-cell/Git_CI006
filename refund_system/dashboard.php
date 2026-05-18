<?php
$usn = $_GET['usn'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>

<h2>Welcome <?php echo $usn; ?></h2>

<a href="index.php">Logout</a>

<h3>Refund Request Form</h3>

<form action="submit_form.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="usn" value="<?php echo $usn; ?>">

<label>Participants (Name, USN, Sem):</label><br>
<textarea name="participants" required></textarea>

<br><br>

<label>Subject/Event:</label><br>
<input type="text" name="subject_name" required>

<br><br>

<label>Date:</label><br>
<input type="date" name="from_date" required>

<br><br>

<label>Amount:</label><br>
<input type="number" name="amount" required>

<br><br>

<label>Account Holder Name:</label><br>
<input type="text" name="account_holder_name" required>

<br><br>

<label>Account Number:</label><br>
<input type="text" name="account_number" required>

<br><br>

<label>IFSC Code:</label><br>
<input type="text" name="ifsc_code" required>

<br><br>

<label>Bank Name:</label><br>
<input type="text" name="bank_name" required>

<br><br>

<label>Bank Branch:</label><br>
<input type="text" name="bank_branch" required>

<br><br>

<label>Upload Certificate:</label><br>
<input type="file" name="certificate_file" required>

<br><br>

<label>Upload Payment Proof:</label><br>
<input type="file" name="payment_proof" required>

<br><br>

<button type="submit">Submit Request</button>

</form>

</body>
</html>