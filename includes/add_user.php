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
  $email = sanitize_input($_POST["email"]);
  $password = sanitize_input($_POST["password"]);
  $designation = sanitize_input($_POST["designation"]);
  $first_name = sanitize_input($_POST["first_name"]);
  $last_name = sanitize_input($_POST["last_name"]);

  if ($stmt = $con->prepare('SELECT email FROM tbl_user WHERE email = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $email);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows == 0) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      if ($stmt = $con->prepare('INSERT INTO tbl_user (email, password, designation, 
      first_name, last_name) VALUES (?,?,?,?,?)')) {
        $stmt->bind_param('sssss', $email, $password, $designation, $first_name, $last_name);

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
        "desc" => "User Already exists.."
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
