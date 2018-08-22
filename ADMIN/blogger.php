<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login();?>
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
                    var start = 0;
                    var limit = 5;
                    var reachedMax = false;
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
                          if ($(window).scrollTop() == $(document).height() - $(window).height())
                             {
                                getData(); 
                             }
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
                         getData();
                         
			 
		});
                
                function getData(){
                    if (reachedMax)
                        return;
                    
                    $.ajax({
                        url: 'data.php',
                        method: 'POST',
                        dataType: 'text',
                        data:{
                            getData: 1,
                            start: start,
                            limit: limit
                        },
                        success: function (response){
                            if (response == 'reachedMax'){
                                reachedMax = true;
                            }
                            else{
                                start += limit;
                                $(".result").append(response);
                            }
                        }
                        
                    })
                                      
                }
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
                    
                }
                ?>                     
                
         <div class="typo-wells result">
                          
           
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

              
