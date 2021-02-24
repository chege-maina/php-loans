<?php
include_once 'dbconnect.php';
session_start();

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
$bank = "EQUITY BANK"; //$_POST["bank"];

$query2 = "SELECT * FROM tbl_loans WHERE bank_name='$bank' and status='pending'";
$result2 = mysqli_query($conn, $query2);
$response = array();
if ($row2 = mysqli_fetch_assoc($result2)) {
  $period = $row2['period'];
  $acc_no = $row2['acc_no'];


  $query = "SELECT date FROM tbl_payments WHERE bank_name='$bank' and date>='$start_date' and date<= '$end_date' GROUP BY date";
  $result = mysqli_query($conn, $query);
  $response2 = array();
  while ($row = mysqli_fetch_assoc($result)) {


    $dr = 0;
    $cr = 0;
    $total_receipt = 0;
    $total_pay = 0;
    $date = $row['date'];

    $query3 = "SELECT sum(amount) FROM tbl_payments WHERE date ='$date' and pay_type='pay'";
    $result3 = mysqli_query($conn, $query3);
    if ($row3 = mysqli_fetch_assoc($result3)) {
      $cr = $row3['sum(amount)'];
    }
    $query4 = "SELECT sum(amount) FROM tbl_payments WHERE date ='$date' and pay_type='receipt'";
    $result4 = mysqli_query($conn, $query4);
    if ($row4 = mysqli_fetch_assoc($result4)) {
      $dr = $row4['sum(amount)'];
    }
    $query5 = "SELECT sum(amount) FROM tbl_payments WHERE date <'$date' and pay_type='pay'";
    $result5 = mysqli_query($conn, $query5);
    if ($row5 = mysqli_fetch_assoc($result5)) {
      $total_pay = $row5['sum(amount)'];
    }
    $query6 = "SELECT sum(amount) FROM tbl_payments WHERE date <'$date' and pay_type='receipt'";
    $result6 = mysqli_query($conn, $query6);
    if ($row6 = mysqli_fetch_assoc($result6)) {
      $total_receipt = $row6['sum(amount)'];
    }

    $opening_bal = $opening_bal + $total_receipt - $total_pay;
    $closing_bal = $opening_bal + $dr - $cr;

    if ($closing_bal > $od_limit) {
      $interest = $closing_bal * ($id_interest + $over) / 100;
    } else {
      $interest = $closing_bal * $id_interest / 100;
    }

    $date_value = date('Y-m-d', strtotime($date . ' + ' . $clear_days . ' days'));

    $date_value = date('Y-m-d', strtotime($date . ' + ' . $clear_days . ' days'));

    array_push(
      $response2,
      array(
        'opening_bal' => $opening_bal,
        'value_date' => $date_value,
        'dr' => $dr,
        'cr' => $cr,
        'closing_bal' => $closing_bal,
        'od_interest' => $interest
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
/*} else {
  $message = "Fields have no data...";
  echo json_encode($message);
}*/