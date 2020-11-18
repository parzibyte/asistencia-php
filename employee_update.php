<?php
if (!isset($_POST["name"]) || !isset($_POST["id"])) {
    exit("No data provided");
}
include_once "functions.php";
$name = $_POST["name"];
$id = $_POST["id"];
updateEmployee($name, $id);
header("Location: employees.php");

