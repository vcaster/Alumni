<?php
//    if(isset($_POST['SubmitReg'])){
        $database = "alumni_cms";
        $conn= mysqli_connect('localhost', 'root', '',$database);
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $matric = $_POST['matric'];
        $password = $_POST['password'];
        $category = $_POST['category'];
        $phoneno = $_POST['phoneno'];
        $grad = $_POST['grad'];
        $dept = $_POST['dept'];
        $emp = $_POST['emp'];
        $deg = $_POST['deg'];
        $occu = $_POST['occu'];
        $d = $_POST['d'];
        $m = $_POST['m'];
        $y = $_POST['y'];
        
        
        
        $dob = $y.'-'.$m.'-'.$d;       
        $sql = "INSERT INTO info(surname, firstname, middlename, email, address, matric, DOB, phoneno, department, degree, gradyear, emp_status, occup, password, category) VALUES ('$surname','$firstname','$middlename','$email','$address','$matric', '$dob', '$phoneno', '$dept', '$deg', '$grad', '$emp', '$occu', '$password', '$category')";
        
        $Execute = mysqli_query($conn,$sql);
        
        if($Execute){
            $result = 1;
        }
        echo $result;
//    }
        
        
?>