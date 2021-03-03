<?php

header("Content-type:application/json");

include_once 'dbconnect.php';

$query = "SELECT * FROM tbl_bank";

$result = mysqli_query($conn, $query);
$response = array();

while ($row = mysqli_fetch_assoc($result)) {
  $bank = $row['bank_name'];
  $acc_no = $row['acc_no'];
  $branch = $row['branch_name'];
  $acc_name = $row['acc_name'];

  array_push(
    $response,
    array(
      'bank' => $bank,
      'acc_no' => $acc_no,
      'acc_name' => $acc_name,
      'branch' => $branch

    )
  );
}

echo json_encode($response);

mysqli_close($conn);
