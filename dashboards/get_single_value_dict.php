<?php

header("Content-type:application/json");

include_once '../includes/dbconnect.php';

$query = "SELECT COUNT(supplier_name) as count FROM tbl_payments WHERE pay_type='pay' AND status='pending'";

$query2 = "SELECT COUNT(supplier_name) as count FROM tbl_payments WHERE pay_type='receipt' AND status='pending'";

$result = mysqli_query($conn, $query);

$result2 = mysqli_query($conn, $query2);

$response = array();

if ($row = mysqli_fetch_assoc($result)) {
  array_push(
    $response,
    array(
      'type' => 'pay',
      'count' => $row['count'],
    )
  );
}


if ($row = mysqli_fetch_assoc($result2)) {
  array_push(
    $response,
    array(
      'type' => 'receipt',
      'count' => $row['count'],
    )
  );
}




echo json_encode($response);

mysqli_close($conn);
