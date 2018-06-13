

<?php 

//$value = $_POST["sugesstion"];
//echo $value;
     $usernamecorrect = null;
     $passwordcorrect = null;
     $usernamecorrects = null;
     $passwordcorrects = null;
     $username = null;
     $passwordlogin = null;
     $database = "alumni_cms";
     
      $conn= mysqli_connect('localhost', 'root', '',$database);
      $username = $_POST['username'];
      $passwordlogin = $_POST['passwordlogin'];
      
      if(isset($username) && isset($passwordlogin)){
                    
            $sql="SELECT * FROM info WHERE email='$username' AND password = '$passwordlogin'";
            $Execute = mysqli_query($conn,$sql);
        
        while($DataRows = mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
            $usernamecorrect = $DataRows['email'];
            $passwordcorrect = $DataRows['password'];
                 
        }
        $sqlq="SELECT * FROM admin WHERE username='$username' AND password = '$passwordlogin'";
            $Execute1 = mysqli_query($conn,$sqlq);
        
        while($DataRows1 = mysqli_fetch_array($Execute1,MYSQLI_ASSOC)){
            $usernamecorrects = $DataRows1['username'];
            $passwordcorrects = $DataRows1['password'];
                 
        }
        
        
        if (($passwordlogin == $passwordcorrect) && ($username == $usernamecorrect)){
            
              echo "login successful.";
//            $result = 1;
        }
        else if (($passwordlogin == $passwordcorrects) && ($username == $usernamecorrects)){
            
                <?php redirect("ADMIN/admindashboard.php"); ?>
//            $result = 1;
        }
        else{
            echo 'Email or Password is incorrect. Please try again';
        }
//        echo $result;
      }
     
//     $Email = null;
//                $conn= mysqli_connect('localhost', 'root', '',$database);
//                if(isset($_POST['sugesstion'])){
//                    
//                    $Data = $_POST['sugesstion'];
//        $sql="SELECT email FROM alumni_records WHERE email='$Data'";
//
//        $Execute = mysqli_query($conn,$sql);
//        
//        while($DataRows = mysqli_fetch_array($Execute,MYSQLI_ASSOC)){ 
//            
//	$Email = $DataRows['email'];
//        
//        //echo $Email; 
//}
//
//    if ($Data == $Email)
//        {
//            
//            echo  "already in use";
//        }
//        
//    else{
//           echo 'available';
//        }
//                
//        }
//    
?>

