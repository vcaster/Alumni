<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php 
    if(isset($_POST["Submit"])){
    $Category = mysqli_real_escape_string($conn,$_POST["Category"]);
    date_default_timezone_set("Africa/Lagos");
    $CurrentTime=time();
    //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;
    $admin = "AINA NIRAN";
    if(empty($Category)){
        $_SESSION["ErrorMessage"]="All Fields must be filled out";
        redirect("categories.php");
        //exit;
//	
//	Redirect_to("categories.php");
    }
    elseif(strlen($Category)>99){
	$_SESSION["ErrorMessage"]="Name Too long for Category";
	redirect("Categories.php");
	
    }else{
	global $conn;
	$sql="INSERT INTO category(datetime,name,creatorname)
	VALUES('$DateTime','$Category','$admin')";
	$Execute = mysqli_query($conn,$sql);
	if($Execute){
	$_SESSION["SuccessMessage"]="Category Added Successfully";
	redirect("Categories.php");
	}else{
	$_SESSION["ErrorMessage"]="Category failed to Add";
	redirect("Categories.php");
		
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
    	<h2>Categories</h2>
        <div><?php echo Message();
                   echo SuccessMessage();
                ?></div>
        <div>
                            <form action="categories.php" method="post">
                            <fieldset>
                            <div class="form-group">
                            <label for="categoryname"><span class="FieldInfo">Name:</span></label>
                            <input class="form-control" type="text" name="Category" id="categoryname" placeholder="Name">
                            </div>
                            <br>
                    <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Category">
                            </fieldset>
                            <br>
                    </form>
        </div>
            <div class="table-responsive">
                        <table class="table table-striped table-hover">
                        <tr>
                                <th>S/N</th>
                                <th>Date & Time</th>
                                <th>Category Name</th>
                                <th>Creator Name</th>
                                <!--<th>Action</th>-->

                        </tr>
                <?php
                global $conn;
                $sql1="SELECT * FROM category ORDER BY id desc";
                $Execute = mysqli_query($conn,$sql1);
                $SrNo=0;
                while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
                        $Id=$DataRows["id"];
                        $DateTime=$DataRows["datetime"];
                        $CategoryName=$DataRows["name"];
                        $CreatorName=$DataRows["creatorname"];
                        $SrNo++;

                ?>
                <tr>
                        <td><?php echo $SrNo; ?></td>
                        <td><?php echo $DateTime; ?></td>
                        <td><?php echo $CategoryName; ?></td>
                        <td><?php echo $CreatorName; ?></td>
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

              
