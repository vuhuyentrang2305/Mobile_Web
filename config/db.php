<?php
 $conn = mysqli_connect('localhost', 'root','','newdb');
 if(!$conn){
   die("kết nối không thành công".mysqli_connect_error());
 }
 mysqli_set_charset($conn,'UTF8');
?>