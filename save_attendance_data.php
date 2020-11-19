<?php
include_once "functions.php";
$payload = json_decode(file_get_contents("php://input"));
if (!$payload) exit("No data present");
$response = saveAttendanceData($payload->date, $payload->employees);
echo json_encode($response);
