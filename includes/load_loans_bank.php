<?php

header("Content-type:application/json");

include_once 'dbconnect.php';
session_start();
$bank = "EQUITY BANK"; //$_POST["bank"];

$query = "SELECT * FROM tbl_loans WHERE bank_name = '$bank' and status='pending'";

$result = mysqli_query($conn, $query);
$response = array();

while ($row = mysqli_fetch_assoc($result)) {

    array_push(
        $response,
        array(
            'disbursment_date' => $row['loan_acc']
        )
    );
}

echo json_encode($response);

mysqli_close($conn);
