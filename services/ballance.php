<?php
session_start();
//include database file
include '..\db\connection.php';
//include important links 
include '..\links\links.php';
//access data from user input
//if click the account details button
if(isset($_POST['submit'])){
    //acess data
    $accountnumber=$_POST['accountnumber'];
    $ifsccode=$_POST['ifsccode'];
    //fetch data using account number or ifsccode
    $selectdata="select *from customertable where account_number='$accountnumber' && ifsccode='$ifsccode'";
    //query fire
    $check=mysqli_query($conn, $selectdata);
    //check num of data
    $numofdata=mysqli_num_rows($check);
    if ($numofdata>0) {
        # code...
    //access data
    $fetchdata=mysqli_fetch_assoc($check);
    //access all data
    $name=$fetchdata['name'];
    $amount=$fetchdata['amount']; 
    $_SESSION['name']=$name;
    $_SESSION['amount']=$amount;
    header('location:showballance.php');
    }else{
      echo "<center><p><b> Please Enter Correct Aadhar card number or Pancard number </b></p></center>";
    }; 
  };

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
             <div class="col-lg-4 bg-primary">
                <div class="text-center " style="padding-top:50px;">
                    <img src="http://www.ansonika.com/mavia/img/registration_bg.svg">
                </div>
                <div class="text-center text-white">
                <h1>Welcome!</h1>
                <p>TO</p>
                <marquee behavior="alternate"><h1>Rewa Bank</h1></marquee>
                </div> 
                <div class="text-center">
                 <a href="..\index.html" class="btn btn-danger">Home Page</a><br><br>
                 <a href="..\fetch data\selectdata.php" class="btn btn-danger" style="margin-bottom:50px;">Show Account Details</a>
                </div> 
             </div>
             <div  class="col-lg-8  bg-light border">
                <div class="text-center" style="padding-top:30px; padding-bottom:30px;">
                     <h4><i>Enter Your Details Here</i></h4>
                 </div>
                <form action="" method="POST">
                 <div class="row">
                    <div class=" col-lg-12">
                        <h5>Enter Your Account Number:</h5>
                        <input type="text" name="accountnumber" placeholder="Enter Account number" class="form-control" required >
                    </div>
                    <div class="col-lg-12">
                    <h5>Enter Your IFSC Code:</h5>
                         <input type="text" name="ifsccode" class="form-control" placeholder="Enter IFSC Code" required>
                    </div>
                 </div>
                 <div class="row">
                     <div class=" col-lg-12 text-center">
                       <div style="margin-top:20px;">
                         <input type="submit" name="submit" class="btn btn-primary" value="check ballance">
                         </div>
                     </div>  
                 </div>
                </form>
                 </div>
            </div>
        </div>
    </div>
</body>
</html>

