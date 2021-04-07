<?php
include_once '../includes/dbconnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bank = $_POST["bank"];
  $dis_date = $_POST["disbursment_date"];
  $stats = 'pending';

  $query2 = "SELECT count(bank) FROM tbl_loan_schedule WHERE bank ='$bank' and loan_acc='$dis_date' and status='$stats'";
  $result2 = mysqli_query($conn, $query2);
  $row2 = mysqli_fetch_assoc($result2);
  $counter = $row2['count(bank)'];
  if ($counter == 0) {


    $query = "SELECT * FROM tbl_loans WHERE bank_name ='$bank' and loan_acc='$dis_date' and status='$stats'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {

      $amount_dis = $row['amount'];
      $interest = $row['interest'];
      $period = $row['period'];
      $nexts = $row['next_installment'];
      $dismb_date = $row['dis_date'];
      $first_date = $row['first_date'];
      $loan_bal = round($amount_dis, 2);
      $count = 1;
      $open_date = $first_date;
      $principle = round(($amount_dis / $period), 2);


      while ($period >= $count) {


        $interest_amt = round(($loan_bal / 100 * $interest / 12), 2);
        $installment = round(($principle + $interest_amt), 2);
        $loan_bal = round(($loan_bal - $principle), 2);

        $mysql = "INSERT INTO tbl_loan_schedule (bank, dis_date, pay_date, balance, installment, pay_no,
    principle, interest, loan_acc) VALUES('" . $bank . "','" . $dismb_date . "','" . $open_date . "','" . $loan_bal . "',
    '" . $installment . "', '" . $count . "','" . $principle . "','" . $interest_amt . "' ,'" . $dis_date . "')";
        mysqli_query($conn, $mysql);

        $open_date = date('Y-m-d', strtotime($open_date . ' + 1 months'));
        $count++;
      }
      $query = "SELECT pay_date, pay_no FROM tbl_loan_schedule WHERE bank ='$bank' and loan_acc='$dis_date'";

      $result = mysqli_query($conn, $query);
      $response = array();

      while ($row = mysqli_fetch_assoc($result)) {
        $checkdate = $row['pay_date'];
        $realdate = $row['pay_date'];
        $pay_num = $row['pay_no'];
        $day = date("D", strtotime($checkdate));
        if (strcmp($day, 'Sun') == 0) {
          $checkdate = date('Y-m-d', strtotime($checkdate . ' - 2 days'));
          $sql = "UPDATE tbl_loan_schedule SET pay_date = '$checkdate' WHERE pay_date = '$realdate ' and bank ='$bank' and loan_acc='$dis_date'";
          mysqli_query($conn, $sql);
        }
        if (strcmp($day, 'Sat') == 0) {
          $checkdate = date('Y-m-d', strtotime($checkdate . ' - 1 days'));
          $sql = "UPDATE tbl_loan_schedule SET pay_date = '$checkdate' WHERE pay_date = '$realdate ' and bank ='$bank' and loan_acc='$dis_date'";
          mysqli_query($conn, $sql);
        }
        if ($pay_num < $nexts) {
          $sql = "UPDATE tbl_loan_schedule SET status = 'paid' WHERE pay_no = '$pay_num ' and bank ='$bank' and loan_acc='$dis_date'";
          mysqli_query($conn, $sql);
        }
      }
    }
  }
  $query2 = "SELECT * FROM tbl_loan_schedule WHERE bank ='$bank' and loan_acc='$dis_date' and status='pending' ORDER BY pay_date ASC LIMIT 1";
  $query = "SELECT * FROM tbl_loan_schedule WHERE bank ='$bank' and loan_acc='$dis_date' and status='pending'";

  $result2 = mysqli_query($conn, $query2);
  $response2 = array();
  if ($row2 = mysqli_fetch_assoc($result2)) {
    $installmentadd = round($row2['installment'], 2);
    $pay_dateadd = $row2['pay_date'];
    $balanceadd = $row2['balance'];
    $dismb_date = $row2['dis_date'];
    $principleadd = $row2['principle'];
    $ourbalance = round($principleadd + $balanceadd, 2);

    $result = mysqli_query($conn, $query);
    $response = array();

    while ($row = mysqli_fetch_assoc($result)) {
      $pay_number = $row['pay_no'];
      $pay_date = $row['pay_date'];
      $principledd = round($row['principle'], 2);
      $interestdd = round($row['interest'], 2);
      $installmentdd = round($row['installment'], 2);
      $balance = round($row['balance'], 2);
      $status = $row['status'];

      array_push(
        $response,
        array(
          'payment_no' => $pay_number,
          'payment_date' => $pay_date,
          'principle' => $principledd,
          'interest' => $interestdd,
          'installment' => $installmentdd,
          'balance' => $balance,
          'status' => $status
        )
      );
    }
    array_push(
      $response2,
      array(
        'paymentdate_dd' => $pay_dateadd,
        'installment_dd' => $installmentadd,
        'balance_dd' => $ourbalance,
        'disbur_date' => $dismb_date,
        'table_items' => $response
      )
    );
  }

  echo json_encode($response2);
} else {
  $message = "Fields have no data...";
  echo json_encode($message);
}
mysqli_close($conn);
