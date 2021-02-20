<?php

header("Content-type:application/json");

include_once 'dbconnect.php';
session_start();


$query = "SELECT * FROM tbl_currency";

$result = mysqli_query($conn, $query);
$response = array();

while ($row = mysqli_fetch_assoc($result)) {

    array_push(
        $response,
        array(
            'name' => $row['currency_unit']
        )
    );
}

echo json_encode($response);

mysqli_close($conn);
