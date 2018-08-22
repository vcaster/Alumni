<?php require_once('ADMIN/db.php');?>
<?php require_once("ADMIN/Sessions.php"); ?>
<?php require_once("ADMIN/Functions.php"); 


//        date_default_timezone_set("Africa/Lagos");
//        $CurrentTime=time();
//        $DateTime=strftime("%Y-%m-%d",$CurrentTime);
//        $DateTime;
//        echo $DateTime;

$today_date = date('Y-m-d');
//$today_date = '2018-07-05';
$re =null;

//echo $today_date;
$sql="SELECT COUNT(*) FROM site_visits";
$Executee=mysqli_query($conn,$sql);
$Rows=mysqli_fetch_array($Executee,MYSQLI_ASSOC);
$Total=array_shift($Rows);
                        
$query_check_date = "SELECT dated FROM site_visits WHERE dated = '$today_date'";
$Execute = mysqli_query($conn,$query_check_date);
$DataRows=mysqli_fetch_assoc($Execute);
//echo "\n {$Total}";
if($Total == 0){
    $query = "INSERT INTO site_visits(dated,is_visit) VALUES ('$today_date',1)";
    $Execute = mysqli_query($conn,$query);
    if($Execute){
        echo "1 visit";
    }
    else{
        echo 'failed';
    }
}

elseif (!empty($DataRows)){

$query = "UPDATE site_visits SET is_visit = is_visit + 1 WHERE dated = '$today_date'";
$Execute1 = mysqli_query($conn,$query);

}
else{
    $query = "INSERT INTO site_visits (dated,is_visit) VALUES ('$today_date',1)";
    $Execute = mysqli_query($conn,$query);
}
?>

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
            
            $seenuser = Loginuser($username,$passwordlogin);
                      
            
            
            
            if($seenuser){
                $_SESSION['User_Timelog'] = $seenauser['datetime'];
                $_SESSION['User_image'] = $seenauser['dp'];
                $_SESSION['User_bio'] = $seenauser['bio'];
                $_SESSION['User_Cat'] = $seenuser['category'];
                $_SESSION['User_id'] = $seenuser['id'];
                $_SESSION['matric'] = $seenuser['matric'];
                
                if ($_SESSION['User_Cat'] == 1){
                    $_SESSION['User_Username'] = "{$seenuser['surname']} {$seenuser['firstname']}";
                    $_SESSION['SuccessMessage'] = "Welcome {$_SESSION['User_Username']} ";
                    redirect("USER/blogger.php");
                }
                elseif ($_SESSION['User_Cat'] == 0){
                    $_SESSION['User_Username'] = $seenuser['email'];
                    $_SESSION['SuccessMessage'] = "Welcome {$_SESSION['User_Username']} ";
                    redirect("ADMIN/admindashboard.php");
                }
                
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

<link rel="icon" href="Caleb.png"/>
<link href="css/bootstrap3.min.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
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
<script src="js/bootstrap3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function(){
     $(".Matric,.info,.infologin").hide();
      //$('#loader').hide();
      
      
      $('#loader').hide();
      $('#password_loader').hide();
      $('#occup').hide();
      
      
             	
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
        
        $(function() {
    
    $('#emp').change(function(){
        if($('#emp').val() == 'Employed') {
            $("#occup").show(1000, function(){});
        } else {
            $("#occup").hide(1000, function(){});
        } 
    });
});
        
        
        
//                        if (regemail.test(name)) {
//                        $('#loader','#loader_text').hide();
//                            $("#loader_text").html("invalid");                                                       
//                        }
                                           
                
                $(".btn2").click(function(e){
                    e.preventDefault();
                    var regemail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
                    var regno = /^[0-9]{11}/;
                    var regmatric = /^[0-9]{2}\/[0-9]{4}/;
                    var surname = $('#Surname').val();
                    var firstname= $('#Firstname').val();
                    var middlename = $('#Middlename').val();
                    var email = $('#Email').val();
                    var address = $('#Address').val();
                    var matric = $('#matric_id').val();
                    var password = $('#password').val();
                    var phoneno = $('#phoneno').val();
                    var grad = $('#grad').val();
                    var dept = $('#dept').val();
                    var emp = $('#emp').val();
                    var occu = $('#occu').val();
                    var deg = $('#deg').val();
                    var d = $('#d').val();
                    var m = $('#m').val();
                    var y = $('#y').val();
                    var category = 1;
                    
                    if(surname == ""){
                        
                        alert('Fill in your Surname');                        
                        
                    }
//                    else if (firstname == ""){
//                        alert('Fill in your Firstname');                        
//                    }
//                    else if (middlename =="")
//                    {
//                        alert('Fill in your Middlename');
//                    }
//                    else if(!email.match(regemail)) 
//                    {
//                        alert('Email is invalid');
//                    }
//                    else if (address == '')
//                    {   
//                        alert('Fill in your address');
//                    }
//                    else if (!phoneno.match(regno))
//                    {
//                        alert('Phone number is invalid');
//                    }
//                    else if (!matric.match(regmatric))
//                    {
//                        alert('Matric number is invalid');
//                    }
//                    else if(emp == 'Employed' && occu == "" )
//                    {
//                        alert('Fill in your occupation');
//                                               
//                    }
                    
        // validation goes here contd...            
        else{
                $.post("dob.php", {m:m , d:d, surname:surname, firstname:firstname}, function (results){
                            
                                $('#messagecc').html(results);
                                
    
                            });
                        
                                            
                     $.ajax({ 

                    method: "POST",
                    url: "submit.php",

                    data: {"surname": surname, "firstname": firstname, "middlename":middlename, "email": email, "address": address, "matric": matric, "phoneno":phoneno, "dept":dept, "grad":grad, "password":password, "category": category, "emp":emp, "occu":occu, "deg":deg, "d":d, "m":m, "y":y}

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
                
                /// closing else
            }

                    
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

            <span id="message"></span><span id="messagecc"></span>
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
                <input type="text" name="Address" placeholder="Address" value="" id="Address" >
                <input type="text" name="phoneno" placeholder="Phone number" value="" id="phoneno" >
                <label class="pull-left" style="margin-left: 5%;">Department:</label>

                <select id="dept" style="background-color: #000; color: #fff; opacity: 0.8;  width: 93%; margin: 15px;" class="form-control center-block" >

                    <option>Accounting</option>
                    <option>Architecture</option>
                    <option>Banking and Finance</option>
                    <option>Biochemistry</option>
                    <option>Business Administration</option>
                    <option>Chemistry</option>
                    <option>Computer Science</option>
                    <option>Criminology & Security Studies</option>
                    <option>Cybersecurity</option>
                    <option>Economics</option>
                    <option>English & Literary Studies</option>
                    <option>Enivironmental Management & Toxicology</option>
                    <option>Estate Management</option>
                    <option>Forensic Science</option>
                    <option>History & Diplomatic Studies</option>
                    <option>Industrial Chemistry</option>
                    <option>Information Science</option>
                    <option>International Relations</option>
                    <option>Mass Communication</option>
                    <option>Mathematics</option>
                    <option>Microbiology & Industrial Biotechnology</option>
                    <option>Peace Studies & Conflict Resolution</option>
                    <option>Philosophy</option>
                    <option>Physics</option>
                    <option>Physics with Computational Modeling</option>
                    <option>Physics with Electronics</option>
                    <option>Plant Sciences & Aquaculture</option>
                    <option>Political Science</option>
                    <option>Psychology</option>
                    <option>Public Administration</option>
                    <option>Quantity Surveying</option>
                    <option>Software Engineering</option>
                    <option>Statistics</option>
                    <option>Taxation</option>
                    <option>Zoology & Aquaculture</option>
                </select>
                <label class="pull-left" style="margin-left: 5%;">Degree :</label>
                <select name="deg" id="deg" style="background-color: #000; color: #fff; opacity: 0.8;  width: 93%; margin: 15px;" class="form-control center-block"  >
                    <option>Doctoral</option>
                    <option>Masters</option>
                    <option>Bachelors</option>
                </select>
                
                <label class="pull-left" style="margin-left: 5%;">Graduation Year :</label>

                <select  id="grad" style="background-color: #000; color: #fff; opacity: 0.8;  width: 93%; margin: 15px;" class="form-control center-block" >
                    <?php $year  = 2010; 
                                while($year < 2018) 
                                {
                                    $year++
                                   ?>
                      <option><?php echo $year; ?></option>
                      <?php } ?>
                    </select>
                <label class="pull-left" style="margin-left: 5%;">Date of Birth :</label>
                <br>
                <label class="pull-left" style="margin-left: 5%;">Day</label>
                 <label class="pull-left" style="margin-left: 13%;">Month</label>
                  <label class="pull-left" style="margin-left: 20%;">Year</label>
                  <br>
                <select  id="d" style="background-color: #000; color: #fff; opacity: 0.8;  width: 15%; margin: 15px;" class="pull-left form-control center-block">
                    <?php $day  = 0; 
                                while($day < 31) 
                                {
                                    $day++
                                   ?>
                      <option><?php echo $day; ?></option>
                      <?php } ?>
                </select>
                 <select  id="m" style="background-color: #000; color: #fff; opacity: 0.8;  width: 17%; margin: 15px;" class="pull-left form-control center-block">
                    <?php $mon  = 0; 
                                while($mon < 12) 
                                {
                                    $mon++
                                   ?>
                      <option><?php echo $mon; ?></option>
                      <?php } ?>
                </select>
                  <select  id="y" style="background-color: #000; color: #fff; opacity: 0.8;  width: 20%; margin: 15px;" class="pull-left form-control center-block">
                    <?php $yearr  = 1971; 
                                while($yearr < 2018) 
                                {
                                    $yearr++
                                   ?>
                      <option><?php echo $yearr; ?></option>
                      <?php } ?>
                </select>



                    <input  type="text" name="Matric" id="matric_id" placeholder="Matric No" value="" >
                    <br><label class="pull-left" style="margin-left: 5%;">Employment status :</label><br>
                    <select name="emp" id='emp' style="background-color: #000; color: #fff; opacity: 0.8;  width: 93%; margin: 15px;" class="form-control center-block">
                        <option>Self Employed</option>
                        <option>Employed</option>
                        <option>Unemployed</option>
                    </select><br>
                    
                    <div id='occup'>
                        <input  type="text" name="occu" id="occu" placeholder="Occupation" value="" >
                    </div> 
                    
                    <input type="password" name="password" placeholder="Create Password" value="" id="password">
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
