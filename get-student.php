<?php
	include('controllers/student.php');
     session_start();
    $obj = new student(); // class object

    $id = $_SESSION['group'];
    $query = $obj->studentByGroup($id);
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