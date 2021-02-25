<?php
include_once 'dbconnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $date = $_POST["date"];
  $bank = $_POST["bank"];

  $query = "SELECT * FROM tbl_bank";
  $result = mysqli_query($conn, $query);
  $response = array();
  if ($row = mysqli_fetch_assoc($result)) {

    $open_bal = $row['opening_bal'];
    $clear_days = $row['clear_days'];

    $query3 = "SELECT banking_date, opening_bal FROM tbl_od_transactions WHERE bank_name='$bank' ORDER BY banking_date DESC";
    $result3 = mysqli_query($conn, $query3);
    if ($row3 = mysqli_fetch_assoc($result3)) {

      $open_bal = $row3['opening_bal'];
    }
    $query2 = "SELECT * FROM tbl_payments WHERE bank_name='$bank' and date='$date' and status='pending'";
    $result2 = mysqli_query($conn, $query2);
    $response2 = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
      $cheque_type = $row2['cheque_type'];
      if (strcmp($cheque_type, 'interbank') == 0) {
        $valid_date = date('Y-m-d', strtotime($date . ' + ' . $clear_days . ' days'));
      } else {
        $valid_date = $date;
      }
      $pay_type = $row2['pay_type'];
      if (strcmp($pay_type, 'pay') == 0) {
        $money_in = 0;
        $money_out = $row2['amount'];
      } else {
        $money_out = 0;
        $money_in = $row2['amount'];
      }
      $balance = $open_bal + $money_in - $money_out;
      array_push(
        $response2,
        array(
          'banking_date' => $date,
          'cheque_no' => $row2['cheque_no'],
          'details' => $row2['supplier_name'],
          'amount' => $row2['amount'],
          'value_date' => $valid_date,
          'money_in' => $money_in,
          'money_out' => $money_out,
          'balance' => $balance

        )
      );
    }
    array_push(
      $response,
      array(
        'opening_bal' => $open_bal,
        'table_items' => $response2

      )
    );
  }
  echo json_encode($response);
} else {
  $message = "Fields have no data...";
  echo json_encode($message);
}
