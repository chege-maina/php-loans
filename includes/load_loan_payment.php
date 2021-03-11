<?php

header("Content-type:application/json");

include_once 'dbconnect.php';
session_start();
$bank = $_POST["bank"];
$dis_date = $_POST["dis_date"];
$pay_date = $_POST["pay_date"];
$pay_no = $_POST["pay_no"];

$query = "SELECT * FROM tbl_loan_schedule WHERE bank = '$bank' and dis_date='$dis_date'and pay_date='$pay_date' and pay_no='$pay_no' and status='pending'";

$result = mysqli_query($conn, $query);
$response = array();

if ($row = mysqli_fetch_assoc($result)) {
    $bal = $row['balance'];
    $principle = $row['principle'];
    $bal = $principle + $bal;
    $interest = round($row['interest'], 2);
    $installment = round($row['installment'], 2);

    $query2 = "SELECT * FROM tbl_loans WHERE bank_name = '$bank' and dis_date='$dis_date'and status='pending'";
    $result2 = mysqli_query($conn, $query2);
    if ($row2 = mysqli_fetch_assoc($result2)) {
        $loan_amt = $row2['amount'];
        $charge_pc = $row2['late_repayment'];
    }

    array_push(
        $response,
        array(
            'loan_amt' => $loan_amt,
            'balance' => $bal,
            'principle' => $principle,
            'interest' => $interest,
            'installment' => $installment,
            'charge_pc' => $charge_pc
        )
    );
}

echo json_encode($response);

mysqli_close($conn);
