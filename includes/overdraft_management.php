<?php
include_once 'dbconnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $start_date = $_POST["date1"];
  $end_date = $_POST["date2"];
  $bank = $_POST["bank"];
  $balance = 'mm';

  $query2 = "SELECT * FROM tbl_bank WHERE bank_name='$bank'";
  $result2 = mysqli_query($conn, $query2);
  $response = array();
  if ($row2 = mysqli_fetch_assoc($result2)) {
    $acc_name = $row2['acc_name'];
    $acc_no = $row2['acc_no'];
    $currency = $row2['currency'];
    $opening_bal = $row2['opening_bal'];
    $od_limit = $row2['od_limit'];
    $id_interest = $row2['id_interest'];
    $over = $row2['over_limit'];
    $clear_days = $row2['clear_days'];


    $query = "SELECT banking_date, closing_bal FROM tbl_od_transactions WHERE bank_name='$bank' and banking_date>='$start_date' and banking_date<= '$end_date' GROUP BY banking_date ORDER BY banking_date ASC";
    $result = mysqli_query($conn, $query);
    $response2 = array();
    while ($row = mysqli_fetch_assoc($result)) {


      $dr = 0;
      $cr = 0;
      $total_receipt = 0;
      $total_pay = 0;
      $date = $row['banking_date'];
      if ($balance === 'mm') {
        $balance = $row['closing_bal'];
      }

      $query3 = "SELECT sum(dr), sum(cr) FROM tbl_od_transactions WHERE bank_name='$bank' and value_date ='$date'";
      $result3 = mysqli_query($conn, $query3);
      if ($row3 = mysqli_fetch_assoc($result3)) {
        $cr = $row3['sum(cr)'];
        $dr = $row3['sum(dr)'];
      }
      $balance = ($balance + $dr) - $cr;

      if ($balance < 0) {
        $negative_num = abs($balance);
        if ($negative_num > $od_limit) {
          $number_on = $negative_num - $od_limit;
          $interest = $number_on * ($id_interest + $over) / 100;
          $interest = (($od_limit * $id_interest / 100) + $interest) / 365;
        } else {
          $interest = ($negative_num * $id_interest / 100) / 365;
        }
      } else {
        $interest = 0;
      }

      array_push(
        $response2,
        array(
          'date' => $date,
          'dr' => $dr,
          'cr' => $cr,
          'balance' => $balance,
          'od_interest' => round($interest, 2)
        )
      );
    }
    array_push(
      $response,
      array(
        'bank' => $bank,
        'acc_no' => $acc_no,
        'acc_name' => $acc_name,
        'table_items' => $response2
      )
    );

    echo json_encode($response);
  }

  mysqli_close($conn);
} else {
  $message = "Fields have no data...";
  echo json_encode($message);
}
