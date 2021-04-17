<?php
include_once '../includes/dbconnect.php';
$con = $conn;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

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
  $employee_name = sanitize_input($_POST["employee_name"]);
  $att_date = sanitize_input($_POST["att_date"]);
  $employee_no = sanitize_input($_POST["employee_no"]);
  $branch = sanitize_input($_POST["branch"]);
  $job_title = sanitize_input($_POST["job_title"]);
  $status = sanitize_input($_POST["status"]);
  $late_entry = sanitize_input($_POST["late_entry"]);
  $early_exit = sanitize_input($_POST["early_exit"]);


  if ($stmt = $con->prepare('SELECT employee_no FROM tbl_attendance WHERE employee_no = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $employee_no);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows == 0) {
      if ($stmt = $con->prepare('INSERT INTO tbl_attendance (employee_name,att_date,employee_no,branch,job_title,status,late_entry,early_exit) VALUES (?,?,?,?,?,?,?,?)')) {
        $stmt->bind_param('ssssssss', $employee_name, $att_date, $employee_no, $branch, $job_title, $status, $late_entry, $early_exit);

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
        "desc" => "Employee Already exists.."
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
