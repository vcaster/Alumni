<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    //$(button).click(function ()){
    $("#matric_id").onchange(function(){
         var matric = $('#matric_id').val();
         var reg = /[0-9]{2}\/[0-9]{4}/;

         if ($('#matric_id').val())) {
                        //alert('kindly enter matriculation number');
                      $('#message').html("kindly enter matric");
                                          
                     function viewNext(){
                         $('#message1').html('<img src="images/Spinner.gif"  height="50" width="50" />');
                    }
                    viewNext();
                      
                    }else{
                       $('#message').html("not matric");  
                    }

    });
    //}
//    $("button").click(function(){
//        $("div").animate({
//            height: 'toggle'
//        });
//    });
//
//     var matric_id1;
// //Init onClick event
//$('#matric_id').on('focus','.select', function () {
//    // Store the current value on focus and on change
//    matric_id1 = this.value;
//}).
//on('change', '.select', function(){
//    //Check if select has value
//    if( $(this).val() ){
//      console.log( $(this).val() );
//      matric_id1 = this.value;
//    }
//    else{
//      console.log('no value');
//      // YOUR choice, reset it i.e. previous = null;
//    }
//});
});
</script> 
<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap3.min.css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap3.min.js"></script>
        <link href="css/styleadmin.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>

<p>Click the button multiple times to toggle the animation.</p>

<button>Start Animation</button>
<div id="message"></div>
<input  type="text" name="Search" id="matric_id" placeholder="Matric No" required="">
<div id="message1"></div>
<p>By default, all HTML elements have a static position, and cannot be moved. To manipulate the position, remember to first set the CSS position property of the element to relative, fixed, or absolute!</p>

<!--<div style="background:#98bf21;height:100px;width:100px;position:absolute;"></div>-->

 <ul id="sidnav" class="">
                        <li><a class="btn btn-primary btn-block" href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span>Dashboard</a></li>
                        <li><a class="btn btn-primary btn-block" href="#"><span class="glyphicon glyphicon-dashboard"></span>Add New Post</a></li>
                        <li><a class="btn btn-primary btn-block" href="#"><span class="glyphicon glyphicon-dashboard"></span>Catergories</a></li>
                        <li><a class="btn btn-primary btn-block" href="#"><span class="glyphicon glyphicon-dashboard"></span>Comments</a></li>
                        <li><a class="btn btn-primary btn-block" href="#"><span class="glyphicon glyphicon-dashboard"></span>Messages</a></li>
                        <li><a class="btn btn-primary btn-block" href="#"><span class="glyphicon glyphicon-dashboard"></span>Manage Admins</a></li>
                        <li><a class="btn btn-primary btn-block" href="#"><span class="glyphicon glyphicon-dashboard"></span>Logout</a></li>
                        
                    </ul>                 
                

</body>
</html>
