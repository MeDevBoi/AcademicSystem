<?php
	include('controllers/subject.php');


    $id = $_GET['id'];
    $obj = new subject();

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