<?php
    // include('connection/connection.php');
    include('controllers/group.php');

    class lecturer extends db{

         public function add($groupId , $name , $email, $password, $date)
         {
            $role ='lecturer';
            $query = mysqli_query($this->con , "INSERT INTO `users`(`group_id`, `name` ,`email`,`password`,`created_at`,`role`) 
            VALUES ('$groupId','$name','$email','$password','$date','$role')");
            return $query;
         }
         public function fetch()
         {
            $query = mysqli_query($this->con , 
            "SELECT users.*,groups.name AS groupName,groups.code FROM users LEFT JOIN groups ON users.group_id=groups.id WHERE users.role='lecturer';"
            );
            return $query;
         }
         public function edit($id ,$groupId, $name , $email , $password )
         {
            $query = mysqli_query($this->con , "UPDATE `users` SET `group_id`='$groupId',`name`='$name',`email`='$email',password='$password' WHERE id='$id'");
            return $query;
         }
        
         public function delete($id)
         {
             mysqli_query($this->con , "DELETE FROM users WHERE id = '$id'");
         }
         public function getGroup()
         {
           $obj = new group();
           return $obj->fetch();
         }
         public function fetchById($id)
         {
            $query = mysqli_query($this->con , 
            "SELECT users.*,groups.name AS groupName,groups.code,groups.id AS groupId FROM users LEFT JOIN groups ON users.group_id=groups.id WHERE users.id='$id';"
            );
            return $query;
         }
         public function fetchByGroup($id)
         {
            $query = mysqli_query($this->con , "SELECT id,name FROM users WHERE group_id='$id'"
            );
            return $query;
         }
         


    }

?>