<?php
include_once '../includes/dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bank_name = $_POST["bank_name"];
  $banking_date = $_POST["banking_date"];
  $opening_bal = $_POST["opening_bal"];
  $closing_bal = $_POST["closing_bal"];
  $table_items = json_decode($_POST["table_items"], true);

  foreach ($table_items as $key => $value) {

    $mysql = "INSERT INTO tbl_od_transactions (bank_name, banking_date, opening_bal, closing_bal, 
details, cheque_no, value_date, dr, cr, balance) VALUES('" . $bank_name . "','" . $banking_date . "',
'" . $opening_bal . "','" . $closing_bal . "','" . $value["p_details"] . "', '" . $value["p_cheque_no"] . "',
'" . $value["p_value_date"] . "','" . $value["p_dr"] . "','" . $value["p_cr"] . "', '" . $value["p_balance"] . "')";
    mysqli_query($conn, $mysql);
  }
  $message = "Daily Transaction Posted Successfully..";
  echo json_encode($message);
  mysqli_close($conn);
} else {
}
