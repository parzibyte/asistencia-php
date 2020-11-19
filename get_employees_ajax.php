<?php
include_once "functions.php";
$employees = getEmployees();
echo json_encode($employees);
