<?php require_once('db.php');?>
<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php Confirm_Login(); $userid = $_SESSION['User_id']; ?>
<?php Confirm_User(); $user = $_SESSION['User_Username']; ?>
<?php
//    if(isset($_POST['SubmitReg'])){
        $database = "alumni_cms";
        $conn= mysqli_connect('localhost', 'root', '',$database);
        
          $name = filter_input(INPUT_POST, 'name');
          $message = filter_input(INPUT_POST, 'message');
          $email = filter_input(INPUT_POST, 'email');
          $username = filter_input(INPUT_POST, 'username');
          $mobile = filter_input(INPUT_POST, 'mobile');
          $title = 'Alumni dues';
          $reference = filter_input(INPUT_POST, 'refernce');
          $amount = filter_input(INPUT_POST, 'amount');
          //$userid = filter_input(INPUT_POST, 'userid');
         // $result = array();
          $date = date('Y-m-d H:i:s');
//          $reference = $_POST['reference'];

            //The parameter after verify/ is the transaction reference to be verified
//            $url = "https://api.paystack.co/transaction/verify/{$reference}";
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, $url);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt(
//              $ch, CURLOPT_HTTPHEADER, [
//                'Authorization: Bearer secret_key']
//            );
//
//            //send request
//            $request = curl_exec($ch);
//            //close connection
//            curl_close($ch);
//            //declare an array that will contain the result 
//            
//            if ($request) {
//    $result = json_decode($request, true);
//    // print_r($result);
//    if($result){
//      if($result['data']){
//        //something came in
//        if($result['data']['status'] == 'success'){
//          // the transaction was successful, you can deliver value
//          /* 
//          @ also remember that if this was a card transaction, you can store the 
//          @ card authorization to enable you charge the customer subsequently. 
//          @ The card authorization is in: 
//          @ $result['data']['authorization']['authorization_code'];
//          @ PS: Store the authorization with this email address used for this transaction. 
//          @ The authorization will only work with this particular email.
//          @ If the user changes his email on your system, it will be unusable
//          */
           $sql = $conn->query("INSERT INTO transaction (name, message, email, mobile, username, package, date, amount_paid, trans_reference) VALUES ('$name', '$message', '$email', '$mobile', '$username', '$title', '$date', '$amount', '$reference')");

           $sql2=$conn->query("UPDATE dues SET status = 'PAYED', amount = '$amount' WHERE user_id = '$userid'");
          echo "Transaction was successful";
//        }else{
//          // the transaction was not successful, do not deliver value'
//          // print_r($result);  //uncomment this line to inspect the result, to check why it failed.
//          echo "Transaction was not successful: Last gateway response was: ".$result['data']['gateway_response'];
//        }
//      }else{
//        echo $result['message'];
//      }
//
//    }else{
//      //print_r($result);
//      die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
//    }
//  }else{
//    //var_dump($request);
//    die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
//  }

//            if ($request) {
//              $result = json_decode($request, true);
//            }
//
//            if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
//              echo "success";
//                    //Perform necessary action
//                $sql1=$conn->query("INSERT INTO transaction (name, message, email, mobile, username, package, date, amount_paid, trans_reference) VALUES ('$name', '$message', '$email', '$mobile', '$username', '$title', '$date', '$amount', '$reference')");
//
//                $sql2=$conn->query("UPDATE dues SET status = 'PAYED', amount = '$amount' WHERE user_id = '$userid'");
//           echo 'payment was successfully receieved';
//           
//            }else{
//              echo "Transaction was unsuccessful";
//            }

          
        
        
        
//        $address = $_POST['address'];
//                
//        date_default_timezone_set("Africa/Lagos");
//            $CurrentTime=time();
//            //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
//            $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
//            $DateTime;
//            $Admin=$_SESSION['User_Username'];
//            $matric= $_SESSION['matric'];
//            global $conn;
//            $sql="INSERT INTO transcriptsreq(datetime,address,status,type,addedby,matric,category)
//            VALUES('$DateTime','$address','PAYED','INTERNATIONAL','$user','$matric','1')";
//            $Execute = mysqli_query($conn,$sql);
//        
//        if($Execute){
//            $result = "Transcript Sent to database, Wait for a reply from us, Thank you";
//        }
//        else{
//            $result = "Error processing transcripts";
//        }
//        echo $result;
//    }
           
        
        
?>