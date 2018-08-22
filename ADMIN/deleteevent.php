<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php
if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $conn;
    //$Admin=$_SESSION["Username"];
    $sql9="UPDATE events SET status = '0' WHERE id='$IdFromURL'";

$Execute = mysqli_query($conn,$sql9);
if($Execute){
	$_SESSION["SuccessMessage"]="Event Deleted Successfully";
        redirect("calendaradmin.php");
	}else{
//            $error = mysqli_errno($Execute,$sql);
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
        redirect("calendaradmin.php");
		
	}
   
}

?>