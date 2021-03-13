<?php

header("Content-type:application/json");

include_once 'dbconnect.php';
$start_date = $_POST["date1"];
$end_date = $_POST["date2"];
$bank = $_POST["bank"];

$query = "SELECT * FROM tbl_payments WHERE pay_type = 'receipt' and bank_name='$bank' and date>='$start_date' and date<= '$end_date'";

$result = mysqli_query($conn, $query);
$response = array();

while ($row = mysqli_fetch_assoc($result)) {
  $date = $row['date'];
  $supplier = $row['supplier_name'];
  $cheque_no = $row['cheque_no'];
  $amount = $row['amount'];
  $cheque_type = $row['cheque_type'];
  if (strcmp($cheque_type, 'interbank') == 0) {
    $query2 = "SELECT * FROM tbl_bank WHERE bank_name='$bank'";
    $result2 = mysqli_query($conn, $query2);
    if ($row2 = mysqli_fetch_assoc($result2)) {
      $clear_days = $row2['clear_days'];
      $valid_date = date('Y-m-d', strtotime($date . ' + ' . $clear_days . ' days'));
    }
  } else {
    $valid_date = $date;
  }

  array_push(
    $response,
    array(
      'date' => $date,
      'customer' => $supplier,
      'cheque_no' => $cheque_no,
      'amount' => $amount,
      'Value_Date' => $valid_date,
      'cheque_type' => $cheque_type

    )
  );
}

echo json_encode($response);

mysqli_close($conn);
