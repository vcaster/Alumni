<?php
        $database = "alumni_cms";
        $conn= mysqli_connect('localhost', 'root', '',$database);
ini_set('max_execution_time', 300);
               
     $input = 'caleb';
     $dd = '$2y$10$wYGpfKKW1/qek';
     $in =     password_hash($input, PASSWORD_DEFAULT);
    // echo $in;
    echo password_verify($input, '$2y$10$hHzVMFiVzuHYRitHdTg1UusCQf0yJedNlj8fnsEafYd3ZLzsD2mjO');
          
?>