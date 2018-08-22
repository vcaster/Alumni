<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php
if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $conn;
   // $Admin=$_SESSION["Username"];
$sql="UPDATE transcriptsreq SET category='1' WHERE id='$IdFromURL' ";
$Execute = mysqli_query($conn,$sql);
if($Execute){
	$_SESSION["SuccessMessage"]="Transcript Awaiting submission";
        redirect("transcriptreq.php");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
        redirect("transcriptreq.php");
		
	}
   
}

?>