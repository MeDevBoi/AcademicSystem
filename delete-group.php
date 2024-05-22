<?php
	include('controllers/group.php');
    
    $id = $_GET['id'];
    $obj = new group(); 
    if(isset($id))
    {
        $obj->delete($id);
        echo "<script>location.href='manage-group.php'</script>";
    }
?>