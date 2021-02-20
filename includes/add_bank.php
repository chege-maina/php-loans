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
  $acc_no = sanitize_input($_POST["acc_no"]);
  $acc_name = sanitize_input($_POST["acc_name"]);
  $currency = sanitize_input($_POST["currency"]);
  $opening_bal = sanitize_input($_POST["opening_bal"]);
  $clear_days = sanitize_input($_POST["clear_days"]);
  $od_limit = sanitize_input($_POST["od_limit"]);
  $id_interest = sanitize_input($_POST["id_interest"]);
  $over_limit = sanitize_input($_POST["over_limit"]);
  $branch = sanitize_input($_POST["branch"]);
  $late_charges = sanitize_input($_POST["late_charges"]);

  if ($stmt = $con->prepare('SELECT bank_name FROM tbl_bank WHERE bank_name = ? and acc_no =?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('ss', $bank_name, $acc_no);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows == 0) {
      if ($stmt = $con->prepare('INSERT INTO tbl_bank (bank_name, acc_no, acc_name, 
      currency, opening_bal, clear_days, od_limit, id_interest, over_limit, late_charges, branch) VALUES (?,?,?,?,?,?,?,?,?,?,?)')) {
        $stmt->bind_param('sssssssssss', $bank_name, $acc_no, $acc_name, $currency, $opening_bal, $clear_days, $od_limit, $id_interest, $over_limit, $late_charges, $branch);

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
        "desc" => "Bank Already exists.."
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
