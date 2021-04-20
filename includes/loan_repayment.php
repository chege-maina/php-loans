<?php
include_once '../includes/dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pay_no = $_POST["pay_no"];
  $installment = $_POST["installment"];
  $transct_date = $_POST["transct_date"];
  $pay_date = $_POST["pay_date"];
  $loan_acc = $_POST["loan_acc"];
  $bank = $_POST["bank"];
  $amount = $_POST["amount"];
  $late_charges = $_POST["late_charges"];
  $arrear_days = $_POST["arrear_days"];
  $cheque_no = $_POST["cheque_no"];
  $cheque_type = $_POST["cheque_type"];
  $transaction_det = $bank . " Loan " . $loan_acc . " Payment";

  $mysql = "INSERT INTO tbl_loan_repayments (pay_no, installment, transaction_date, pay_date, 
loan_acc, bank, amount, late_charges, days_arrears, cheque_no, cheque_type) 
VALUES('" . $pay_no . "','" . $installment . "','" . $transct_date . "','" . $pay_date . "',
'" . $loan_acc . "', '" . $bank . "','" . $amount . "',
'" . $late_charges . "','" . $arrear_days . "', '" . $cheque_no . "', '" . $cheque_type . "')";
  mysqli_query($conn, $mysql);
  $mysql = "INSERT INTO tbl_payments (supplier_name, bank_name, cheque_no, 
      amount, date, cheque_type, pay_type) VALUES ('$transaction_det', '$bank', '$cheque_no', '$amount','$transct_date', '$cheque_type', 'pay')";
  mysqli_query($conn, $mysql);
  $sql = "UPDATE tbl_loan_schedule SET status = 'paid' WHERE bank = '" . $bank . "' and loan_acc = '" . $loan_acc . "' and pay_no = '" . $pay_no . "'";
  mysqli_query($conn, $sql);

  $responseArray = array(
    "message" => "success"
  );

  mysqli_close($conn);
} else {
  $responseArray = array(
    "message" => "error",
    "desc" => "Fields Required"
  );
}
echo json_encode($responseArray);
