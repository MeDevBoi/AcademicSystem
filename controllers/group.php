<?php
    include('connection/connection.php');
    class group extends db{
         public function add($name , $code)
         {
            $query = mysqli_query($this->con , "INSERT INTO `groups`(`name`, `code`) VALUES ('$name','$code')");
            return $query;
         }
         public function fetch()
         {
            $query = mysqli_query($this->con , "SELECT * FROM `groups`");
            return $query;
         }
         public function edit($id , $name , $code)
         {
            $query = mysqli_query($this->con , "UPDATE `groups` SET `name`='$name',`code`='$code' WHERE id='$id'");
            return $query;
         }
         public function groupById($id)
         {
            $query = mysqli_query($this->con , "SELECT * FROM `groups` WHERE id = '$id'");
            return $query;
         }
         public function delete($id)
         {
             mysqli_query($this->con , "DELETE FROM groups WHERE id = '$id'");
         }
        

    }

?>