<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php
if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $conn;
    $Admin=$_SESSION["Username"];
$sql="UPDATE comments SET status='ON'WHERE id='$IdFromURL' ";
$Execute = mysqli_query($conn,$sql);
if($Execute){
	$_SESSION["SuccessMessage"]="Comment Approved Successfully";
        redirect("comments.php");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
        redirect("comments.php");
		
	}
   
}

?>