<?php
  include "../classes/User.php";

  $username = $_POST["username"];
  $password = $_POST["password"];

  $userObj = new User;

  $userObj->login($username, $password);
?>