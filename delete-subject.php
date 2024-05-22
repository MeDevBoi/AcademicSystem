<?php
	include('controllers/subject.php');
    
    $id = $_GET['id'];
    $obj = new subject(); 
    if(isset($id))
    {
        $obj->delete($id);
        echo "<script>location.href='manage-subject.php'</script>";
    }
?>