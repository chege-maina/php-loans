<?php
include_once '../includes/dbconnect.php';
$con = $conn;
if (mysqli_connect_errno()) {
  // If there is an error with the connection, stop the script and display the error.
  die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

function sanitize_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bank_name = sanitize_input($_POST["bank_name"]);
  $dis_date = sanitize_input($_POST["dis_date"]);
  $first_date = sanitize_input($_POST["first_date"]);
  $amount = sanitize_input($_POST["amount"]);
  $period = sanitize_input($_POST["period"]);
  $installment = sanitize_input($_POST["installment"]);
  $next_installment = sanitize_input($_POST["next_installment"]);
  $interest = sanitize_input($_POST["interest"]);
  $loan_acc = sanitize_input($_POST["loan_acc"]);
  $loan_category = sanitize_input($_POST["loan_category"]);
  $late_repayment = sanitize_input($_POST["late_repayment"]);

  if ($stmt = $con->prepare('SELECT bank_name FROM tbl_loans WHERE bank_name = ? and dis_date =? and loan_acc =?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('sss', $bank_name, $dis_date, $loan_acc);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows == 0) {
      if ($stmt = $con->prepare('INSERT INTO tbl_loans (bank_name, dis_date, first_date, 
      amount, period, installment, next_installment, interest, loan_category, late_repayment, loan_acc) VALUES (?,?,?,?,?,?,?,?,?,?,?)')) {
        $stmt->bind_param('sssssssssss', $bank_name, $dis_date, $first_date, $amount, $period, $installment, $next_installment, $interest, $loan_category, $late_repayment, $loan_acc);

        if ($stmt->execute()) {
          $responseArray = array(
            "message" => "success"
          );
        } else {
          $responseArray = array(
            "message" => "error",
            "desc" => "Internal Server Error"
          );
        }
        echo json_encode($responseArray);
      } else {
        echo json_encode(array(
          "message" => "error",
          "desc" => mysqli_error($con)
        ));
      }
    } else {
      echo json_encode(array(
        "message" => "error",
        "desc" => "Loan Already exists.."
      ));
    }
  } else {
    echo json_encode(array(
      "message" => "error",
      "desc" => "Database Connection Error.."
    ));
  }
} else {
  echo json_encode(array(
    "message" => "error",
    "desc" => "Fields required!"
  ));
}
