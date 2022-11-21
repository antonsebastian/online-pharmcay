<?php
session_start();
 $msql_host='localhost';
 $mysql_user='root';
 $msql_password='';
 $conn=mysqli_connect($msql_host,$mysql_user,$msql_password);
  if(mysqli_select_db($conn,'regt'))
 {
 echo ''; 
 }
 else{
 echo 'connection failed';
 }
 ?>