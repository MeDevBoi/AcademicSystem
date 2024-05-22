<?php
    include('connection/connection.php');

   class auth extends db{

    public function login($email ,$password)
    {
      return mysqli_query($this->con,"SELECT id,role,group_id FROM users WHERE email='$email' AND password = '$password'");
       
    }
    public function register($name , $email , $password)
    {
      $date= date('Y-m-d H:i:s');
      return mysqli_query($this->con , "INSERT INTO `users`(`name`, `email`, `password`,`created_at`) 
      VALUES ('$name','$email','$password','$date')");
    }

   }

?>