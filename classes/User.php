<?php

 require "Database.php";

 class User extends Database
 {
   public function register($request){
     $first_name = $request['first_name'];
     $last_name = $request['last_name'];
     $username = $request['username'];
     $password = $request['password'];

     $password = password_hash($password, PASSWORD_DEFAULT);

     $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`, `password`) VALUES ('$first_name','$last_name','$username','$password')";

     if($this->conn->query($sql)){
      header("location: ../views");
      exit;
     }else{
      die("Error in creating the user: " . $this->conn->error);
     }
   }

   public function login($username, $password){

    $sql = "SELECT * FROM users WHERE username= '$username'";
    $result = $this->conn->query($sql);
    if($result && $result->num_rows==1){
      $user_details = $result->fetch_assoc();
      $compare_password = password_verify($password, $user_details["password"]);

      if($compare_password){
        session_start();
        //store to session
        $_SESSION['id'] = $user_details["id"];
        $_SESSION['full_name'] = $user_details['first_name']." ".$user_details['last_name'];
        header("Location: ../views/dashboard.php");
      }else{
        die("Password is incorrect.");
      }

      }else{
        die("Username doesn't exist or An error occurred: ".$this->conn->error);
    }
  }

  }