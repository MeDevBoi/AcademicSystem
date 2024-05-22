<?php
	include('controllers/student.php');
    
    $id = $_GET['id'];
    $obj = new student(); 
    if(isset($id))
    {
        $obj->delete($id);
        echo "<script>location.href='pending-student.php'</script>";
    }
?>