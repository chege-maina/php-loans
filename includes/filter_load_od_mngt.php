<?php

header("Content-type:application/json");

include_once 'dbconnect.php';


$query = "SELECT * FROM tbl_bank ORDER BY bank_name ASC";

$result = mysqli_query($conn, $query);
$response = array();

while ($row = mysqli_fetch_assoc($result)) {
  $date_chk = date("Y-m-d");
  $open_date = $row['opening_date'];
  $bank = $row['bank_name'];
  $counter = 0;

  while ($open_date < $date_chk) {
    $query2 = "SELECT count(bank_name) FROM tbl_payments WHERE bank_name='$bank' and date='$open_date' and status='pending'";
    $result2 = mysqli_query($conn, $query2);
    if ($row2 = mysqli_fetch_assoc($result2)) {
      $counter = $row2['count(bank_name)'];
    }
    array_push(
      $response,
      array(
        'date' => $open_date,
        'trans' => $counter,
        'bank' => $bank

      )
    );

    $open_date = date('Y-m-d', strtotime($open_date . ' + 1 days'));
  }
}

echo json_encode($response);

mysqli_close($conn);
