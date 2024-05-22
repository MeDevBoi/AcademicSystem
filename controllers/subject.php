<?php
    // include('connection/connection.php');
    include('controllers/group.php');

    class subject extends db{

         public function add($groupId , $lecturerId , $name, $code)
         {
            $query = mysqli_query($this->con , "INSERT INTO `subjects`(`group_id`, `lecturer_id` ,`name`,`code`) 
            VALUES ('$groupId','$lecturerId','$name','$code')");
            return $query;
         }
         public function fetch()
         {
            $query = mysqli_query($this->con , 
             "SELECT subjects.*,groups.name AS groupName,groups.code AS groupCode,users.name As lecturerName FROM `subjects` LEFT JOIN users ON subjects.lecturer_id=users.id LEFT JOIN groups ON users.group_id=groups.id"
            );
            return $query;
         }
         public function edit($id ,$groupId, $lecturerId , $name, $code)
         {
            $query = mysqli_query($this->con , "UPDATE `subjects` SET `group_id`='$groupId',lecturer_id='$lecturerId',`name`='$name',`code`='$code' WHERE id='$id'");
            return $query;
         }
        
         public function delete($id)
         {
             mysqli_query($this->con , "DELETE FROM subjects WHERE id = '$id'");
         }
         public function getGroup()
         {
           $obj = new group();
           return $obj->fetch();
         }
       
        
         public function fetchbyId($id)
         {
            $query = mysqli_query($this->con , 
             "SELECT subjects.*,groups.name AS groupName,groups.code AS groupCode,users.name As lecturerName FROM `subjects` LEFT JOIN users ON subjects.lecturer_id=users.id LEFT JOIN groups ON users.group_id=groups.id WHERE subjects.id='$id'"
            );
            return $query;
         }
         public function fetchByGroup($id)
         {
            $query = mysqli_query($this->con , 
             "SELECT id,name,code FROM `subjects`  WHERE group_id='$id'"
            );
            return $query;
         }

    }

?>