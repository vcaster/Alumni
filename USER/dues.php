<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login(); $userid = $_SESSION['User_id']; ?>
<?php Confirm_User(); ?>
<?php 
//    if(isset($_POST["pay"])){
//    
//    date_default_timezone_set("Africa/Lagos");
//    $CurrentTime=time();
//    //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
//    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
//    $DateTime;
//    //$admin = $_SESSION['User_Username'];
//    
//   global $conn;
//	$sql="UPDATE dues SET datetime = '$DateTime',status = 'PAYED' WHERE user_id='$userid'";
//	$Execute = mysqli_query($conn,$sql);
//	if($Execute){
//	$_SESSION["SuccessMessage"]="Payed Successfully";
//	redirect("dues.php");
//	}else{
//	$_SESSION["ErrorMessage"]="failed to pay";
//	redirect("dues.php");
//		
//	}
//	
//    }	
	

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
                          
                <div class="typo-wells">
                <div class="wells">
                    <?php $paymentdues = 500000; ?>
                    <div class="agile_form">
                    <h1 style="color: #FC8213; font-weight: bold;">Pay Dues</h1>
                    
                    <p>
                        <br>
                        <br>
                        Dues info here
                        <br>
                        <br>
                    </p>
                    <input type="hidden" name="tokken" id ="tokken" />
                    <input type="hidden" name="name" id="name" value="<?php echo $_SESSION['User_Username']; ?>" />
                    <input type="hidden" name="mobile" id="mobile" value="<?php echo $_SESSION['phoneno']; ?>" />
                    <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" />
                    <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['User_Username']; ?>" />
                    <input type="hidden" name="price" id="price_main" value="<?php echo $paymentdues; ?>" />
                    <input hidden style="margin: 5px;" id="userid"  type="text" name="userid" value="<?php echo $userid; ?>"  />

                    
                    <p class="text-center text-info">    
                    <input id="pay" class="btn btn-secondary agileinfo" onclick="payWithPaystack()" type="submit" value="PAY 5000 NOW" name="pay" />
                    </p>
                    </div>
                </div>
<!--                    <div class="agile_form">
                    <input type="hidden" name="tokken" id ="tokken" />
                    <input type="hidden" name="name" id="name" value="<?php// echo $biodata['surName']." ".$biodata['firstName']; ?>" />
                    <input type="hidden" name="mobile" id="mobile" value="<?php //echo $biodata['studentMobile']; ?>" />
                    <input type="hidden" name="email" id="email" value="<?php// echo $biodata['studentEmail'] ?>" />
                    <input type="hidden" name="username" id="username" value="<?php //echo $username; ?>" />
                    <input type="hidden" name="price" id="price_main" value="<?php// echo $payment1; ?>" />
                    <p class="text-center text-info">
                        <input type="submit" id="pay" onclick="payWithPaystack()" value="PAY <?php// echo $payment; ?> NOW" class="agileinfo" />
                        &nbsp;&nbsp;&nbsp;<a href="logout.php" style="color:white;"><i class="fa fa-sign-out"></i> Logout</a></p>
        </div>-->
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
                <script src="https://js.paystack.co/v1/inline.js"></script>
<script type="text/javascript">
  function payWithPaystack(){
      var //ref = $("#tokken").val(),
          name = $('#name').val(),
          mobile = $('#mobile').val(),
          email = $('#email').val(),
          username = $('#username').val(),
          price = $('#price_main').val();
          userid = $('#userid').val();
  //alert(name+' '+price);
        var handler = PaystackPop.setup({
      key: 'pk_test_213968876e504230bc3a5a9ff93f68fe3a7565ab',
      email: email,
      amount: price,
      metadata: {
         custom_fields: [
            {
               // display_name: "Mobile Number",
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: mobile
            }
         ]
      },
      callback: function(response){
          //save transaction refrence to database
          //alert('transaction was successful. transaction ref is ' + response.reference);
          //alert('step reached');
          var message = "success. transaction ref is " + response.reference,
                  dataString1 = 'name=' + name + '&email=' + email + '&username=' + username + '&mobile=' + mobile + '&message=' + message + '&refernce=' + response.reference + '&amount=' + price; 
                    $.ajax({    //grab the trans no
                          type: "POST",
                          url: "duesverify.php",             
                          data: dataString1,   //expect html to be returned                
                          success: function(response){                    
                            alert(response);
                             //alert(response);
                           //  window.location.reload();
                          }
                      });  
      },
      onClose: function(){
          //alert('window closed');
      }
    });
    handler.openIframe();
  }
  
        </script>
</body>

</html>

              
 


