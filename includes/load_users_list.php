<?php

header("Content-type:application/json");

include_once 'dbconnect.php';

$query = "SELECT * FROM tbl_user";

$result = mysqli_query($conn, $query);
$response = array();

while ($row = mysqli_fetch_assoc($result)) {
  $email = $row['email'];
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];

  array_push(
    $response,
    array(
      'email' => $email,
      'first_name' => $first_name,
      'last_name' => $last_name

    )
  );
}

echo json_encode($response);

mysqli_close($conn);
