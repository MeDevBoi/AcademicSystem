<?php
    class db{
        protected $con;
        function __construct()
        {
            $this->con = mysqli_connect('localhost','root','','academic_management');
            // if (mysqli_connect_errno())
            // {
            //  echo "Failed to connect to MySQL: " . mysqli_connect_error();
            // }else{
            //     echo "connection success";
            // }
       }
}

?>