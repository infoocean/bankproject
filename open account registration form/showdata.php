<?php
session_start();
//include database file
include '..\db\connection.php';
//include links ile
include '..\links\links.php';
//access session variable data
$aadharcard=$_SESSION['aadharcard'];
$pancard=$_SESSION['pancard'];
//select  data from database using pancard or aadhar card
$selectdata="select *from customertable where aadharcard='$aadharcard' && pancard='$pancard'";
//query fire
$check=mysqli_query($conn, $selectdata);
//access all data in a array form
 $fetchdata=mysqli_fetch_assoc($check);
//fetch account number or ifsc code using aadharcard or pancards
$accountnumber=$fetchdata['account_number'];
$ifsccode=$fetchdata['ifsccode'];
//access name 
$customername=$fetchdata['name'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="..\css folder\style.css" rel="stylesheet">
    </head>
    <body style="background-color:lightblue;">
    <div class="container-fluid bg-light ">
        <div class="container ">
            <div class="text-center">
            <marquee behavior="alternate" style="padding:15px; color:red;"><h1>Welcome To Rewa Bank</h1></marquee> 
            </div>
      <!--heqader navbar  part start-->
      <header class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
         <div class="container">
          <a href="index.html" class="navbar-brand" style="font-size: 25px; font-weight: bold;">REWA BANK
          </a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarid">
          <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarid">
              <ul class="navbar-nav text-center ml-auto">
                <li class="nav-item">
                  <a href="..\index.html" class="nav-link active">Home</a>
                </li>
                <li class="nav-item">
                 <a href="..about\about.php" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                 <a href="#" class="nav-link" data-target="#mymodal" data-toggle="modal">Contact Me</a>
                    <div class="container">
                      <!--contact us body start-->
                      <div class="modal fade " id="mymodal">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <div class="modal-header">
                             <h4 class="text-danger">Send Me a Message</h4>
                             <button type="button " class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                          <!--contact us form start-->    
                            <form action="contact/contact.php" method="POST">
                                <div class="form-group">
                                  <label for="name" style="font-size: 18px; font-weight: bold;">Name:</label>
                                  <input type="text" name="name" value="" required="name" placeholder="name" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="Email" style="font-size: 18px; font-weight: bold;">Email:
                                  </label>
                                  <input type="text" name="Email" value="" required="Email" placeholder="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="Mobile" style="font-size: 18px; font-weight: bold;">Mobile Number:
                                  </label>
                                  <input type="text" name="Mobile Number" value="" required="Mobile Number" placeholder="+91" class="form-control">
                                </div>
                                 <div class="form-group">
                                  <label for="Message" style="font-size: 18px; font-weight: bold;">Message:
                                  </label>
                                  <input type="Message" name="Message" value="" required="Message" placeholder="Message" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="Depc" style="font-size: 18px; font-weight: bold;">Description:
                                  </label>
                                  <input type="text" name="Mobile Number" value="" placeholder="optopnal" class="form-control">
                                </div>
                                <div>
                                  <button type="submit" name="submit" class="btn badge-danger p-2 " style="width: 200px;">Submit
                                  </button>
                                </div>
                             </form>
                            <!--contact us form end--> 
                            </div>  
                           </div>       
                          </div>
                        </div>
                      </div>
                    <!--contact form body end-->
                    </li>
                    <li class="nav-item dropdown"> 
                     <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> Provide Loan
                     </a>
                     <div class="dropdown">
                      <ul class="dropdown-menu text-left" style="line-height: 30px;">
                        <li class="dropdown-item"><a href="loan/personalloan.php">Personal Loan</a></li>
                        <li class="dropdown-item"><a href="loan/homeloan.php">Home Loan</a></li>
                        <li class="dropdown-item"><a href="loan/goldloan.php">Gold Loan</a></li>
                        <li class="dropdown-item"><a href="loan/educationloan.php">Education Loan</a></li>
                        <li class="dropdown-item"><a href="loan/carloan.php">Car Loan</a></li>
                        <li class="dropdown-item"><a href="loan/businessloan.php">Business Loan</a></li>
                        <li class="dropdown-item"><a href="investment/investment.php">Investment</a></li>
                      </ul>
                     </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="open account registration form/openaccount.php" class="nav-link dropdown-toggle" data-toggle="dropdown">Open Account
                      </a>
                      <div class="dropdown">
                        <ul class="dropdown-menu text-left" style="line-height: 30px;">
                         <li class="dropdown-item"><a href="open account registration form/openaccount.php">Current Account</a></li>
                         <li class="dropdown-item"><a href="open account registration form/openaccount.php">Saving Account</a></li>
                         <li class="dropdown-item"><a href="open account registration form/openaccount.php">Fix Deposite Account</a></li>
                        </ul>
                      </div>
                    </li>
                     <li class="nav-item dropdown">
                      <a href="services/services.php" class="nav-link dropdown-toggle" data-toggle="dropdown">Customer Services
                      </a>
                      <div class="dropdown">
                      <ul class="dropdown-menu text-left" style="line-height: 30px;">
                        <li class="dropdown-item"><a href="open account registration form/openaccount.php">Open Account</a></li>
                        <li class="dropdown-item"><a href="fetch data/ballance.php">Ballance Enquery</a></li>
                        <li class="dropdown-item"><a href="services/moneytransfer.php">Transefer Money</a></li>
                        <li class="dropdown-item"><a href="services/withdrow.php">Withdrown Money </a></li>
                        <li class="dropdown-item"><a href="fetch data/selectdata.php">Account Details</a></li>
                        <li class="dropdown-item"><a href="services/neft.php">Direct NEFT</a></li>
                         <li class="dropdown-item"><a href="calculate EMI/emi.php">EMI Calculate</a></li>
                      </ul>
                     </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="investment/investment.php" class="nav-link dropdown-toggle" data-toggle="dropdown">Investment
                      </a>
                        <div class="dropdown">
                        <ul class="dropdown-menu text-left" style="line-height: 30px;">
                        <li class="dropdown-item"><a href="investment/paytm.php">Invest in paytm</a></li>
                        <li class="dropdown-item"><a href="investment/amazon.php">Invest in amazone</a></li>
                        <li class="dropdown-item"><a href="investment/flipcard.php">Invest in Flipcart</a></li>
                        <li class="dropdown-item"><a href="investment/snapdeal.php">Invest snapdeal</a></li>
                      </ul>
                     </div>
                    </li>
                  </ul>
              </div>
            </div>
         </div>
       </div>
      </nav>
   </header>
   <!--header navbar  part end-->

   <div class="container bg-light">
            <div class="text-center">
                <h1><b><i>Congratulations !</i></b></h1>
                <p style="color:red; font-size:25px;"><?php echo "$customername" ?></p>
                <p>Your Account has been Opened</p>
            </div>
            <div class="row">
                 <div class="col-lg-6">
                     <h4>Your Account Number Is : <span style="color:darkblue"><?php echo "$accountnumber"; ?></span></h4>
                 </div>
                 <div class="col-lg-6">
                     <h4>Your IFSC Code Is : <span style="color:darkblue"><?php echo "$ifsccode"; ?></span></h4>
                 </div>
            </div>
            <div class="row">
               <div class="col-lg-3 text-center" style="margin-top:50px;">
                   <a href="..\services\ballance.php" class="btn btn-danger">Check Ballance</a>
               </div>
               <div class="col-lg-3 text-center" style="margin-top:50px;">
               <a href="..\services\withdrow.php" class="btn btn-danger">withdrow Money</a>
                </div>
                <div class="col-lg-3 text-center" style="margin-top:50px;">
                <a href="..\services\addmoney.php" class="btn btn-danger">Add Money</a>
                </div>
                   <div class="col-lg-3 text-center" style="margin-top:50px;">
                <a href="..\services\Transections.php" class="btn btn-danger">Watch Transections</a>
                </div>
            </div>
            <div class="row">
                <!--carousel image slider part-->
               <div class="carousel" style="padding-top: 20px; padding-left:170px;">
                 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                   <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                       <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                   </ol>
                  <div class="carousel-inner">
                   <div class="carousel-item active">
                    <img class="d-block w-100 bank " src="https://www.usnews.com/dims4/USNEWS/0b40ca9/17177859217/resize/800x540%3E/quality/85/?url=https%3A%2F%2Fmedia.beam.usnews.com%2Fed%2F49512dcc50e5394df36dccecb41082%2FUSNews18_MainHall.jpg" alt="First slide">
                      <div class="carousel-caption d-none d-md-block">
                       <h5 style="color: black;"><b>Founder:- Shubham Kumar Jaiswal</b></h5>
                        <p style="color: black;">This bank is the best helpfull for the anywhere or anytime</p>
                       <span style="font-size: 25px;">Apply for Any Enquery </span><a href="#" style="font-size: 20px; color: darkblue"> click<b></b></a>
                  </div>
                  </div>
               <div class="carousel-item">
                <img class="d-block w-100 bank" src="https://images.unsplash.com/photo-1562774053-701939374585?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mnx8Y29sbGVnZXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                   <h5><b style="color: blue;">here all the my Teams</b></h5>
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                 <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                   <span class="sr-only">Next</span>
                   </a>
              </div> 
          </div>
        </div>
    </div>
    </div>
    </div>
 </div>
    </body>
</html>