<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login(); $userid = $_SESSION['User_id']; ?>
<?php Confirm_User(); ?>
<?php 
    if(isset($_POST["Submit"])){
    $Category = mysqli_real_escape_string($conn,$_POST["Category"]);
    date_default_timezone_set("Africa/Lagos");
    $CurrentTime=time();
    //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;
    $admin = $_SESSION['User_Username'];
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
    	<div><?php echo Message();
                   echo SuccessMessage();
                ?></div>
        <div class="col-md-8">
            <?php
                global $conn;
                if (isset($_GET['Search']))
                {
                    $Search = $_GET['Searchbox'];
                    $sql5="SELECT * FROM admin_panel WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%' OR category LIKE '%$Search%' OR post LIKE '%$Search%' ";
                    
                }else{
                $sql5="SELECT * FROM admin_panel WHERE category='test' ORDER BY id desc";}
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
         

                   <div class="well">
                       
                       <img class="img-responsive img-rounded" src="../ADMIN/Uploaded/<?php echo $Image;  ?>" >
                       <div class="caption">
                        <br>
			<h1 id="heading"> <?php echo htmlentities($Title); ?></h1>
                        
                        <p class="description">Category:<?php echo htmlentities($Category); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Posted on:
                        <?php echo htmlentities($DateTime);?></p>
                        <p style='padding: 3px; width: 100%; word-break: break-all; word-wrap: break-word;'><?php
                        if(strlen($Post)>150){$Post=substr($Post,0,150).'...';}
                        echo $Post; ?></p>
                        </div>
                       
                        <a href="fullpost.php?id=<?php echo $PostId; ?>"><span class="btn btn-info bb">
                                Read More &rsaquo;&rsaquo;
                        </span></a>
                   </div>
           
	</div>
              <?php } ?>
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
$("#step2,#step4,#step5").hide();
                    $("#paybtn").click(function () {
                        $("#step1").hide(1000, function(){
                            $("#paybtn").hide(1000, function(){
                            $("#step2").show(1000, function(){                            
                                $("#inter").click(function () {
                                    $("#loc").hide(function () {
                                    $("#step4").show(1000, function(t){
                                        t.preventDefault();
                                });
                                });
                                });
                                 $("#loc").click(function () {
                                     $("#inter").hide(function () {
                                      $("#step5").show(1000, function(){
                                });
                               });
                                });
                            });
                        });
                         });
                    });
                    
                    
                    
                    
                    
                    elseif (isset($_POST["submitinter"])){
            
            $intertext=mysqli_real_escape_string($conn,$_POST["intertext"]);
            date_default_timezone_set("Africa/Lagos");
            $CurrentTime=time();
            //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
            $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
            $DateTime;
            $Admin=$_SESSION['User_Username'];
            $matric= $_SESSION['matric'];
            global $conn;
            $sql="INSERT INTO transcriptsreq(datetime,address,status,type,addedby)
            VALUES('$DateTime','$intertext','PAYED','INTERNATIONAL','$matric')";
            $Execute = mysqli_query($conn,$sql);
            if($Execute){
            $_SESSION["SuccessMessage"]="Post Added Successfully";
            redirect("addnewpost.php");
            }else{
            $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
            redirect("addnewpost.php");
        }
	
    }
    elseif (isset($_POST["submitloc"])) {
            $localtext=mysqli_real_escape_string($conn,$_POST["loctext"]);
            date_default_timezone_set("Africa/Lagos");
            $CurrentTime=time();
            //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
            $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
            $DateTime;
            $Admin=$_SESSION['User_Username'];
            global $conn;
            $sql="INSERT INTO transcriptsreq(datetime,address,status,type,addedby)
            VALUES('$DateTime','$intertext','PAYED','INTERNATIONAL','$matric')";
            $Execute = mysqli_query($conn,$sql);
            if($Execute){
            $_SESSION["SuccessMessage"]="Transcript Submitted Successfully";
            redirect("transcript.php");
            }else{
            $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
            redirect("transcript.php");
        }
    }
    
    
    
    
    
                  
    
    
    
<?php 
    if(isset($_POST["pay"])){
        $payclick = true;    
    date_default_timezone_set("Africa/Lagos");
    $CurrentTime=time();
    //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;
    	global $conn;
	$sql="SELECT * FROM dues WHERE user_id='$userid'";
        $Execute = mysqli_query($conn,$sql);
        
        while($DataRows=mysqli_fetch_array($Execute,MYSQLI_ASSOC)){
            
            $status = $DataRows['status'];
        }
        
	
	if($status != 'PAYED'){
            
            $_SESSION["ErrorMessage"]="Pay Dues first";
	redirect("dues.php");
	
	}
        elseif (isset($_POST["inter"])){
            $interclick = true;
            if (isset($_POST["submitinter"])){
                
            $intersubclick = true;            
            $intertext=mysqli_real_escape_string($conn,$_POST["intertext"]);
            date_default_timezone_set("Africa/Lagos");
            $CurrentTime=time();
            //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
            $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
            $DateTime;
            $Admin=$_SESSION['User_Username'];
            $matric= $_SESSION['matric'];
            global $conn;
            $sql="INSERT INTO transcriptsreq(datetime,address,status,type,addedby)
            VALUES('$DateTime','$intertext','PAYED','INTERNATIONAL','$matric')";
            $Execute = mysqli_query($conn,$sql);
            if($Execute){
            $_SESSION["SuccessMessage"]="Post Added Successfully";
            redirect("addnewpost.php");
            }else{
            $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
            redirect("addnewpost.php");
            }
        }
	
    }
    elseif (isset($_POST["submitloc"])) {
        $locclick = true;
        if (isset($_POST["submitinter"])){
                
            $locsubclick = true;     
            $localtext=mysqli_real_escape_string($conn,$_POST["loctext"]);
            date_default_timezone_set("Africa/Lagos");
            $CurrentTime=time();
            //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
            $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
            $DateTime;
            $Admin=$_SESSION['User_Username'];
            global $conn;
            $sql="INSERT INTO transcriptsreq(datetime,address,status,type,addedby)
            VALUES('$DateTime','$intertext','PAYED','INTERNATIONAL','$matric')";
            $Execute = mysqli_query($conn,$sql);
            if($Execute){
            $_SESSION["SuccessMessage"]="Transcript Submitted Successfully";
            redirect("transcript.php");
            }else{
            $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
            redirect("transcript.php");
            }
        }
    }
}

?>

    
    Usage: redirect('anotherpage.aspx');

function redirect (url) {
    var ua        = navigator.userAgent.toLowerCase(),
        isIE      = ua.indexOf('msie') !== -1,
        version   = parseInt(ua.substr(4, 2), 10);

    // Internet Explorer 8 and lower
    if (isIE && version < 9) {
        var link = document.createElement('a');
        link.href = url;
        document.body.appendChild(link);
        link.click();
    }

    // All other browsers can use the standard window.location.href (they don't lose HTTP_REFERER like Internet Explorer 8 & lower does)
    else { 
        window.location.href = url; 
    }
}