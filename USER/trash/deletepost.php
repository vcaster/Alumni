<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login();?>

 <?php 
    if(isset($_POST["Submit"])){
$deleteid1 = $_GET['deleteid'];
$Title=mysqli_real_escape_string($conn,$_POST["Title"]);
$Category=mysqli_real_escape_string($conn,$_POST["Category"]);
$Post=mysqli_real_escape_string($conn,$_POST["Post"]);
date_default_timezone_set("Africa/Lagos");
$CurrentTime=time();
//$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
$DateTime;
$Admin="AINA NIRAN";
$Image=$_FILES["Image"]["name"];
$Target="Uploaded/".basename($_FILES["Image"]["name"]);

	global $conn;
        
        $sql9="DELETE FROM admin_panel WHERE id='$deleteid1'";
        $Execute = mysqli_query($conn,$sql9);
  
	if($Execute){
	$_SESSION["SuccessMessage"]="Post Deleted Successfully";
	redirect("admindashboard.php");
 	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	redirect("admindashboard.php");
		
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
    	<h2>Delete Post</h2>
        <div></div>
        <?php 
            
//            $update_record = $_GET['updateid'];   
            $deleteid1 = $_GET['deleteid'];
            global $conn;
            $sql9="SELECT * FROM admin_panel WHERE id='$deleteid1'";
            $Execute1 = mysqli_query($conn,$sql9);

while($DataRows = mysqli_fetch_array($Execute1,MYSQLI_ASSOC)){             
	$Id=$DataRows["id"];
	$DateTime=$DataRows["datetime"];
	$Title=$DataRows["title"];
	$Category=$DataRows["category"];
	$Admin=$DataRows["author"];
	$Image=$DataRows["image"];
	$Post=$DataRows["post"];


}   
        ?>
          <div>
            <form action="deletepost.php?deleteid=<?php echo $deleteid1; ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                    <div class="form-group">
                    <label for="title"><span class="FieldInfo">Title:</span></label>
                    <input disabled class="form-control" type="text" name="Title" id="title" value="<?php echo $Title; ?>" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <span class="FieldInfo">Category now : <?php echo $Category; ?></span>
                        <br>
                    <label for="categoryselect"><span class="FieldInfo">Category:</span></label>
                    <select disabled class=" form-control" id="categoryselect" name="Category" >
                    <?php
                    global $conn;
                    $sql3="SELECT * FROM category ORDER BY id desc";
                    $Execute = mysqli_query($conn,$sql3);
                    while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
                            $Id=$DataRows["id"];
                            $CategoryName=$DataRows["name"];
                    ?>	
                    <option><?php echo $CategoryName; ?></option>
                    <?php } ?>

                    </select>
                    </div>
                    <div class="form-group">
                    <label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
                    <br><span class="FieldInfo">Image present :</span> <img src="Uploaded/<?php echo $Image; ?> " width="200"  height="50">
                        <br>
                    <input disabled type="File" class="form-control"  name="Image" id="imageselect">
                    </div>
                    <div class="form-group">
                    <label for="postarea"><span class="FieldInfo">Post:</span></label>
                    <textarea disabled class="form-control " name="Post" id="postarea"><?php echo $Post; ?></textarea>
                    <br>
            <input class="btn btn-danger btn-block" type="Submit" name="Submit" value="Delete Post"> 
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

      

              
