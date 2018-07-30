<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login();?>
<?php Confirm_Admin(); ?>
<?php 
  global $conn;
$today_date = date('Y-m-d');
$query_date = "SELECT is_visit from site_visits WHERE dated = '$today_date'";
$Executer = mysqli_query($conn,$query_date);
                while($DataRow=mysqli_fetch_array($Executer,MYSQLI_ASSOC)){
                        
                        $dailyvisits=$DataRow['is_visit'];
                }
                $Dailyv=$dailyvisits;
  
    
    $alumnicat = 1;
    $sql2="SELECT * FROM info WHERE category = '$alumnicat' ORDER BY id desc";
                $Execute = mysqli_query($conn,$sql2);
                $totalum=0;
                while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
                        
                        $totalum++;
                }
                $Totalalumni = $totalum;
//                echo $_SESSION['User_Cat'];

 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Caleb University Alumni, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->

<!--js-->
<script src="js/jquery-3.3.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="js/Chart.min.js"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="js/chartinator.js" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
    </script>

<!--geo chart-->

<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
</head>


<body>	
    <?php $Admin = "AINA NIRAN" ?>
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
                                <form action="admindashboard.php" method="GET">   
                                        <input type="text" placeholder="Search..." name="Searchbox" required="">	
                                            <input type="submit" name="Search" id="Searchbb">					
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
                                            <span class="prfil-img"><img class="img-circle img-responsive" src="images/icon1.png" alt="" width="50" height="50"> </span> 
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
    <div><?php echo Message();
                   echo SuccessMessage();
                ?></div>
<!--market updates updates-->
	 <div class="market-updates">
             <a href="alumins.php" ><div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-8 market-update-left">
						<h3><?php echo $Totalalumni; ?></h3>
						<h4>Registered Alumni</h4>
<!--						<p>Other hand, we denounce</p>-->
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file-text-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
             </a>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-2">
				 <div class="col-md-8 market-update-left">
					<h3><?php echo $Dailyv; ?></h3>
					<h4>Daily Visitors</h4>
					<!--<p>Other hand, we denounce</p>-->
				  </div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-8 market-update-left">
						<h3>0</h3>
						<h4>New Messages</h4>
						<!--<p>Other hand, we denounce</p>-->
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-envelope-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
<!--market updates end here-->
<!--mainpage chit-chating-->
<?php
               global $conn;
                if (isset($_GET['Search']))
                {
                $Search = $_GET['Searchbox'];
                $sql = "SELECT * FROM info WHERE  surname LIKE '%$Search%' OR firstname LIKE '%$Search%' OR middlename LIKE '%$Search%' OR email LIKE '%$Search%' OR matric LIKE '%$Search%' ";
                $SrNo=0;
                $Execute = mysqli_query($conn,$sql);
                
                while($DataRows = mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
                        $Id=$DataRows["id"];
                        $Surname=$DataRows["surname"];
                        $Firstname=$DataRows["firstname"];
                        $Middlename=$DataRows["middlename"];
                        $Email=$DataRows["email"];
                        $Address=$DataRows["address"];
                        $Matric=$DataRows["matric"];
                        $Category=$DataRows["category"];
                        $SrNo++;
                }
                if ($SrNo > 0){
                
                $Showdiv=true;
                if($Category == 0){
                    $Showopt=false;
                }
            }else{
                $Showdiv=false;
                echo "<br><div class=\"alert alert-danger\"> NOT FOUND </div>";
            }
                }
                ?>



<div class="chit-chat-layer1" <?php global $Showdiv;  if ($Showdiv == false){?> style="display:none" <?php } ?> > 
	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading" >
                                <?php 
                                
                                echo "Result"; ?>
                                
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
		<tr>
			<th>S/N</th>
			<th>Surname</th>
			<th>Firstname</th>
			<th>Middlename</th>
			<th>E-mail</th>
			<th>Matric</th>
                        <th>Address</th>
			<th>Phone no</th>
                        <th>Department</th>
                        <th>Graduation year</th>
                        
                        <!--<th>User type</th>-->
<!--			<th>Details</th>-->
			
		</tr>
<?php
               global $conn;
                if (isset($_GET['Search']))
                {
                $Search = $_GET['Searchbox'];
                $sql = "SELECT * FROM info WHERE  surname LIKE '%$Search%' OR firstname LIKE '%$Search%' OR middlename LIKE '%$Search%' OR email LIKE '%$Search%' OR matric LIKE '%$Search%' OR department LIKE '%$Search%' OR gradyear LIKE '%$Search%' OR phoneno LIKE '%$Search%' ";
                $SrNo=0;
                $Execute = mysqli_query($conn,$sql);
                
                while($DataRows = mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
                        $Id=$DataRows["id"];
                        $Surname=$DataRows["surname"];
                        $Firstname=$DataRows["firstname"];
                        $Middlename=$DataRows["middlename"];
                        $Email=$DataRows["email"];
                        $Address=$DataRows["address"];
                        $Matric=$DataRows["matric"];
                        $Category=$DataRows["category"];
                        $phoneno=$DataRows["phoneno"];
                        $dept=$DataRows["department"];
                        $grad=$DataRows["gradyear"];
                        
                        $SrNo++;
                ?>
        <tr>
            <td><?php echo $SrNo; ?></td>
            <td><?php echo $Surname; ?></td>
            <td><?php echo $Firstname; ?></td>
            <td><?php echo $Middlename; ?></td>
            <td><?php 
                    if(strlen($Email) > 6) {$Email = substr($Email,0,6).'...';} echo $Email;
                    ?></td>
            <td><?php 
                    if(strlen($Address) > 6) {$Address = substr($Address,0,6).'...';} echo $Address;
                    ?></td>
            <td><?php echo $Matric; ?></td>
            <td><?php echo $phoneno; ?></td>
            <td><?php echo $dept; ?></td>
            <td><?php echo $grad; ?></td>
            <td <?php global $Showopt;  if ($Showopt == false){ ?> style="display:none"  > <?php } ?>
            <!--<td>-->
                <a href="updatealumni.php?updateid=<?php echo $Id; ?>"><span class="btn btn-success"><span class="fa fa-plus"></span></span></a> 
                <a href="deletealumni.php?deletealumniid=<?php echo $Id; ?>"><span class="btn btn-danger"><span class="fa fa-close"></span></span></a> 
           
            </td>            
            <td></td>
            <!--<td></td>-->
        <?php } ?>
<?php 
            
                }
                
                ?>    
                        </table>
                  </div>
             </div>
      </div>
    
    <div class="clearfix"> </div>
       
     
     
</div>

<div class="chit-chat-layer1" >
	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Recent Post
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
		<tr>
			<th>S/N</th>
			<th>Date & Time</th>
			<th>Post Title</th>
			<th>Category</th>
			<th>Author</th>
			<th>Banner</th>
			<th>Action</th>
			<th>Veiw</th>
			<th>Comments</th>
			
		</tr>
<?php
$conn;
$sql9="SELECT * FROM admin_panel ORDER BY id desc;";
$Execute1 = mysqli_query($conn,$sql9);
$SrNo=0;
while($DataRows=mysqli_fetch_array($Execute1,MYSQLI_ASSOC)){
	$Id=$DataRows["id"];
	$DateTime=$DataRows["datetime"];
	$Title=$DataRows["title"];
	$Category=$DataRows["category"];
	$Admin=$DataRows["author"];
	$Image=$DataRows["image"];
	$Post=$DataRows["post"];
	$SrNo++;
	?>
	<tr>
            <td><?php echo $SrNo; ?></td>
            <td><?php 
                    if(strlen($DateTime) > 12) {$DateTime = substr($DateTime,0,12).'...';} echo $DateTime;
                    ?></td>
            <td><?php 
                    if(strlen($Title) > 10) {$Title = substr($Title,0,10).'...';} echo $Title;
                    ?></td>
            <td><?php echo $Category; ?></td>
            <td><?php echo $Admin; ?></td>
            <td><img src="Uploaded/<?php echo $Image; ?>" width="170" height="50"></td>
            <td><a href="updatepost.php?updateid=<?php echo $Id; ?>"><span class="btn btn-success"><span class="fa fa-plus"></span></span></a> 
                <a href="deletepost.php?deleteid=<?php echo $Id; ?>"><span class="btn btn-danger"><span class="fa fa-close"></span></span></a> 
            </td>
            <td><a href="fullpost.php?id=<?php echo $Id; ?>"><span class="btn btn-primary"><span class="fa fa-newspaper-o"></span></span></a></td>
            <td>
               <?php
                $conn;
                $QueryApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='ON'";
                $ExecuteApproved=mysqli_query($conn,$QueryApproved);
                $RowsApproved=mysqli_fetch_array($ExecuteApproved,MYSQLI_ASSOC);
                $TotalApproved=array_shift($RowsApproved);
                if($TotalApproved>0){
                ?>
                <span style="background-color:#68AE00;" class="badge pull-right badge-warning">      
                <?php echo $TotalApproved;?>
                </span>

                <?php } ?>

                <?php
                $conn;
                $QueryUnApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='OFF'";
                $ExecuteUnApproved=mysqli_query($conn,$QueryUnApproved);
                $RowsUnApproved=mysqli_fetch_array($ExecuteUnApproved,MYSQLI_ASSOC);
                $TotalUnApproved=array_shift($RowsUnApproved);
                if($TotalUnApproved>0){
                ?>
                <span class="badge badge-warning">      
                <?php echo $TotalUnApproved;?>
                </span>

                <?php } ?>
		
                
            </td>
            
<?php } ?>        
                      </table>
                  </div>
             </div>
      </div>
    
    <div class="clearfix"> </div>
       
     
     
</div>
<div class="chit-chat-layer1">
	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Alumni
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
		<tr>
			<th>S/N</th>
			<th>Surname</th>
			<th>Firstname</th>
			<th>Middlename</th>
			<th>E-mail</th>
			<th>Address</th>
			<th>Matric</th>
			<th>Action</th>
			<th>Details</th>
			
		</tr>
<?php
$conn;
$sql9="SELECT * FROM info WHERE category = '1' ORDER BY id desc;";
$Execute1 = mysqli_query($conn,$sql9);
$SrNo=0;
while($DataRows=mysqli_fetch_array($Execute1,MYSQLI_ASSOC)){
	$Id=$DataRows["id"];
	$Surname=$DataRows["surname"];
	$Firstname=$DataRows["firstname"];
	$Middlename=$DataRows["middlename"];
	$Email=$DataRows["email"];
	$Address=$DataRows["address"];
	$Matric=$DataRows["matric"];
        $Category=$DataRows["category"];
	$SrNo++;
	?>
	<tr>
            <td><?php echo $SrNo; ?></td>
            <td><?php echo $Surname; ?></td>
            <td><?php echo $Firstname; ?></td>
            <td><?php echo $Middlename; ?></td>
            <td><?php 
                    if(strlen($Email) > 6) {$Email = substr($Email,0,6).'...';} echo $Email;
                    ?></td>
            <td><?php 
                    if(strlen($Address) > 6) {$Address = substr($Address,0,6).'...';} echo $Address;
                    ?></td>
            <td><?php echo $Matric; ?></td>
            <td><a href="updatealumni.php?updateid=<?php echo $Id; ?>"><span class="btn btn-success"><span class="fa fa-plus"></span></span></a> 
                <a href="deletealumni.php?deletealumniid=<?php echo $Id; ?>"><span class="btn btn-danger"><span class="fa fa-close"></span></span></a> 
            </td>            
            <td></td>
        
<?php } ?>        
                      </table>
                  </div>
             </div>
      </div>
    
    <div class="clearfix"> </div>
       
     
     
</div>
<!--main page chit chating end here-->
<!--main page chart start here-->

<!--main page chart layer2-->


<!--climate start here-->

<!--climate end here-->
</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include("copyright.php"); ?>
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <?php include("sidenav.php"); ?>
	<div class="clearfix"> </div>
        

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