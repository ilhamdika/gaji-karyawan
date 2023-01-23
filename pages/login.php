<?php
error_reporting(0);
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysql_query("SELECT * FROM user WHERE username='$username' and password='$password'");
$cek = mysql_num_rows($query);
if ($cek == TRUE) {
  $data = mysql_fetch_array($query);
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  $_SESSION['level'] = $data['level'];
  echo "<script>
            location='index.php?username=" . $username . "';</script>";
} else {
  echo "<script> alert ('username atau password salah');
      location='../index.php';</script>";
}
