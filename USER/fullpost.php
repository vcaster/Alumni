<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login();?>

<?php 
    if(isset($_POST["Submitcomment"])){
    $Name = mysqli_real_escape_string($conn,$_POST["Name"]);
    $Post = mysqli_real_escape_string($conn,$_POST["Post"]);
    date_default_timezone_set("Africa/Lagos");
    $CurrentTime=time();
    //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;
    $PostId = $_GET['id'];
    $Admin = $_SESSION['User_Username'];
    if(empty($Name) || empty($Post)){
        $_SESSION["ErrorMessage"]="All Fields must be filled out";
        redirect("fullpost.php?id=$PostId");
        //exit;
//	
//	Redirect_to("categories.php");
    }
    elseif(strlen($Category)>500){
	$_SESSION["ErrorMessage"]="Only 500 charaters are allowed";
	redirect("fullpost.php?id=$PostId");
	
    }else{
	global $conn;
	$sql="INSERT INTO comments(datetime,comments,status,admin_panel_id,addedby)
	VALUES('$DateTime','$Post','OFF','$PostId','$Admin')";
	$Execute = mysqli_query($conn,$sql);
	if($Execute){
	$_SESSION["SuccessMessage"]="Comments Added Successfully";
	redirect("fullpost.php?id=$PostId");
	}else{
	$_SESSION["ErrorMessage"]="Category failed to Add";
	redirect("fullpost.php?id=$PostId");
		
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
		<div class="header-main">
            <div class="header-left">
                    <div class="logo-name">
                             <a href="admindashboard.php"> <h1>ADMIN</h1> 
                                 
                              </a> 								
                    </div>
                    <!--search-box-->
                            <div class="search-box">
                                <form action="blogger.php" method="GET">
                                        <input type="text" placeholder="Search..." name="Searchbox" required="">	
                                            <input type="submit" name="Search">					
                                    </form>
                            </div><!--//end-search-box-->
                    <div class="clearfix"> </div>
            </div>
                 <div class="header-right">
                    <div class="profile_details_left"><!--notifications of menu start -->
                        <ul class="nofitications-dropdown">
                        <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                    <div class="notification_header">
                                            <h3>You have 3 new messages</h3>
                                    </div>
                            </li>
                            <li><a href="#">
                               <div class="user_img"><img src="images/p4.png" alt=""></div>
                               <div class="notification_desc">
                                    <p>Lorem ipsum dolor</p>
                                    <p><span>1 hour ago</span></p>
                                    </div>
                               <div class="clearfix"></div>	
                            </a></li>
                            <li class="odd"><a href="#">
                                    <div class="user_img"><img src="images/p2.png" alt=""></div>
                               <div class="notification_desc">
                                    <p>Lorem ipsum dolor </p>
                                    <p><span>1 hour ago</span></p>
                                    </div>
                              <div class="clearfix"></div>	
                            </a></li>
                            <li><a href="#">
                               <div class="user_img"><img src="images/p3.png" alt=""></div>
                               <div class="notification_desc">
                                    <p>Lorem ipsum dolor</p>
                                    <p><span>1 hour ago</span></p>
                                    </div>
                               <div class="clearfix"></div>	
                            </a></li>
                            <li>
                                    <div class="notification_bottom">
                                            <a href="#">See all messages</a>
                                    </div> 
                            </li>
                        </ul>
                        </li>
                        <li class="dropdown head-dpdn">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
                        <ul class="dropdown-menu">
                        <li>
                                <div class="notification_header">
                                        <h3>You have 3 new notification</h3>
                                </div>
                        </li>
                        <li><a href="#">
                                <div class="user_img"><img src="images/p5.png" alt=""></div>
                           <div class="notification_desc">
                                <p>Lorem ipsum dolor</p>
                                <p><span>1 hour ago</span></p>
                                </div>
                          <div class="clearfix"></div>	
                         </a></li>
                         <li class="odd"><a href="#">
                                <div class="user_img"><img src="images/p6.png" alt=""></div>
                           <div class="notification_desc">
                                <p>Lorem ipsum dolor</p>
                                <p><span>1 hour ago</span></p>
                                </div>
                           <div class="clearfix"></div>	
                         </a></li>
                         <li><a href="#">
                                <div class="user_img"><img src="images/p7.png" alt=""></div>
                           <div class="notification_desc">
                                <p>Lorem ipsum dolor</p>
                                <p><span>1 hour ago</span></p>
                                </div>
                           <div class="clearfix"></div>	
                         </a></li>
                         <li>
                                <div class="notification_bottom">
                                        <a href="#">See all notifications</a>
                                </div> 
                        </li>
                        </ul>
                        </li>	
                        <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">9</span></a>
                        <ul class="dropdown-menu">
                        <li>
                                <div class="notification_header">
                                        <h3>You have 8 pending task</h3>
                                </div>
                        </li>
                        <li><a href="#">
                                <div class="task-info">
                                        <span class="task-desc">Database update</span><span class="percentage">40%</span>
                                        <div class="clearfix"></div>	
                                </div>
                                <div class="progress progress-striped active">
                                        <div class="bar yellow" style="width:40%;"></div>
                                </div>
                        </a></li>
                        <li><a href="#">
                                <div class="task-info">
                                        <span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
                                   <div class="clearfix"></div>	
                                </div>
                                <div class="progress progress-striped active">
                                         <div class="bar green" style="width:90%;"></div>
                                </div>
                        </a></li>
                        <li><a href="#">
                                <div class="task-info">
                                        <span class="task-desc">Mobile App</span><span class="percentage">33%</span>
                                        <div class="clearfix"></div>	
                                </div>
                           <div class="progress progress-striped active">
                                         <div class="bar red" style="width: 33%;"></div>
                                </div>
                        </a></li>
                        <li><a href="#">
                                <div class="task-info">
                                        <span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
                                   <div class="clearfix"></div>	
                                </div>
                                <div class="progress progress-striped active">
                                         <div class="bar  blue" style="width: 80%;"></div>
                                </div>
                        </a></li>
                        <li>
                                <div class="notification_bottom">
                                        <a href="#">See all pending tasks</a>
                                </div> 
                        </li>
                        </ul>
                        </li>	
                        </ul>
                            <div class="clearfix"> </div>
                    </div>
                        <!--notification menu end -->
                        <div class="profile_details">		
                            <ul>
                            <li class="dropdown profile_details_drop">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <div class="profile_img">	
                                            <span class="prfil-img"><img src="images/p1.png" alt="" width="50" height="50"> </span> 
                                                <div class="user-name">
                                                        <p><?php echo $_SESSION['User_Username']; ?></p>
                                                        <span>Administrator</span>
                                                </div>
                                                <i class="fa fa-angle-down lnr"></i>
                                                <i class="fa fa-angle-up lnr"></i>
                                                <div class="clearfix"></div>	
                                        </div>	
                                    </a>
                                    <ul class="dropdown-menu drp-mnu">
                                            <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
                                            <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
                                        <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                    </ul>
                            </li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>				
                </div>
                 <div class="clearfix"> </div>	
            </div>
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
    	
        <div class="col-md-8">
            <?php
                global $conn;
                if (isset($_GET['Search']))
                {
                    $Search = $_GET['Searchbox'];
                    $sql5="SELECT * FROM admin_panel WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%' OR category LIKE '%$Search%' OR post LIKE '%$Search%' ";
                    
                }else{
                    $posturl = $_GET['id'];
                $sql5="SELECT * FROM admin_panel WHERE id='$posturl'";}
                $Execute = mysqli_query($conn,$sql5);
                while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
                        $PostId=$DataRows["id"];
			$DateTime=$DataRows["datetime"];
			$Title=$DataRows["title"];
			$Category=$DataRows["category"];
			$Admin=$DataRows["author"];
			$Image=$DataRows["image"];
			$Post=$DataRows["post"];                        
                ?>
         <div class="typo-wells">
                    <div><?php echo Message();
                   echo SuccessMessage();
                ?></div>

                   <div class="well">
                       
                       <img class="img-responsive img-rounded" src="Uploaded/<?php echo $Image;  ?>" >
                       <div class="caption">
                        <br>
			<h1 id="heading"> <?php echo htmlentities($Title); ?></h1>
                        
                        <p class="description">Category:<?php echo htmlentities($Category); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Posted on:
                        <?php echo htmlentities($DateTime);?></p>
                        <p style='padding: 3px; width: 100%; word-break: break-all; word-wrap: break-word;'><?php
                        echo $Post; ?></p>
                        </div>
                       
                   </div>
           
	</div>
              <?php } ?>
            <div>
                <p> Post a comment </p>
                <?php
                $conn;
$PostId=$_GET["id"];
$sql="SELECT * FROM comments
WHERE admin_panel_id='$PostId'AND status='ON' ";
$Execute = mysqli_query($conn,$sql);
        while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
	$CommentDate=$DataRows["datetime"];
	$CommenterName=$DataRows["name"];
	$Comments=$DataRows["comments"];


?>
<div class=" well">
    <img style="margin-left: 10px; margin-top: 10px; padding-bottom:10px;" class="pull-left" src="images/p1.png" width='70' height='70'>
	<p style="margin-left: 90px; padding: 3px; width: 86%; word-break: break-all; word-wrap: break-word;" class="Comment-info"><?php echo $CommenterName; ?></p>
	<p style="margin-left: 90px; padding: 3px; width: 86%; word-break: break-all; word-wrap: break-word;" class="description"><?php echo $CommentDate; ?></p>
	<p style="margin-left: 90px;padding: 3px; width: 86%; word-break: break-all; word-wrap: break-word;" class="Comment"><?php echo nl2br($Comments); ?></p>
	
</div>

	<hr>
<?php } ?>
		
		
		<br>
                
            <form action="fullpost.php?id=<?php echo $PostId; ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                    <div class="form-group">
                    <label for="Name"><span class="FieldInfo">Name:</span></label>
                    <input class="form-control" type="text" name="Name" id="name" placeholder="Name">
                    </div>
                                        <div class="form-group">
                    <label for="postarea"><span class="FieldInfo">Post:</span></label>
                    <textarea class="form-control" name="Post" id="postarea"></textarea>
                    <br>
            <input class="btn btn-primary" type="Submit" name="Submitcomment" value="Submit">
                    </fieldset>
                    <br>
            </form>
            </div>
            </div>
        <div class="col-md-4">
            <div class="typo-wells">
         
			  <h3 class="ghj">Wells</h3>
				   <div class="well">
					There are many variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration
				   </div>
				   <div class="well">
					It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout.
                                        The point of using Lorem Ipsum is that it has a more-or-less normal distribution 
                                        of letters, as opposed to using 'Content here
				   </div>
		  
            </div>
        </div>
	 </div>	
</div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
	
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
<?php include("copyright.php") ?>
</body>
</html>

              
