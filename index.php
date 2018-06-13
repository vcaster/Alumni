<?php require_once('ADMIN/db.php');?>
<?php require_once("ADMIN/Sessions.php"); ?>
<?php require_once("ADMIN/Functions.php"); ?>

<?php
        global $conn;
        $usernamecorrect = null;
         $passwordcorrect = null;
         $usernamecorrects = null;
         $passwordcorrects = null;
         $username = null;
         $passwordlogin = null;
        if(isset($_POST["Submit"])){
        $username=mysqli_real_escape_string($conn,$_POST["username"]);
        $passwordlogin=mysqli_real_escape_string($conn,$_POST["password"]);
//        $Post=mysqli_real_escape_string($conn,$_POST["Post"]);
        date_default_timezone_set("Africa/Lagos");
        $CurrentTime=time();
        //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
        $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
        $DateTime;
        if(isset($username) && isset($passwordlogin)){
            
            $seenadmin = Loginadmin($username,$passwordlogin,$DateTime);
            $seenuser = Loginuser($username,$passwordlogin,$DateTime);
                      
            
            
            
            if($seenadmin){
                $_SESSION['User_Timelog'] = $seenadmin['datetime'];
                $_SESSION['User_Cat'] = $seenadmin['category'];
                $_SESSION['User_Username'] = $seenadmin['username'];
                $_SESSION['User_id'] = $seenadmin['id'];
                $_SESSION['SuccessMessage'] = "Welcome {$_SESSION['User_Username']} ";
                redirect("ADMIN/admindashboard.php");
                
            }
            elseif($seenuser){
                $_SESSION['User_Timelog'] = $seenauser['datetime'];
               $_SESSION['User_Cat'] = $seenuser['category'];
                $_SESSION['User_Username'] = $seenuser['surname'];
                $_SESSION['User_id'] = $seenuser['id'];
                $_SESSION['SuccessMessage'] = "Welcome {$_SESSION['User_Username']} ";
                redirect("USER/blogger.php");
                
            }
            else{
                $display  = "INVALID USERNAME/PASSWORD";
                
            }
            
            
//        $sqlq="SELECT * FROM admin WHERE username='$username' AND password = '$passwordlogin'";
//        $Execute1 = mysqli_query($conn,$sqlq);
//        $admin= mysqli_fetch_array($Execute,MYSQLI_ASSOC);
//        while($DataRows1 = mysqli_fetch_array($Execute1,MYSQLI_ASSOC)){
//            $usernamecorrects = $DataRows1['username'];
//            $passwordcorrects = $DataRows1['password'];
//                 
//        }
//        
//        
//        if (($passwordlogin == $passwordcorrect) && ($username == $usernamecorrect)){
//            
//              $_SESSION["ErrorMessage"]="User login successful";
//              $display = "User login successful";
//              
//              //redirect("index.php");
////            $result = 1;
//        }
//        elseif (($passwordlogin == $passwordcorrects) && ($username == $usernamecorrects)) {
//            
//                            redirect("ADMIN/admindashboard.php");
//            
//            }
//            else{
//                  $_SESSION["ErrorMessage"]="INVALID USERNAME/PASSWORD";
//                   $display  = "INVALID USERNAME/PASSWORD";
//
//            }
//        
//        
    }
  
}
?>

<html>
<head>
<title>CALEB UNIVERSITY ALUMNI PORTAL</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="E-com Login & signup Forms Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!-- font-awesome icons -->
<!--  <link href="css/font-awesome.css" rel="stylesheet"> -->
<!-- //font-awesome icons -->
<!--Google Fonts-->
<!-- <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet"> -->
<script src="js/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function(){
     $(".Matric,.info,.infologin").hide();
      //$('#loader').hide();
      
      
      $('#loader').hide();
      $('#password_loader').hide();
      
      
             	
//				$.ajax({
//					type:'POST',
//					 url: "lookup.php",
//					suggest: data,
//					success:function(result){
//                                        $('#loader').hide();
                                        
//                                        if(result == 2){
//                        $("#loader_text").html("available");
//                                            }
//                                        else if (result == 0){
//                        $("#loader_text").html("input email 3");
//                                            }
//                                            else if (result == 1){
//                        $("#loader_text").html("alredy in use try another");
//                                        } 
                                            
                                            
					//$('#loader_text').html(result);
                                        //alert(result);
                                       // $("#loader").hide();

//					}
//				});
//                            }
//                        
//                    });

    $(".btn1").click(function(){
        $(".btn1").hide(1000, function(){
            $(".btnlogin").hide(1000, function(){
            
            $(".info").show(1000, function(){
                $('#Email').keyup(function(e){
                    e.preventDefault();
                      $('#loader').show();
                        $("#loader_text").html("checking");
                        
                        //form = ($this);
                        var name = $('#Email').val();
                         //var data = form.serialize();
                        //alert(data);
                        var regemail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
                         if( name.match(regemail) ){
                         if($.trim(name) != ''){
                            
                            
                            $.post("lookup.php", {sugesstion : name}, function (results){
                            
                                $('#loader','#loader_text').hide();
                                $('#loader_text').html(results);
    
    
                            });
                        }
                                     
        }
        else {
             $('#loader','#loader_text').hide();
             $("#loader_text").html("invalid");
        }
        });
        $('#passwordcon').keyup(function(n){
                    n.preventDefault();
                    $('#password_loader').show();
                    
                    
                    var pass1 = $('#password').val();
                    var pass2 = $('#passwordcon').val();
                    
                    if(pass1 == pass2)
                    {
                        $('#password_loader').hide();
                        $('#password_text').html('passwords match');
                    }
                    else{
                        
                        $("#password_text").html("passwords don\'t match");
                    }
                    
                    
        });
//                        if (regemail.test(name)) {
//                        $('#loader','#loader_text').hide();
//                            $("#loader_text").html("invalid");                                                       
//                        }
                                           
                
                $(".btn2").click(function(e){
                    e.preventDefault();
                    
                    var surname = $('#Surname').val();
                    var firstname= $('#Firstname').val();
                    var middlename = $('#Middlename').val();
                    var email = $('#Email').val();
                    var address = $('#Address').val();
                    var matric = $('#matric_id').val();
                    var password = $('#password').val();
                    var category = 1;
                    
                    
                     $.ajax({ 

                    method: "POST",
                    url: "submit.php",

                    data: {"surname": surname, "firstname": firstname, "middlename":middlename, "email": email, "address": address, "matric": matric, "password":password, "category": category}

                   }).done(function( data ) { 
                      var result = $.parseJSON(data); 

                      var str = '';

                      if(result == 1) {

                        $(".info").hide(1000, function(){});
                        $(".infologin").show(1000, function(){}); 
                        str = 'Signup successful.';
                        

                      }else{
                        str = 'Data could not be saved. Please try again'; 
                      }

                    $("#message").html(str);
                    
                                               
//                            $("#btnlogin2").click(function(y){
//                            y.preventDefault();
//                            
//                             var username = $('#Username').val();
//                             var passwordlogin = $('#Passwordlogin').val();
//                             
//                             
//                              $.post("loginauth.php", {"username": username, "passwordlogin": passwordlogin}, function (results){
//                            
//                                $("#message").html(results);
//                                   
//    
//                            });     
//                    }); 
                });

                    
//                    $('#matric_id').keyup(function(){
//                    if (!reg.test(matric)) {
////                        alert('kindly enter correct matriculation number \n leave empty if you cannot remember.');
//                      $('#message').html("kindly enter correct matric number");
//                     
//                     function viewNext(){
//                         $('#message1').html('<img src="images/Spinner.gif"  height="20" width="20" />');
//                    }
//                    viewNext();
//                       
//                     //if(matric == ''){
////                        //alert('kindly enter matriculation number');
////                         $('#message').html("kindly enter matric");
////                        
//                    }
//                    });
//                    else{
//                       alert(matric);            
                  
////                $('#message').hide(1000, function(){
////                $(".Matric").hide(1000, function(){    
////                $(".btn2").hide(1000, function(){
////       
//      
//         });
//         });
//         });      
         
//                    }
        });
               
        });
         });
         });
                
        });
         $(".btnlogin").click(function(e){
                    e.preventDefault();
               
        $(".btnlogin").hide(1000, function(){
                    $(".btn1").hide(1000, function(){
                        
                        $(".infologin").show(1000, function(){
                            
                        $("#messager").hide(1000, function(){

                        
//                            $("#btnlogin2").click(function(t){
//                            t.preventDefault();
//                            
//                             var username = $('#Username').val();
//                             var passwordlogin = $('#Passwordlogin').val();
//                             
//                             
//                              $.post("loginauth.php", {"username": username, "passwordlogin": passwordlogin}, function (results){
//                            
//                                $("#message").html(results);
//                                   
//    
//                            });
                             //alert(username); 
//                             $.ajax({ 

//                    method: "POST",
//                    url: "loginauth.php",
//
//                    data: {"username": username, "passwordlogin": passwordlogin}
//
//                   }).done(function( data ) { 
//                      var result = $.parseJSON(data); 
//
//                      var str = '';
//
//                      if(result == 1) {
//
//                        str = 'login successfull.';
//                       }
//                       else{
//                        str = 'Email or Password is incorrect. Please try again'; 
//                      }
//
//                    $("#message").html(str);
//
//                });
//                        }); 
                        }); 
                        });
                        }); 
                });     
                    }); 
                    
//        $(".btn2").click(function(e){
//            e.preventDefault();
//    });
    });     
</script>  

</head>
<body>
<div >
        <br>
	
	<div class="profile">
            <div style="text-align: center"><img  src="images/Caleb-University logo-550x470.png" height="100" width="100" ></div>
                    <h3>CALEB UNIVERSITY, Imota, Lagos State, Nigeria.</h3>
		<div style="text-align: center" class="wrap">
			<div class="content-main">
                <div class="w3ls-subscribe w3ls-subscribe1">
                        <h4>ALUMNI PORTAL</h4>
                        
                        <span id="message"></span>
                        <div><?php echo Message();
                               echo SuccessMessage();
                               if (!empty($display)){ ?>
                            <span id="messager"> <?php echo $display; ?> </span>
                                <?php    
                               }
                            ?></div>
                        <div><input class="btn1" type="submit" value="CLICK HERE TO REGISTER"></div>
                        <br>
                        <div><input class="btnlogin" type="submit" value="CLICK HERE TO LOGIN"></div>

                        <div class="info">
                        <h4>Register</h4>
<!--					<p>Please fill all</p>-->
                        <form action="index.php" method="post">
                            <input type="text" name="Surname" placeholder="Surname" value="" id="Surname">
                            <input type="text" name="Firstname" placeholder="First Name" value="" id="Firstname">
                            <input type="text" name="Middlename" placeholder="Middle Name" value="" id="Middlename">
                            <input type="email" name="Email"  placeholder="Email" value="" id="Email" ><br><span id="loader"><img alt="caleb_alum" src="images/Spinner.gif" width="20" height="20" /></span><span id="loader_text"></span>
                            <input type="email" name="Address" placeholder="Address" value="" id="Address" >
                                <input  type="text" name="Matric" id="matric_id" placeholder="Matric No *OPTIONAL*" value="" ><br>
                                <input class="chk1" type="radio" name="Search" value="Employed" ><span>Employed</span>
                                <input class="chk2" type="radio" name="Search" value="Employed" ><span>Self Employed</span>
                                <input class="chk3" type="radio" name="Search" value="Unemployed"><span>Unemployed</span><br><br>
                                <input type="password" name="password" placeholder="Create Your Password" value="" id="password">
                                <input type="password" name="passordcon" placeholder="Confirm Password" value="" id="passwordcon">
                                <br><span id="password_loader"><img alt="caleb_alum" src="images/Spinner.gif" width="20" height="20" /></span><span id="password_text"></span>
                                <br>
                                <input class="btn2" type="Submit" name="SubmitReg" value="Sign Up">
                        </form>
                        </div>
                        <div class="infologin">
                            <h4>Login</h4>
                            
                            <form action="index.php" method="post">

                                 <input type="text" name="username" placeholder="E-mail" id="Username">                                           

                                 <input type="password" name="password" placeholder="Password" id="Passwordlogin">                                            

                            <input type="Submit" name="Submit" value="Login" id="btnlogin2">

                        </form>
                        </div>   
                                        
                                        
                                        
				</div>
                       
			</div>
			
			<div class="wthree_footer_copy">
				<p>© 2018 CALEB UNIVERSITY. All Rights Reserved</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
