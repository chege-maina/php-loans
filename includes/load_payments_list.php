<?php

header("Content-type:application/json");

include_once 'dbconnect.php';
$start_date = $_POST["date1"];
$end_date = $_POST["date2"];
$bank = $_POST["bank"];

$query = "SELECT * FROM tbl_payments WHERE pay_type = 'pay' and bank_name='$bank' and date>='$start_date' and date<= '$end_date'";

$result = mysqli_query($conn, $query);
$response = array();

while ($row = mysqli_fetch_assoc($result)) {
  $date = $row['date'];
  $supplier = $row['supplier_name'];
  $cheque_no = $row['cheque_no'];
  $amount = $row['amount'];
  $cheque_type = $row['cheque_type'];

  array_push(
    $response,
    array(
      'date' => $date,
      'supplier' => $supplier,
      'cheque_no' => $cheque_no,
      'amount' => $amount,
      'cheque_type' => $cheque_type

    )
  );
}

echo json_encode($response);

mysqli_close($conn);
