<?php
	include('controllers/lecturer.php');

    $obj = new lecturer(); // class object

    $id = $_GET['id'];
    $query = $obj->fetchByGroup($id);
    $list = array();
    while($data = mysqli_fetch_assoc($query))
    {
        $list[] = array(
            'id'=>$data['id'],
            'name'=>$data['name'],
        );
    }
    echo json_encode($list);

?>