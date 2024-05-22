<?php
    // include('connection/connection.php');
    include('controllers/group.php');

    class student extends db{

        public function pendingStudent()
        {
           return  mysqli_query($this->con , "SELECT * FROM users  WHERE role='student' AND status='pending'");
        }
        public function assignedStudent()
        {
          return  $query = mysqli_query($this->con, 
           'SELECT students.id, groups.name AS groupName , groups.code AS groupCode, subjects.name AS subjectName,subjects.code AS subjectCode,users.name AS studentName FROM `students` LEFT JOIN users ON students.student_id=users.id
           LEFT JOIN subjects ON students.subject_id=subjects.id LEFT JOIN groups ON students.group_id=groups.id; '
         );
        }
        public function studentGrade($id)
        {
          return  $query = mysqli_query($this->con, 
           "SELECT students.id,students.grade, groups.name AS groupName , groups.code AS groupCode, subjects.name AS subjectName,subjects.code AS subjectCode,users.name AS studentName FROM `students` LEFT JOIN users ON students.student_id=users.id
           LEFT JOIN subjects ON students.subject_id=subjects.id LEFT JOIN groups ON students.group_id=groups.id WHERE students.lecturer_id='$id' "
         );
        }
        public function studentbyId($id)
        {
          return  $query = mysqli_query($this->con, 
           "SELECT students.id,students.grade, groups.name AS groupName , groups.code AS groupCode, subjects.name AS subjectName,subjects.code AS subjectCode,users.name AS LecturerName FROM `students` LEFT JOIN users ON students.student_id=users.id
           LEFT JOIN subjects ON students.subject_id=subjects.id LEFT JOIN groups ON students.group_id=groups.id WHERE students.student_id='$id' "
         );
        }
        // public function pendingStudent()
        // {
        //    return  mysqli_query($this->con , "SELECT users.*,groups.name AS groupName , groups.code AS groupCode FROM users LEFT JOIN groups ON users.group_id=groups.id  WHERE users.role='student' AND users.status='pending'");
        // }
        public function add($group , $lecturer , $subject , $studends )
        {
            foreach($studends as $student)
            {
               $query = mysqli_query($this->con , "INSERT INTO `students`(`group_id`, `lecturer_id`, `subject_id`, `student_id`) 
                VALUES ('$group','$lecturer','$subject','$student')");

            }
            return $query;
        }
         public function delete($id)
         {
             mysqli_query($this->con , "DELETE FROM users WHERE id = '$id'");
         }
         public function deleteStudent($id)
         {
             mysqli_query($this->con , "DELETE FROM students WHERE id = '$id'");
         }
         public function getGroup()
         {
           $obj = new group();
           return $obj->fetch();
         }
         public function groupId($id)
         {
            $obj = new group();
            return $obj->groupById($id);
         }
       
        
         public function fetchbyId($id)
         {
            $query = mysqli_query($this->con , 
             "SELECT subjects.*,groups.name AS groupName,groups.code AS groupCode,users.name As lecturerName FROM `subjects` LEFT JOIN users ON subjects.lecturer_id=users.id LEFT JOIN groups ON users.group_id=groups.id WHERE subjects.id='$id'"
            );
            return $query;
         }
         public function studentByGroup($id)
         {
            $query = mysqli_query($this->con ,"SELECT students.student_id AS id,users.name FROM students 
            LEFT JOIN users ON students.student_id=users.id WHERE students.group_id='$id'
            ");
            return $query;
         }
         public function assignGrade($group, $student,$subject , $grade)
         {
          return  mysqli_query($this->con , "UPDATE students SET grade='$grade' WHERE group_id='$group' AND student_id='$student' AND subject_id='$subject'");

         }

    }

?>