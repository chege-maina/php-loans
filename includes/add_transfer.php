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
  $supplier_name = sanitize_input($_POST["customer_name"]);
  $bank_name = sanitize_input($_POST["bank_name"]);
  $cheque_no = sanitize_input($_POST["cheque_no"]);
  $amount = sanitize_input($_POST["amount"]);
  $date = sanitize_input($_POST["date"]);
  $cheque_type = sanitize_input($_POST["cheque_type"]);
  $stat = "receipt";

  if ($stmt = $con->prepare('SELECT supplier_name FROM tbl_payments WHERE supplier_name = ? and bank_name =? and cheque_no =?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('sss', $name, $email, $cheque_no);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows == 0) {
      if ($stmt = $con->prepare('INSERT INTO tbl_payments (supplier_name, bank_name, cheque_no, 
      amount, date, cheque_type, pay_type) VALUES (?,?,?,?,?,?,?)')) {
        $stmt->bind_param('sssssss', $supplier_name, $bank_name, $cheque_no, $amount, $date, $cheque_type, $stat);

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
        "desc" => "Payment Already exists.."
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
