<?php
include 'db.php';

// Check if the form was actually submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Collect form data using the Null Coalescing Operator (??) 
    // This prevents "Undefined array key" warnings if a field is left empty.
    $usn = $_POST['usn'] ?? '';
    $participants = $_POST['participants'] ?? '';
    $subject_name = $_POST['subject_name'] ?? '';
    $from_date = $_POST['from_date'] ?? '';
    $to_date = $_POST['to_date'] ?? ''; // Added from your error screenshot
    $event_type = $_POST['event_type'] ?? ''; // Added from your error screenshot
    $event_name = $_POST['event_name'] ?? ''; // Added from your error screenshot
    $place = $_POST['place'] ?? ''; // Added from your error screenshot
    $amount = $_POST['amount'] ?? '';

    $account_holder_name = $_POST['account_holder_name'] ?? '';
    $account_number = $_POST['account_number'] ?? '';
    $ifsc_code = $_POST['ifsc_code'] ?? '';
    $bank_name = $_POST['bank_name'] ?? '';
    $bank_branch = $_POST['bank_branch'] ?? '';

    // 2. Handle File Uploads
    $certificate = $_FILES['certificate_file']['name'] ?? '';
    $proof = $_FILES['payment_proof']['name'] ?? '';

    // Create the uploads folder if it doesn't exist
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    if (!empty($certificate)) {
        move_uploaded_file($_FILES['certificate_file']['tmp_name'], "uploads/" . $certificate);
    }
    if (!empty($proof)) {
        move_uploaded_file($_FILES['payment_proof']['tmp_name'], "uploads/" . $proof);
    }

    // 3. Secure SQL Insertion using Prepared Statements
    $sql = "INSERT INTO refund_request 
            (usn, participants, subject_name, from_date, to_date, event_type, event_name, place, amount, 
            account_holder_name, account_number, ifsc_code, bank_name, bank_branch, 
            certificate_file, payment_proof, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // "ssssssssssssssss" corresponds to the 16 variables below (all strings)
        mysqli_stmt_bind_param($stmt, "ssssssssssssssss", 
            $usn, $participants, $subject_name, $from_date, $to_date, $event_type, $event_name, $place, $amount, 
            $account_holder_name, $account_number, $ifsc_code, $bank_name, $bank_branch, 
            $certificate, $proof
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "Refund Request Submitted Successfully";
        } else {
            echo "Execution Error: " . mysqli_stmt_error($stmt);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "SQL Preparation Error: " . mysqli_error($conn);
    }

} else {
    echo "Direct access not allowed. Please submit the form.";
}

mysqli_close($conn);
?>