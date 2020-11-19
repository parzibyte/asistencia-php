<?php
if (!isset($_GET["date"])) {
    exit("[]");
}
include_once "functions.php";
$date = $_GET["date"];
$data = getAttendanceDataByDate($date);
echo json_encode($data);
