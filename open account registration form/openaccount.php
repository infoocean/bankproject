<?php
//start session
session_start();
//include database connection file
include '..\db\connection.php';
//access the data from user input
if(isset($_POST['submit'])){
//access all data
$name = $_POST['name'];
$fname = $_POST['fname'];
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];
$number = $_POST['number'];
$pancard = $_POST['pancard'];
$aadharcard = $_POST['aadharcard'];
$amount = $_POST['amount'];
$address = $_POST['address'];
$accounttype = $_POST['accounttype'];
$gender = $_POST['gender'];

//check aadharcard or pan card allready esistx or not from database
$selectdata="select *from customertable where aadharcard='$aadharcard' && pancard='$pancard'";
//query fire
$check=mysqli_query($conn, $selectdata);
//check num of data
$numofdata=mysqli_num_rows($check);
//apply condition
if ($numofdata>0) {
    # code...
    //if data allready exists show this message
    echo "<center><p><b>I'm sorry account opened in this bank with this aadhar card or pancard</b></p></center>";
}else{
    //if data not exists insert here
    //generate random number for ifsc code
    $randomnumber=rand(32325,99999);
    $ifsccode="REWASHUB$randomnumber";
    //insertquery
    $insertquery="insert into customertable(name, fname, birthdate, email, number, pancard, aadharcard, amount, address, acounttype, gender, datetime, ifsccode)
    values('$name', '$fname', '$birthdate', '$email', '$number', '$pancard', '$aadharcard', '$amount', '$address', '$accounttype', '$gender', now(), '$ifsccode')";
    //query fire
    $insert=mysqli_query($conn, $insertquery);
    //check data insert or not
    if($insert){
        //crete session variable for show data
        $_SESSION['aadharcard']=$aadharcard;
        $_SESSION['pancard']=$pancard;
        //data send in this file using session variable
        header('location:showdata.php');
   };
 };
};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Font awesome -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!--css file-->
        <link href="..\css folder\registrationpagestyle.css" rel="stylesheet">
    </head>
    <body>
    <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>welcome to Rewa Bank</p>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                             <h4 class="register-heading">Register as a Customer</h4>
                              <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text"  name="name" class="form-control" placeholder=" Enter full Name *" value="" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="fname" class="form-control" placeholder=" Enter Father Name *" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="date"  name="birthdate" class="form-control" placeholder="date of birth *" value="" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control"  placeholder="Enter Email *" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="number" minlength="10" maxlength="10" class="form-control"  placeholder=" Mobile Number *" value="" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text"  name="pancard" minlength="10" maxlength="10"   class="form-control" placeholder="Pan Card Number *" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="aadharcard"  name="pancard" minlength="12" maxlength="12"  class="form-control" placeholder="Aadhar Card Number *" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="amount"  class="form-control" placeholder=" Enter Amount *" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="address"  class="form-control" placeholder=" Enter Address *" value="" required />
                                        </div>
                                        <div class="form-group">
                                        <select  name="accounttype">
                                        <option>Select Account Type</option>
                                            <option>Saving account</option>
                                            <option>Current Account</option>
                                            <option>FD Account</option>
                                        </select>
                                        </div>
                                        <div class="form conrtol">
                                           <select  name="gender">
                                            <option>Select gender</option>
                                            <option>male</option>
                                            <option>female</option>
                                            <option>Transgender</option>
                                          </select>
                                        </div>
                                        <div class="form-group text-center">
                                        <input type="submit"  name="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                              </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>