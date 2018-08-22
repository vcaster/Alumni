<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login();?>
<?php 
    if(isset($_POST["Submit"])){
$Title=mysqli_real_escape_string($conn,$_POST["Title"]);
$yeary=mysqli_real_escape_string($conn,$_POST["y"]);
$monthm=mysqli_real_escape_string($conn,$_POST["m"]);
$dayd=mysqli_real_escape_string($conn,$_POST["d"]);
$occuro=mysqli_real_escape_string($conn,$_POST["occur"]);
date_default_timezone_set("Africa/Lagos");
$CurrentTime=time();
$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
//$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
$DateTime;


if(empty($Title)){
	$_SESSION["ErrorMessage"]="Title can't be empty";
	redirect("calendaradmin.php");
	
}elseif(strlen($Title)<2){
	$_SESSION["ErrorMessage"]="Title Should be at-least 2 Characters";
	redirect("calendaradmin.php");
	
}else{
    global $conn;
    $admin=$_SESSION['User_Username'];
        for($i=1; $i <= $occuro; $i++)
        { 
            
            
            $eventd = $yeary.'-'.$monthm.'-'.$dayd;
            $yeary++;
	$sql="INSERT INTO events(title,date,created,modified,status,madeby,is_created)
	VALUES('$Title','$eventd','$DateTime','$DateTime','1','$admin','1')";
	$Execute = mysqli_query($conn,$sql);
        }
	if($Execute){
	$_SESSION["SuccessMessage"]="Event Added Successfully";
	redirect("calendaradmin.php");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	redirect("calendaradmin.php");
	
        }
	
	
    }	
	
}

if(isset($_POST["cal"])){

    redirect("calendar.php");
	
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
    	<h2>Add New Event</h2>
        <div><?php echo Message();
                   echo SuccessMessage();
                ?></div>
        <div>
            <form action="calendaradmin.php" method="post">
                    <fieldset>
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
            <input class="btn btn-success" type="Submit" name="Submit" value="Add New Event">
            <input style="margin-left: 1%; margin-top:0%" id="excel" class="btn btn-primary" type="Submit" name="cal" value="View Calendar">
                    </fieldset>
                    <br>
            </form>
            <h2>Recent Events</h2>
            <table class="table table-striped table-hover">
	<tr>
	<th>No.</th>
        <th>Title</th>
	<th>Date</th>
	<th>Created By</th>
	<th>Delete</th>
	</tr>
<?php
$conn;
$sql="SELECT * FROM events WHERE is_created='1' AND status='1' ORDER BY id desc";
$Execute = mysqli_query($conn,$sql);
$SrNo=0;
while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
	$eventId=$DataRows['id'];
	$DateTimeofeve=$DataRows['date'];
	$title=$DataRows['title'];
        $madeby = $DataRows['madeby'];        
	$SrNo++;
//
//if(strlen($PersonComment) >15) { $PersonComment = substr($PersonComment, 0, 15).'...';}
//if(strlen($PersonName) >10) { $PersonName = substr($PersonName, 0, 10).'...';}
//if(strlen($DateTimeofComment)>12){$DateTimeofComment=substr($DateTimeofComment,0,12).'...';}		


?>
<tr>
	<td><?php echo htmlentities($SrNo); ?></td>
	<td><?php echo htmlentities($title); ?></td>
	<td><?php echo htmlentities($DateTimeofeve); ?></td>
	<td><?php echo htmlentities($madeby); ?></td>
                <td><a href="deleteevent.php?id=<?php echo $eventId ?>">
                <span class="btn btn-danger"><span class="fa fa-minus"></span></span></a></td>
                
        
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

              
