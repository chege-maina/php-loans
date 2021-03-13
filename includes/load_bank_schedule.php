<?php

header("Content-type:application/json");

include_once 'dbconnect.php';
session_start();


$query = "SELECT * FROM tbl_loans WHERE status='pending' GROUP BY bank_name";

$result = mysqli_query($conn, $query);
$response = array();

while ($row = mysqli_fetch_assoc($result)) {

    array_push(
        $response,
        array(
            'name' => $row['bank_name']
        )
    );
}

echo json_encode($response);

mysqli_close($conn);
