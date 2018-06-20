<?php require_once('db.php'); ?>
<?php require_once("Sessions.php"); ?>
<?php
    function redirect($New_Location){
        
        header("Location:".$New_Location);
        exit();
    }
    
    function Loginadmin($Username,$Password){
    global $conn;
    $sql="SELECT * FROM admin
    WHERE username='$Username' AND password='$Password'";
    $Execute=mysqli_query($conn,$sql);
    if($admin= mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
	return $admin;
    }else{
	return null;
    }
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
 function Confirm_User(){
    if(Logincheckadmin()){
        
        if($_SESSION['User_Cat'] != 1){
            redirect("404.php");
        }
	
    }
 }
 
?>

