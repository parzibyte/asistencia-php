<?php
function deleteEmployee($id)
{
    $db = getDatabase();
    $statement = $db->prepare("DELETE FROM employees WHERE id = ?");
    return $statement->execute([$id]);
}

function updateEmployee($name, $id)
{
    $db = getDatabase();
    $statement = $db->prepare("UPDATE employees SET name = ? WHERE id = ?");
    return $statement->execute([$name, $id]);
}
function getEmployeeById($id)
{
    $db = getDatabase();
    $statement = $db->prepare("SELECT id, name FROM employees WHERE id = ?");
    $statement->execute([$id]);
    return $statement->fetchObject();
}

function saveEmployee($name)
{
    $db = getDatabase();
    $statement = $db->prepare("INSERT INTO employees(name) VALUES (?)");
    return $statement->execute([$name]);
}

function getEmployees()
{
    $db = getDatabase();
    $statement = $db->query("SELECT id, name FROM employees");
    return $statement->fetchAll();
}

function getVarFromEnvironmentVariables($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("The environment file ($file) does not exists. Please create it");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("The specified key (" . $key . ") does not exist in the environment file");
    }
}

function getDatabase()
{
    $password = getVarFromEnvironmentVariables("MYSQL_PASSWORD");
    $user = getVarFromEnvironmentVariables("MYSQL_USER");
    $dbName = getVarFromEnvironmentVariables("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
