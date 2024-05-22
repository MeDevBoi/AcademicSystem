<?php
    include('connection/connection.php');

   class report extends db{

    public function totalStudents()
    {
        return mysqli_query($this->con, "SELECT COUNT(id) FROM users WHERE role='student'");
    }
    public function totalLecturers()
    {
        return mysqli_query($this->con, "SELECT COUNT(id) FROM users WHERE role='lecturer'");
    }
    public function totalgroups()
    {
        return mysqli_query($this->con, "SELECT COUNT(id) FROM groups");
    }
    public function totalsubjects()
    {
        return mysqli_query($this->con, "SELECT COUNT(id) FROM subjects");
    }

   }

?>