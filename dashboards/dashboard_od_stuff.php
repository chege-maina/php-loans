<?php

header("Content-type:application/json");

include_once '../includes/dbconnect.php';

$date = date("Y-m-d");
$open_date = date('Y-m-d', strtotime($date . ' - 1 days'));
$day = date("l", strtotime($open_date));
$query2 = "SELECT * FROM tbl_bank";
$result2 = mysqli_query($conn, $query2);
$response = array();
while ($row2 = mysqli_fetch_assoc($result2)) {
  $opening_bal = $row2['opening_bal'];
  $bank = $row2['bank_name'];
  $od_limit = $row2['od_limit'];
  $id_interest = $row2['id_interest'];
  $over = $row2['over_limit'];
  $number_on = 0;
  $crap = 0;
  $query = "SELECT sum(dr), sum(cr) FROM tbl_od_transactions WHERE value_date<='$open_date' and bank_name='$bank'";

  $result = mysqli_query($conn, $query);

  if ($row = mysqli_fetch_assoc($result)) {
    $dr = $row['sum(dr)'];
    $cr = $row['sum(cr)'];

    $balance = ($opening_bal + $dr) - $cr;

    if ($balance < 0) {
      $negative_num = abs($balance);
      if ($negative_num > $od_limit) {
        $number_on = $negative_num - $od_limit;
        $interest = $number_on * ($id_interest + $over) / 100;
        $crap = $interest / 365;
        $interest = (($od_limit * $id_interest / 100) + $interest) / 365;
      } else {
        $interest = ($negative_num * $id_interest / 100) / 365;
      }
    } else {
      $interest = 0;
    }

    array_push(
      $response,
      array(
        'bank' => $bank,
        'day' => $day,
        'date' => $open_date,
        'Running_balance' => $balance,
        'od_limit' => $od_limit,
        'OD_interest' => round($interest, 2),
        'OD_interest_above_amt' => round($crap, 2),
        'OD_amount_above' => $number_on

      )
    );
  }
}

echo json_encode($response);


mysqli_close($conn);
