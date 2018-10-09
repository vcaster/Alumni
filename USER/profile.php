<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login();  $userid = $_SESSION['User_id']; ?>
<?php Confirm_User(); ?>
   <?php
            
            
            if(isset($_POST['Submit']))    
            {   
                
                
                $bio = $_POST['bio'];
                $Image=$_FILES["Image"]["name"];
                $Target="images/".basename($_FILES["Image"]["name"]);
                global $conn;
                $sql="UPDATE info SET dp ='$Image' , bio = '$bio' WHERE id='$userid'";
                $Execute = mysqli_query($conn,$sql);
                 move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
                 
                if($Execute){
                $_SESSION["SuccessMessage"]="Profile Updated Successfully";
                redirect("profile.php");
                }
                else{
                $_SESSION["Message"]="did not work";
                redirect("profile.php");
                }
            }
            ?>
 <?php 
    if(isset($_POST["Submit1"])){
                
                
                $Email=mysqli_real_escape_string($conn,$_POST["Email"]);
                $Address=mysqli_real_escape_string($conn,$_POST["Address"]);
                $Phoneno=mysqli_real_escape_string($conn,$_POST["Phoneno"]);


                date_default_timezone_set("Africa/Lagos");
                $CurrentTime=time();
                //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
                $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
                $DateTime;
                $Admin=$_SESSION['User_Username'];

                if(empty($Email) || empty($Address) || empty($Phoneno)){
                        $_SESSION["ErrorMessage"]="Some fields are empty";
                        redirect("profile.php");

                }elseif(strlen($Email)<5){
                        $_SESSION["ErrorMessage"]="Email Should be at-least 5 Characters";
                        redirect("profile.php");

                }else{ 
                        global $conn;

                        $sql="UPDATE info SET email = '$Email', address = '$Address', phoneno = '$Phoneno' WHERE id = '$userid' ";
                        $Execute = mysqli_query($conn,$sql);
                        if($Execute){
                        $_SESSION["SuccessMessage"]="Alumni Updated Successfully";
                        redirect("profile.php");
                        }else{
                        $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
                        redirect("profile.php");

                        }

                    }
                    
                    //redirect("icons.php");

                }
                if(isset($_POST["SubmitPP"])){
                
                $oldp=mysqli_real_escape_string($conn,$_POST["oldp"]);
                $newp=mysqli_real_escape_string($conn,$_POST["newp"]);
                $newpp=mysqli_real_escape_string($conn,$_POST["newpp"]);

                date_default_timezone_set("Africa/Lagos");
                $CurrentTime=time();
                //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
                $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
                $DateTime;
                $Admin=$_SESSION['User_Username'];
                
                $sql5=$conn->query("SELECT password FROM info WHERE id ='$userid'");
        
            
                while($DataRows = $sql5->fetch_array()){
                    $pass = $DataRows['password'];                    
                }
                

                if(empty($oldp) || empty($newp) || empty($newpp)){
                        $_SESSION["ErrorMessage"]="Field can't be left empty";
                        redirect("profile.php");

                }
                elseif(!password_verify($oldp, $pass ) == '1'){
//                        $q=password_verify($oldp, $pass );
//                        var_dump();
                        $_SESSION["ErrorMessage"]="Old password wrong ";
                        redirect("profile.php");

                }elseif($newp != $newpp){
                        $_SESSION["ErrorMessage"]="Passwords don't match";
                        redirect("profile.php");

                }
                elseif(strlen($newp) < 6){
                        $_SESSION["ErrorMessage"]="Password must be at least 6 characters";
                        redirect("profile.php");

                }else{ 
                        global $conn;
                        $in =     password_hash($newp, PASSWORD_DEFAULT);

                        $sql="UPDATE info SET password = '$in' WHERE id = '$userid' ";
                        $Execute = mysqli_query($conn,$sql);
                        if($Execute){
                        $_SESSION["SuccessMessage"]="Password Updated Successfully";
                        redirect("profile.php");
                        }else{
                        $_SESSION["ErrorMessage"]="Something Went {$in}Wrong. Try Again !";
                        redirect("profile.php");

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
		<div class="header-main">
            <div class="header-left">
                    <div class="logo-name">
<!--                             <a href="admindashboard.php"> <h1>ADMIN</h1> 
                                 
                              </a> 								-->
                    </div>
                    <!--search-box-->
                            <div class="search-box">
                                <form action="blogger.php" method="GET">
                                        <input type="text" placeholder="Search..." name="Searchbox" required="">	
                                            <input type="submit" name="Search" value="">					
                                    </form>
                            </div><!--//end-search-box-->
                    <div class="clearfix"> </div>
            </div>
                 <div class="header-right">
                   <!-- <div class="profile_details_left"><!--notifications of menu start --
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
                    </div>-->
                        <!--notification menu end -->
                        <div class="profile_details">		
                            <ul>
                            <li class="dropdown profile_details_drop">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <div class="profile_img">	
                                            
                                            <span class="prfil-img"><img class=" img-responsive img-circle " src="images/<?php                                             
                                            if($_SESSION['dp'] != null)
                                            {
                                                echo $_SESSION['dp'];
                                            }
                                          else{
                                              echo "icon1.png";} ?>" width="50" height="50" alt="profile pic"> </span> 
                                                <div class="user-name">
                                                        <p><?php echo $_SESSION['User_Username']; ?></p>
                                                        <span>Alumnus</span>
                                                </div>
                                                <i class="fa fa-angle-down lnr"></i>
                                                <i class="fa fa-angle-up lnr"></i>
                                                <div class="clearfix"></div>	
                                        </div>	
                                    </a>
                                    <ul class="dropdown-menu drp-mnu">
                                            <li> <a href="profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
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
//                    $('#pp').hide('slow');
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
//                         
//                         $('button').click(function(){
//                             
//                             $('#pp').toggle('slow');
//                         });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
    <div class="cols-grids panel-widget">
    	
        <div class="col-md-3">
            <div><?php echo Message();
                   echo SuccessMessage();
                ?></div>
                                 
         <div class="typo-wells">
                    
             <?php
             $conn;             
             $sql = "SELECT * FROM info WHERE id='$userid'";
             $Execute = mysqli_query($conn,$sql);
             while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
                            
                 $Imagedis=$DataRows["dp"];
                 $Bio=$DataRows["bio"];
             }     
             $_SESSION['dp'] = $Imagedis;
             $_SESSION['bioo'] = $Bio;
             ?>

                   <div class="well">
                       
                       <img class="img-responsive img-circle center-block " src="images/<?php                                             
                                            if($_SESSION['dp'] != null)
                                            {
                                                echo $_SESSION['dp'];
                                            }
                                          else{
                                              echo "icon1.png";} ?>" width="200" height="200" alt="" >
                       <div class="caption">
                        <br>
			<h4 id="heading"> Update Profile Picture</h4>
                       
                  <form action="profile.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                    <div class="form-group">
                    <label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
                    <input type="File" class="form-control" name="Image" id="imageselect">
                    </div>
<!--                        <div class="form-group">
                    <label for="bio"><span class="FieldInfo">Current bio:</span></label>
                    <span><?php // echo  $Bio; ?></span><br>
                    <label for="bio"><span class="FieldInfo">Bio:</span></label>
                    <textarea class="form-control" name="bio" id="bio"></textarea>-->
                                        
<!--                     </div>-->
                      <input class="btn btn-primary" type="Submit" name="Submit" value="Submit">
                    </fieldset>
                    <br>
            </form>
                      
                        </div>
                       
                   </div>
           
	</div>
                        
            </div>
                <div class="col-md-9">
                    <div class="typo-wells">
                        <div class="cols-grids panel-widget">
    	<h2>Update Profile</h2>
        <div></div>
        <?php 
            
//            $update_record = $_GET['updateid'];   
         
            global $conn;
            $sql9="SELECT * FROM info WHERE id='$userid'";
            $Execute1 = mysqli_query($conn,$sql9);

while($DataRows = mysqli_fetch_array($Execute1,MYSQLI_ASSOC)){             
	$Id=$DataRows["id"];
	$Surname=$DataRows["surname"];
	$Firstname=$DataRows["firstname"];
	$Middlename=$DataRows["middlename"];
	$Email=$DataRows["email"];
	$Address=$DataRows["address"];
	$Matric=$DataRows["matric"];
        $Phoneno=$DataRows["phoneno"];


}   
        ?>
          <div>
            <form action="profile.php" method="post">
                                  <fieldset>
                    <div class="form-group">
                    <label for="surname"><span class="FieldInfo">Surname:</span></label>
                    <input disabled  class="form-control" type="text" name="Surname" id="surname" value="<?php echo $Surname; ?>" placeholder="Surname...">
                    </div>
                     <div  class="form-group">
                    <label   for="fistname"><span class="FieldInfo">Firstname:</span></label>
                    <input disabled  class="form-control" type="text" name="Firstname" id="firstname" value="<?php echo $Firstname; ?>" placeholder="First name...">
                    </div>
                        <div class="form-group">
                    <label for="middlename"><span class="FieldInfo">Middlename:</span></label>
                    <input disabled   class="form-control" type="text" name="Middlename" id="middlename" value="<?php echo $Middlename; ?>" placeholder="Middle name...">
                    </div>
                        <div class="form-group">
                    <label for="email"><span class="FieldInfo">Email:</span></label>
                    <input  class="form-control" type="email" name="Email" id="email" value="<?php echo $Email; ?>" placeholder="Email...">
                    </div>
                        <div class="form-group">
                    <label for="address"><span class="FieldInfo">Address:</span></label>
                    <input  class="form-control" type="text" name="Address" id="address" value="<?php echo $Address; ?>" placeholder="Adresss...">
                    </div>
                        <div class="form-group">
                    <label for="phoneno"><span class="FieldInfo">Mobile Number:</span></label>
                    <input  class="form-control" type="text" name="Phoneno" id="Phoneno" value="<?php echo $Phoneno; ?>" placeholder="Adresss...">
                    </div>
                        <div class="form-group">
                    <label for="matric"><span class="FieldInfo">Matric:</span></label>
                    <input disabled  class="form-control" type="text" name="Matric" id="matric" value="<?php echo $Matric; ?>" placeholder="Matric No...">
                    </div>
                    

                   <input class="btn btn-primary" type="Submit" name="Submit1" value="Update Profile"> 
                   <div id="pp">
                       <div class="form-group">
                    <label for="oldp"><span class="FieldInfo">Old Password:</span></label>
                    <input  class="form-control" type="password" name="oldp" id="oldp" value="<?php  ?>" placeholder="">
                    </div>
                       <div class="form-group">
                    <label for="newp"><span class="FieldInfo">New Password:</span></label>
                    <input  class="form-control" type="password" name="newp" id="newp" value="<?php  ?>" placeholder="">
                    </div>
                       <div class="form-group">
                    <label for="newpp"><span class="FieldInfo">Confirm Password:</span></label>
                    <input  class="form-control" type="password" name="newpp" id="newpp" value="<?php  ?>" placeholder="">
                    </div>
                       <input class="btn btn-primary" type="Submit" name="SubmitPP" value="Save Password" onclick="disabled">
                    </div>        
                   
                   </fieldset>
                    <br>
            </form>
                <!--<button id="change" class="btn btn-primary">Change Password</button>-->
                   
                   
             </div>
	 </div>	
        <br>
<br>
<br>
<br>
<br>
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

              
