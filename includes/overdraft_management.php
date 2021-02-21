<?php
include_once 'dbconnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $start_date = $_POST["date1"];
  $end_date = $_POST["date2"];
  $bank = $_POST["bank"];

  $query2 = "SELECT * FROM tbl_bank WHERE bank_name='$bank'";
  $result2 = mysqli_query($conn, $query2);
  $response = array();
  if ($row = mysqli_fetch_assoc($result)) {
    $acc_name = $row['acc_name'];
    $acc_no = $row['acc_no'];
    $currency = $row['currency'];
    $opening_bal = $row['opening_bal'];
    $od_limit = $row['od_limit'];
    $id_interest = $row['id_interest'];
    $clear_days = $row['clear_days'];
  }

  $query = "SELECT * FROM tbl_bank WHERE bank_name='$bank' and date>='$start_date' and date<= '$end_date'";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    array_push(
      $response,
      array(
        'req_no' => $row['requisition_No'],
        'date' => $row['date'],
        'branch' => $row['branch'],
        'user' => $row['user'],
        'status' => $row['status']
      )
    );
  }

  echo json_encode($response);

  mysqli_close($conn);
} else {
  $message = "Fields have no data...";
  echo json_encode($message);
}
