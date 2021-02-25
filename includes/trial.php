<?php

header("Content-type:application/json");
$bank = 'KCB';

include_once 'dbconnect.php';
$query3 = "SELECT banking_date FROM tbl_od_transactions WHERE bank_name='$bank' ORDER BY banking_date DESC";
$result3 = mysqli_query($conn, $query3);
while ($row3 = mysqli_fetch_assoc($result3)) {
  $open_date = $row3['banking_date'];
  $open_date = date('Y-m-d', strtotime($open_date . ' + 1 days'));
  echo $open_date;
}
