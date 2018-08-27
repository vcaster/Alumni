<?php
//        $database = "alumni_cms";
//        $conn= mysqli_connect('localhost', 'root', '',$database);
//ini_set(max_execution_time, 300);
//               
//        $sql5=$conn->query("SELECT * FROM biodata WHERE currentLevel ='400'");
//        
//            
//            while($DataRows = $sql5->fetch_array()){
//                
//                $password = 'caleb';
//                $hashed = password_hash($password, PASSWORD_DEFAULT);
//                $sess= $DataRows["session"];
//                if ($sess == "2014/2015"){
//                    $gradyear = '2015';
//                }
//                else if ($sess == "2015/2016"){
//                    $gradyear = '2016';
//                }
//                else if ($sess == "2016/2017"){
//                    $gradyear = '2017';
//                }  
//                else if ($sess == "2017/2018"){
//                    $gradyear = '2018';
//                }
//                else
//                {
//                    $gradyear = '';
//                }
//            $surName=$DataRows["surName"];
//            $firstName=$DataRows["firstName"];
//            $middleName=$DataRows["middleName"];
//            $studentEmail=$DataRows["studentEmail"];   
//            $sponsorAddress=$DataRows["sponsorAddress"];
//            $dob=$DataRows["dob"];
//            $studentMobile=$DataRows["studentMobile"];
//            $course=$DataRows["course"];
//            $programme=$DataRows["programme"];
//            $matricNo=$DataRows["matricNo"];
//                $sql=$conn->query("INSERT INTO biodata400(surname, firstname, middlename, email, address, matric, DOB, phoneno, department, degree, gradyear, password, category, var) VALUES('$surName','$firstName','$middleName' , '$studentEmail' , '$sponsorAddress','$matricNo', '$dob', '$studentMobile', '$course', '$programme','$gradyear', '$hashed', '1','1' )");
//            }   
//$database = "alumni_cms";
//        $conn= mysqli_connect('localhost', 'root', '',$database);
//ini_set('max_execution_time', 300);
//               
//           
//for($i=1; $i <= 1500; $i++){
//    
//    $sql=$conn->query("INSERT INTO dues(status) VALUES('NOT PAYED')");
//}
//            $i = 1500;
//            $a=1;
//            while($a < $i){              
//               
//                
//                //echo $a;
//                $a++;
//            }   
        
$database = "alumni_cms";
        $conn= mysqli_connect('localhost', 'root', '',$database);
ini_set('max_execution_time', 300);
//               
//           
//for($i=1; $i <= 1500; $i++){
//    
//    $sql=$conn->query("UPDATE dues SET user_id ='$i' WHERE id = '$i'");
//    
//}         
    $reference = 'sdf3r4wsc';
            echo $url = "https://api.paystack.co/transaction/verify/{$reference}"

?>