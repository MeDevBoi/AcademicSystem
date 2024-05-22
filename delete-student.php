<?php
	include('controllers/student.php');
    
    $id = $_GET['id'];
    $obj = new student(); 
    if(isset($id))
    {
        $obj->deleteStudent($id);
        echo "<script>location.href='view-student.php'</script>";
    }
?>