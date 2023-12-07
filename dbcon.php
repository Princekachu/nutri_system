<?php
$url='127.0.0.1:3306';
$username='root';
$password='';
$conn=mysqli_connect($url,$username,$password,"sample");
if(!$conn){
 die('Could not Connect to MySql:' .mysql_error());
}
else{
    echo "Connection Successful";
   }
?>

