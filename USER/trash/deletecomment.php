<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php
if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $conn;
    //$Admin=$_SESSION["Username"];
    $sql9="DELETE FROM comments WHERE id='$IdFromURL'";

$Execute = mysqli_query($conn,$sql9);
if($Execute){
	$_SESSION["SuccessMessage"]="Comment Deleted Successfully";
        redirect("comments.php");
	}else{
//            $error = mysqli_errno($Execute,$sql);
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
        redirect("comments.php");
		
	}
   
}

?>