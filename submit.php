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
                
        $sql = "INSERT INTO info(surname, firstname, middlename, email, address, matric, password, category) VALUES ('$surname','$firstname','$middlename','$email','$address','$matric', '$password', '$category')";
        
        $Execute = mysqli_query($conn,$sql);
        
        if($Execute){
            $result = 1;
        }
        echo $result;
//    }
        
        
?>