<?php
include 'db.php';

// Counts
$total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM refund_request"));
$approved = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM refund_request WHERE status='Approved'"));
$pending = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM refund_request WHERE status='Pending'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOD Dashboard</title>
</head>
<body>

<h2>HOD Dashboard</h2>

<a href="export_excel.php">Download Excel</a>

<h3 style="color:blue;">Total: <?php echo $total; ?></h3>
<h3 style="color:orange;">Pending: <?php echo $pending; ?></h3>
<h3 style="color:green;">Approved: <?php echo $approved; ?></h3>

<hr>

<a href="index.php">Logout</a>

<hr>

<table border="1" cellpadding="10">

<tr>
<th>Sl No</th>
<th>Participants</th>
<th>Subject/Event</th>
<th>Date</th>
<th>Amount</th>
<th>Account Holder</th>
<th>Account No</th>
<th>IFSC</th>
<th>Bank</th>
<th>Branch</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

$sql = "SELECT * FROM refund_request";
$result = mysqli_query($conn, $sql);

$sl = 1;

while($row = mysqli_fetch_assoc($result)){

$subject_event = trim(
    $row['subject_name'] .
    (!empty($row['event_type']) ? " (" . $row['event_type'] . ")" : "") .
    (!empty($row['event_name']) ? " - " . $row['event_name'] : "")
);
?>

<tr>

<td><?php echo $sl++; ?></td>
<td><?php echo $row['participants']; ?></td>
<td><?php echo $subject_event; ?></td>
<td><?php echo $row['from_date']; ?></td>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['account_holder_name']; ?></td>
<td><?php echo $row['account_number']; ?></td>
<td><?php echo $row['ifsc_code']; ?></td>
<td><?php echo $row['bank_name']; ?></td>
<td><?php echo $row['bank_branch']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>
<?php
if($row['status'] == 'Pending'){
?>
<a href="approve.php?id=<?php echo $row['id']; ?>">Approve</a>
<?php
} else {
    echo "Approved";
}
?>
</td>

</tr>

<?php
}
?>

</table>

</body>
</html>