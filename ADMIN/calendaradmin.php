<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login();?>
<?php 
    if(isset($_POST["Submit"])){
$Title=mysqli_real_escape_string($conn,$_POST["Title"]);
$Category=mysqli_real_escape_string($conn,$_POST["Category"]);
$Post=mysqli_real_escape_string($conn,$_POST["Post"]);
date_default_timezone_set("Africa/Lagos");
$CurrentTime=time();
//$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
$DateTime;
$Admin=$_SESSION['User_Username'];
$Image=$_FILES["Image"]["name"];
$Target="Uploaded/".basename($_FILES["Image"]["name"]);
if(empty($Title)){
	$_SESSION["ErrorMessage"]="Title can't be empty";
	redirect("addnewpost.php");
	
}elseif(strlen($Title)<2){
	$_SESSION["ErrorMessage"]="Title Should be at-least 2 Characters";
	redirect("addnewpost.php");
	
}else{
	global $conn;
	$sql="INSERT INTO admin_panel(datetime,title,category,author,image,post)
	VALUES('$DateTime','$Title','$Category','$Admin','$Image','$Post')";
	$Execute = mysqli_query($conn,$sql);
        move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
	if($Execute){
	$_SESSION["SuccessMessage"]="Post Added Successfully";
	redirect("addnewpost.php");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	redirect("addnewpost.php");
		
	}
	
    }	
	
}
	


?>
<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
		<?php include("headermain.php") ?>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
    <div class="cols-grids panel-widget">
    	<h2>Add New Post</h2>
        <div><?php echo Message();
                   echo SuccessMessage();
                ?></div>
        <div>
            <form action="addnewpost.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                    <div class="form-group">
                    <label for="title"><span class="FieldInfo">Title:</span></label>
                    <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
                    </div>
                    <br>
            <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Post">
                    </fieldset>
                    <br>
            </form>
            </div>
	 </div>	
        <br>
<br>
<br>
<br>
<br>


</div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include("copyright.php") ?>	
<!--COPY rights end here-->
</div>
<!--slider menu-->
    <?php include("sidenav.php") ?>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>

              
