<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php //Confirm_Login();?>
<?php

        
    if(isset($_POST["Submit"])){
$Username=mysqli_real_escape_string($conn,$_POST["username"]);
$Password=mysqli_real_escape_string($conn,$_POST["Password"]);
$Passwordcon=mysqli_real_escape_string($conn,$_POST["Passwordcon"]);
$Passwordh=password_hash($Passwordcon, PASSWORD_DEFAULT);
date_default_timezone_set("Africa/Lagos");
$CurrentTime=time();
$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
//$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
$DateTime;
$admincat = 7;
$Admin=$_SESSION['User_Username'];
if(empty($Username) || empty($Password) || empty($Passwordcon) ){
	$_SESSION["ErrorMessage"]="All field must be Filled";
	redirect("admins.php");
	
}elseif(strlen($Password) < 5){
	$_SESSION["ErrorMessage"]="Make a stronger Password\. at least five characters";
	redirect("admins.php");
}
elseif(strlen($Username) < 5){
	$_SESSION["ErrorMessage"]="Make a stronger Username\.";
	redirect("admins.php");
}
 elseif($Password != $Passwordcon){
	$_SESSION["ErrorMessage"]="Make a stronger Username/Password";
	redirect("admins.php");
	
}else{
	global $conn;
	$sql = "INSERT INTO info(email,password,addedby,datetime)
	VALUES('$Username','$Passwordh','$Admin','$DateTime')";
	$Execute = mysqli_query($conn,$sql);
	if($Execute){
	$_SESSION["SuccessMessage"]="Admin Added Successfully";
	redirect("admins.php");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	redirect("admins.php");
		
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
    	<h2>Add Admins</h2>
        <div><?php echo Message();
                   echo SuccessMessage();
                ?></div>
        <div>
          
            <form action="admins.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                    <div class="form-group">
                    <label  for="username"><span class="FieldInfo ">Username</span></label>
                    <input style="width: 50%" class="form-control " type="text" name="username" id="username" placeholder="username">
                    </div>
                    
                    <div class="form-group">
                    <label for="password"><span class="FieldInfo clearfix">Password:</span></label>
                    <input style="width: 50%" class="form-control " type="Password" name="Password" id="Password" placeholder="Create Password" >
                    </div>
                    
                    <div class="form-group">
                        
                        <input style="width: 50%" class="form-control " type="Password" name="Passwordcon" id="Passwordcon" placeholder="Confirm Password">
                    </div>
                    
                    <br>
            <input class="btn btn-success " type="Submit" name="Submit" value="Add Admin">
                    </fieldset>
                    <br>
            </form>
            </div>
        <h2>Manage Admins</h2>
         <div class="table-responsive">
                        <table class="table table-striped table-hover">
                        <tr>
                                <th>S/N</th>
                                <th>Date & Time</th>
                                <th>Admin Name</th>
                                <th>Added by</th>
                                <!--<th>Action</th>-->

                        </tr>
                <?php
                global $conn;
                $sql1="SELECT * FROM info WHERE category = '0' ORDER BY id desc ";
                $Execute = mysqli_query($conn,$sql1);
                $SrNo=0;
                while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
                        $Id=$DataRows["id"];
                        $Username=$DataRows["email"];
                        $Addedby=$DataRows["addedby"];
                        $DateTime=$DataRows["datetime"];
                        $SrNo++;

                ?>
                <tr>
                        <td><?php echo $SrNo; ?></td>
                        <td><?php echo $DateTime; ?></td>
                        <td><?php echo $Username; ?></td>
                        <td><?php echo $Addedby; ?></td>
<!--                        <td><a href="DeleteCategory.php?id=<?php echo $Id;?>">
                        <span class="btn btn-danger">Delete</span>
                        </a></td>-->

                </tr>

                        <?php } ?>	
                        </table>
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

              
