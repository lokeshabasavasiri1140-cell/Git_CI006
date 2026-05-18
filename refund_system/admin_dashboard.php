<?php
include 'db.php';

// Get selected branch
$branch = $_GET['branch'] ?? '';

// Base query → ONLY Approved
$sql = "SELECT * FROM refund_request WHERE status='Approved'";

// Apply branch filter if selected
if(!empty($branch)){
    $sql .= " AND usn LIKE '%$branch%'";
}

$result = mysqli_query($conn, $sql);

// Counts
$total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM refund_request WHERE status='Approved'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h2>Admin Dashboard (Approved Only)</h2>

<a href="export_excel.php">Download Excel</a>

<h3 style="color:green;">Total Approved: <?php echo $total; ?></h3>

<hr>

<a href="index.php">Logout</a>

<hr>

<!-- 🔷 BRANCH FILTER -->
<form method="GET">
    <label>Select Branch:</label>
    <select name="branch">
        <option value="">All</option>
        <option value="CS">CSE</option>
        <option value="CI">AIML</option>
        <option value="EC">ECE</option>
    </select>
    <button type="submit">Filter</button>
</form>

<br>

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
</tr>

<?php
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
<td style="color:green;"><?php echo $row['status']; ?></td>

</tr>

<?php
}
?>

</table>

</body>
</html>