<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login();?>

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
    	
        <div><?php echo Message();
                   echo SuccessMessage();
                ?></div>
     <h2>Un-Approved Comments</h2>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
	<tr>
	<th>No.</th>
	<th>Name</th>
	<th>Date & time</th>
	<th>Comment</th>
	<th>Approve</th>
	<th>Delete Comment</th>
        <th>View</th>
	<th>Added by</th>
	</tr>
<?php
$conn;
$sql="SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
$Execute = mysqli_query($conn,$sql);
$SrNo=0;
while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
	$CommentId=$DataRows['id'];
	$DateTimeofComment=$DataRows['datetime'];
	$PersonName=$DataRows['name'];
	$PersonComment=$DataRows['comments'];
	$CommentedPostId=$DataRows['admin_panel_id'];
        $Addedby=$DataRows['addedby'];
	$SrNo++;

if(strlen($PersonComment) >15) { $PersonComment = substr($PersonComment, 0, 15).'...';}
if(strlen($PersonName) >10) { $PersonName = substr($PersonName, 0, 10).'...';}
if(strlen($DateTimeofComment)>12){$DateTimeofComment=substr($DateTimeofComment,0,12).'...';}		


?>
<tr>
	<td><?php echo htmlentities($SrNo); ?></td>
	<td><?php echo htmlentities($PersonName); ?></td>
	<td><?php echo htmlentities($DateTimeofComment); ?></td>
	<td><?php echo htmlentities($PersonComment); ?></td>
	<td><a href="approve.php?id=<?php echo $CommentId ?>">
                <span class="btn btn-success"><span class="fa fa-check"></span></span></a></td>
                <td><a href="deletecomment.php?id=<?php echo $CommentId ?>">
                <span class="btn btn-danger"><span class="fa fa-close"></span></span></a></td>
	<td><a href="fullpost.php?id=<?php echo $CommentedPostId ?>" target="_blank">
                <span class="btn btn-primary"><span class="fa fa-newspaper-o"></span></span></a></td>
                <td><?php echo htmlentities($Addedby); ?></td>       
                
</tr>
<?php } ?>			
			
			
		</table>
	</div>
     
	    <h2>Approved Comments</h2>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
	<tr>
	<th>No.</th>
	<th>Name</th>
	<th>Date & Time</th>
	<th>Comment</th>
	<!--<th>Approved By</th>-->
	<th>Revert Approval </th>
	<th>Delete Comment</th>
        <th>View</th>
	<th>Added By</th>
	</tr>
<?php
$conn;
$sql="SELECT * FROM comments WHERE status='ON' ORDER BY id desc";
$Execute = mysqli_query($conn,$sql);
$SrNo=0;
while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
	$CommentId=$DataRows['id'];
	$DateTimeofComment=$DataRows['datetime'];
	$PersonName=$DataRows['name'];
	$PersonComment=$DataRows['comments'];
	$CommentedPostId=$DataRows['admin_panel_id'];
        $Addedby=$DataRows['addedby'];
	$SrNo++;
if(strlen($PersonComment) >15) { $PersonComment = substr($PersonComment, 0, 15).'...';}
if(strlen($PersonName) >10) { $PersonName = substr($PersonName, 0, 10).'...';}
if(strlen($DateTimeofComment)>12){$DateTimeofComment=substr($DateTimeofComment,0,12).'...';}	


?>

<tr>
	<td><?php echo htmlentities($SrNo); ?></td>
	<td><?php echo htmlentities($PersonName); ?></td>
	<td><?php echo htmlentities($DateTimeofComment); ?></td>
	<td><?php echo htmlentities($PersonComment); ?></td>
	<!--<td><?php // echo htmlentities($ApprovedBy); ?></td>-->
	<td><a href="disapprove.php?id=<?php echo $CommentId ?>">
                <span class="btn btn-warning"><span class="fa fa-check"></span></span></a></td>
                <td><a href="deletecomment.php?id=<?php echo $CommentId ?>">
                <span class="btn btn-danger"><span class="fa fa-close"></span></span></a></td>
	<td><a href="fullpost.php?id=<?php echo $CommentId ?>" target="_blank">
                <span class="btn btn-primary"><span class="fa fa-newspaper-o"></span></span></a></td>
        <td><?php echo htmlentities($Addedby); ?></td> 
</tr>
    <?php } ?>		</table>
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

              
