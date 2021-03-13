<?php

header("Content-type:application/json");

include_once 'dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $customer = $_POST["customer"];

  $query = "SELECT * FROM tbl_customer WHERE name='$customer'";

  $result = mysqli_query($conn, $query);
  $response = array();

  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $email = $row['email'];
    $physical_address = $row['physical_address'];
    $postal_address = $row['postal_address'];
    $tel_no = $row['tel_no'];

    array_push(
      $response,
      array(
        'name' => $name,
        'email' => $email,
        'physical_address' => $physical_address,
        'postal_address' => $postal_address,
        'tel_no' => $tel_no

      )
    );
  }

  echo json_encode($response);
}

mysqli_close($conn);
