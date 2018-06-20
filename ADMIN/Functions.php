<?php require_once('db.php'); ?>
<?php require_once("Sessions.php"); ?>
<?php
    function redirect($New_Location){
        
        header("Location:".$New_Location);
        exit();
    }
    
    
    
      function Loginuser($Username1,$Password1){
    global $conn;
    
    $sql3="SELECT * FROM info
    WHERE email='$Username1' AND password='$Password1'";
    $Execute3=mysqli_query($conn,$sql3);
    if($user= mysqli_fetch_array($Execute3,MYSQLI_ASSOC)){
	return $user;
    }else{
	return null;
    }
    }
    function Logincheck(){
    if(isset($_SESSION["User_id"])){
	return true;
    }
    }
    function Logincheckadmin(){
    if(isset($_SESSION["User_Cat"])){
	return true;
    }
    }

 function Confirm_Login(){
    if(!Logincheck()){
	$_SESSION["ErrorMessage"]="Login Required ! ";
	redirect("../index.php");
    }
    
 }
 function Confirm_Admin(){
    if(Logincheckadmin()){
        
        if($_SESSION['User_Cat'] == 1){
            redirect("404.php");
        }
	
    }
 }  
 
?>

