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
    //access data
    $fetchdata=mysqli_fetch_assoc($check);
    //access all data
    $accountnumber=$fetchdata['account_number'];
    $name=$fetchdata['name'];
    $fname=$fetchdata['fname'];
    $birthdate=$fetchdata['birthdate'];
    $email=$fetchdata['email'];
    $number=$fetchdata['number'];
    $pancard=$fetchdata['pancard'];
    $aadharcard=$fetchdata['aadharcard'];
    $amount=$fetchdata['amount'];
    $address=$fetchdata['address'];
    $accounttype=$fetchdata['acounttype'];
    $gender=$fetchdata['gender'];
    $datetime=$fetchdata['datetime'];
    $ifsccode=$fetchdata['ifsccode'];
  };
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>details</title>
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
                 <a href="..\services\ballance.php" class="btn btn-danger" style="margin-bottom:50px;">check ballance</a>
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
                         <input type="submit" name="submit" class="btn btn-primary" value="Show Account Details">
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