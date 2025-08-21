<?php
// db.php
session_start();

$host = "localhost";
$user = "root";      // default XAMPP user
$pass = "";          // default XAMPP password is empty
$db   = "hanzon";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("DB connection failed: " . $conn->connect_error); }

function require_login() {
  if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }
}
