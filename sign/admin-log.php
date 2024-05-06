<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $_POST['login'];
  $pwd = $_POST['pwd'];

  // Check if the username and password match the admin credentials
  if ($login == "admin" && $pwd == "admin") {
    $_SESSION['login'] = $login;
    $_SESSION['pwd'] = $pwd;
    header('Location: admin/index.php');
    exit();
  } else {
    $message = "Invalid username or password";
    header('Location: admin-login.php');
  }
}
?>