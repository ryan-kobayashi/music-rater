<?php /* connection between webpage and database */

$env = parse_ini_file('.env');

$servername = $env["SERVER_NAME"];
$dbname = $env["DATABASE_NAME"];
$username = $env["USERNAME"];
$password = $env["PASSWORD"];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>