<?php
	include('controllers/lecturer.php');
    
    $id = $_GET['id'];
    $obj = new lecturer(); 
    if(isset($id))
    {
        $obj->delete($id);
        echo "<script>location.href='manage-lecturer.php'</script>";
    }
?>