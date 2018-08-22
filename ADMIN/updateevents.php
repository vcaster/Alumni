<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login();?>

 <?php 
    if(isset($_POST["Submit"])){
                $updateid1 = $_GET['updateid'];
                $Surname=mysqli_real_escape_string($conn,$_POST["Surname"]);
                $Firstname=mysqli_real_escape_string($conn,$_POST["Firstname"]);
                $Middlename=mysqli_real_escape_string($conn,$_POST["Middlename"]);
                $Email=mysqli_real_escape_string($conn,$_POST["Email"]);
                $Address=mysqli_real_escape_string($conn,$_POST["Address"]);
                $Matric=mysqli_real_escape_string($conn,$_POST["Matric"]);

                date_default_timezone_set("Africa/Lagos");
                $CurrentTime=time();
                //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
                $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
                $DateTime;
                $Admin=$_SESSION['User_Username'];

                if(empty($Surname) || empty($Firstname) || empty($Middlename) || empty($Email) || empty($Address) || empty($Matric)){
                        $_SESSION["ErrorMessage"]="some fields are empty";
                        redirect("updatealumni.php");

                }elseif(strlen($Email)<2){
                        $_SESSION["ErrorMessage"]="Title Should be at-least 2 Characters";
                        redirect("updatealumni.php");

                }else{ 
                        global $conn;

                        $sql="UPDATE info SET surname = '$Surname' , firstname = '$Firstname' , middlename = '$Middlename', email = '$Email', address = '$Address', matric = '$Matric' WHERE id = '$updateid1' ";
                        $Execute = mysqli_query($conn,$sql);
                        if($Execute){
                        $_SESSION["SuccessMessage"]="Alumni Updated Successfully";
                        redirect("admindashboard.php");
                        }else{
                        $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
                        redirect("admindashboard.php");

                        }

                    }
                    
                    //redirect("icons.php");

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
    	<h2>Update Alumnus</h2>
        <div></div>
        <?php 
            
//            $update_record = $_GET['updateid'];   
            $updateid1 = $_GET['updateid'];
            global $conn;
            $sql9="SELECT * FROM info WHERE id='$updateid1'";
            $Execute1 = mysqli_query($conn,$sql9);

while($DataRows = mysqli_fetch_array($Execute1,MYSQLI_ASSOC)){             
	$Id=$DataRows["id"];
	$Surname=$DataRows["surname"];
	$Firstname=$DataRows["firstname"];
	$Middlename=$DataRows["middlename"];
	$Email=$DataRows["email"];
	$Address=$DataRows["address"];
	$Matric=$DataRows["matric"];


}   
        ?>
          <div>
              <form action="updateevents.php?updateid=<?php echo $updateid1; ?>" method="post">
                    <fieldset>
                    <div class="form-group">
                    <label for="surname"><span class="FieldInfo">Surname:</span></label>
                    <input  class="form-control" type="text" name="Surname" id="surname" value="<?php echo $Surname; ?>" placeholder="Surname...">
                    </div>
 
                    <div class="form-group">
                    <label for="title"><span class="FieldInfo">Title:</span></label>
                    <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
                    </div>
                    <label class="pull-left" style="margin-left: 0%;">Date of Event :</label>
                <br>
                <label class="pull-left" style="margin-left: 0%;">DD/MM/YYYY:</label>
                               
                            <select class="pull-left form-control center-block"  id="d" name='d'  style="width: 10%; margin-right: 5px;">
                                <?php $day  = 0; 
                                            while($day < 31) 
                                            {
                                                $day++
                                               ?>
                                  <option><?php echo $day; ?></option>
                                  <?php } ?>
                            </select>
                              
                             <select class="pull-left form-control center-block"  id="m" name='m' style="width: 10%; margin-right: 5px;">
                                <?php $mon  = 0; 
                                            while($mon < 12) 
                                            {
                                                $mon++
                                               ?>
                                  <option><?php echo $mon; ?></option>
                                  <?php } ?>
                            </select>
                              
                              <select class="pull-left form-control center-block"  id="y" name='y' style="width: 10%; margin-right: 5px;" >
                                <?php $yearr  = 2017; 
                                            while($yearr < 2025) 
                                            {
                                                $yearr++
                                               ?>
                                  <option><?php echo $yearr; ?></option>
                                  <?php } ?>
                            </select>
                    <br><br>
                    <label for="occur"><span class="FieldInfo ">Occurance:</span></label>
                    <input class="form-control" style="width: 51%;" type="number" name="occur" id="occur" placeholder="Occurance">
                    <br>
                    <input class="btn btn-success" type="Submit" name="Submit" value="Update Alumni"> 

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

  
           