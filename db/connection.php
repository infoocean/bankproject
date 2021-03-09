<?php
//server details
$servername="127.0.0.1:3307";
$username="root";
$password="";
$dbname="rewabank";

//create connection
$conn=mysqli_connect($servername, $username, $password, $dbname);

//check connection
if($conn){
    //code here
}else{
 echo "connection unsuccessfull";
}
?>