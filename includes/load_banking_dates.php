<?php
include_once 'dbconnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $date = $_POST["date"];
  $bank = $_POST["bank"];

  $query = "SELECT * FROM tbl_bank ORDER BY bank_name ASC";

  $result = mysqli_query($conn, $query);
  $response = array();

  if ($row = mysqli_fetch_assoc($result)) {
  }
}
