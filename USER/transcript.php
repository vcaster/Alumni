<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login(); $userid = $_SESSION['User_id']; ?>
<?php Confirm_User(); ?>
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
        
}

?>

<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>
    
<body>	
    <script>
		$(document).ready(function() {
                    
                    $("#step2,#step4,#step5").hide();
                    $("#paybtn").click(function (e) {
                        e.preventDefault();
                        $("#step1").hide(1000, function(){
                            $("#paybtn").hide(1000, function(){
                            $("#step2").show(1000, function(){                            
                                $("#inter").click(function (r) {
//                                    alert('hey');
                                    r.preventDefault();
                                    $("#loc").hide(function () {
                                    $("#step4").show(1000, function(){
//                                 
                                        $("#submiti").click(function (p) {
                                            //alert('hey');
                                            p.preventDefault(); 
                                            
                                            var address = $('#Intertext').val();
                                            
                                            $.post("keyin1.php", {address : address}, function (results){
                            
                               //$('#loader','#loader_text').hide();
                              // location.reload();
                                $('#message').html(results);
                                $("#submiti").attr("disabled", true);
    
    
                            });
//                            $.ajax({ 
//                     
//                    method: "POST",
//                    url: "keyin1.php",
//
//                    data: {"address": address}
//
//                   }).done(function( data ) { 
//                      var result = $.parseJSON(data); 
//
//                      var str = '';
//
//                      if(result == 1) {
//                        
//                        str = 'Transcript request Successful.';
//                        
//
//                      }else{
//                        str = 'Transcript request failed'; 
//                      }
//
//                    $("#message").html(str);
//                                           
//                                        
//                                });
                                });
                                  
                                });      
                               
                                });
                                 
                            });
                            $("#loc").click(function (u) {
                                     u.preventDefault();
                                     $("#inter").hide(function () {
                                      $("#step5").show(1000, function(){
                                          $("#submitl").click(function (v) {
                                              
                                              v.preventDefault(); 
                                            
                                            var address = $('#Loctext').val();
                                            
                                            $.post("keyin2.php", {address : address}, function (results){
                            
                               //$('#loader','#loader_text').hide();
                             //  location.reload();
                                $('#message').html(results);
                                $("#submitl").attr("disabled", true);
    
    
                            });
                                     
                                 });
                                });
                               });
                                });
                        });
                         });
                    });
                    });
                                  
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
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
		<?php include("headermain.php") ?>
<!--heder end here-->
<!-- script-for sticky-nav -->
		
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
    <div class="cols-grids panel-widget">
    	<div><?php echo Message();
                   echo SuccessMessage();
                ?></div>
        <div id="message"></div>
        <div class="col-md-8">
                          
                <div class="typo-wells">
                <div class="wells">
                    <form action="transcript.php" method="POST">
                    <h1 style="color: #FC8213; font-weight: bold;">Request for transcript</h1>
                    <div id="step1" >
                    <p class="description" style="font-size: 20px; padding: 10px; ">Guidelines for sending transcript</p>
                <div class="list-group">
                    <a class="list-group-item">Student must pay alumni dues</a>
                    <a class="list-group-item">Sending transcript to an international organization is ₦21,000</a>
                    <a class="list-group-item">Sending transcript to a local organization is ₦5,000</a>

                </div>
                    </div>
                    
                    <input id="paybtn" class="btn btn-secondary center-block" type="submit" value="CLICK HERE TO PAY" name="pay" />
                    
                    <div style="padding: 20px;" id="step2">
                
                <input id="inter" class="btn btn-success " type="submit" value="INTERNATIONAL" name="inter" />
                <input id="loc" class="btn btn-warning " type="submit" value="LOCAL" name="loc" />

                </div>
                <div  id="step4">
                    <textarea style="margin: 10px;"   placeholder="Enter International Address here..." class="form-control" id="Intertext" name="intertext" ></textarea>
                    <input style="margin: 5px;" id="submiti" class="btn btn-primary " type="submit" name="submitinter" value="SUBMIT"  />
                    
                </div>
                <div  id="step5">
                    <textarea style="margin: 10px;" placeholder="Enter Local Address here..." class="form-control" id="Loctext" name="loctext"></textarea>
                    <input style="margin: 5px;" id="submitl" class="btn btn-primary" type="submit" name="submitlocal" value="SUBMIT"  />

                </div>
                </form>
		  </div>
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

              
 


