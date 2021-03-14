<?php

header("Content-type:application/json");

include_once '../includes/dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $supplier = $_POST["supplier"];

  $query = "SELECT * FROM tbl_supplier WHERE name='$supplier'";

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
