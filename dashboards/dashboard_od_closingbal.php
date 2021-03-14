<?php

header("Content-type:application/json");

include_once '../includes/dbconnect.php';

$date = date("Y-m-d");
$open_date = date('Y-m-d', strtotime($date . ' - 1 days'));
$day = date("l", strtotime($open_date));
$query2 = "SELECT opening_bal, bank_name FROM tbl_bank";
$result2 = mysqli_query($conn, $query2);
$response = array();
while ($row2 = mysqli_fetch_assoc($result2)) {
  $opening_bal = $row2['opening_bal'];
  $bank = $row2['bank_name'];
  $query = "SELECT sum(dr), sum(cr) FROM tbl_od_transactions WHERE value_date<='$open_date' and bank_name='$bank'";

  $result = mysqli_query($conn, $query);

  if ($row = mysqli_fetch_assoc($result)) {
    $dr = $row['sum(dr)'];
    $cr = $row['sum(cr)'];

    $balance = ($opening_bal + $dr) - $cr;

    array_push(
      $response,
      array(
        'bank' => $bank,
        'day' => $day,
        'date' => $open_date,
        'closing balance' => $balance

      )
    );
  }
}

echo json_encode($response);


mysqli_close($conn);
