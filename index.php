<!DOCTYPE HTML>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
     $(".Matric,.info,.infologin").hide();
      //$('#loader').hide();
      
      
      $('#loader').hide();
      
             	$('#email').keyup(function(){
                      //$('#loader').show();
                        //$("#loader_text").html("checking");
                        
                        //form = ($this);
                        var name = $('#email').val();
                         //var data = form.serialize();
                        //alert(data);
                        if($.trim(name) != ''){
                            
                            
                            $.post("lookup.php", {sugesstion : name}, function (result){
                            
                                $('#loader','#loader_text').hide();
                                $('#loader_text').html(result);
    
    
                            });
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
                            }
                        
                    });

    $(".btn1").click(function(){
        $(".btn1").hide(1000, function(){
            $(".btnlogin").hide(1000, function(){
            
            $(".info").show(1000, function(){
                
                $(".btn2").click(function(e){
                    e.preventDefault();
                    
                    var matric = $('#matric_id').val();
                    
                    var reg = /[0-9]{2}\/[0-9]{4}/;
                    if (!reg.test($('#matric_id').val())) {
                        alert('kindly enter correct matriculation number \n leave empty if you cannot remember.');
                      $('#message').html("kindly enter matric");
                     
                     function viewNext(){
                         $('#message1').html('<img src="images/Spinner.gif"  height="50" width="50" />');
                    }
                    viewNext();
                       
                     //if(matric == ''){
//                        //alert('kindly enter matriculation number');
//                         $('#message').html("kindly enter matric");
//                        
                    }else{
                       alert(matric);            
                  
                $('#message').hide(1000, function(){
                $(".Matric").hide(1000, function(){    
                $(".btn2").hide(1000, function(){
       
      
         });
         });
         });      
         
                    }
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
                        
                        }); 
                        }); 
                });     
                    }); 
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
                                        <div><input class="btn1" type="submit" value="CLICK HERE TO REGISTER"></div>
                                        <br>
                                        <div><input class="btnlogin" type="submit" value="CLICK HERE TO LOGIN"></div>
                                        
                                        <div class="info">
                                        <h4>Register</h4>
<!--					<p>Please fill all</p>-->
					<form action="#" method="post">
						<input type="text" name="Search" placeholder="Surname" required="">
						<input type="text" name="Search" placeholder="First Name" required="">
                                                <input type="text" name="Search" placeholder="Middle Name" required="">
                                                <input type="email" name="email" id="email" placeholder="Email" required=""><span id="loader"><img alt="caleb_alum" src="images/Spinner.gif" width="20" height="20" /></span><i id="loader_text"></i>
                                                <input type="email" name="Search" placeholder="Address" required="">
                                                <input  type="text" name="Search" id="matric_id" placeholder="Matric No *OPTIONAL*" required="">
                                                <input class="chk1" type="radio" name="Search" value="Employed" ><span>Employed</span>
                                                <input class="chk2" type="radio" name="Search" value="Employed" ><span>Self Employed</span>
                                                <input class="chk3" type="radio" name="Search" value="Unemployed"><span>Unemployed</span>
                                                <div id="message1"></div>
                                                <br>
						<input class="btn2" type="submit" value="Sign Up">
					</form>
                                        </div>
                                        <div class="infologin">
                                            <h4>Login</h4>
                                             <form action="#" method="post">
                                           
                                            <input type="text" name="username" placeholder="Username">                                           
                                             
                                            <input type="text" name="password" placeholder="Password">                                            

                                            <input type="submit" name="submit" value="Login">
                                         
                                        </form>
                                        </div>   
                                        
                                        
                                        
				</div>
                       
			</div>
			
			<div class="wthree_footer_copy">
				<p>© 2018 CALEB UNIVERSITY </p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
