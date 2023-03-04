<?php
	include_once("../config/db.php");
  if(isset($_GET['cat_id'])){
   $sqlCheckDel = "SELECT * FROM category WHERE cat_id=" .$_GET['cat_id'];
   $queryCheckDel = mysqli_query($conn, $sqlCheckDel);
   if(mysqli_num_rows($queryCheckDel) > 0){
    $sqlDel = "DELETE FROM category WHERE cat_id=" .$_GET['cat_id'];
    mysqli_query($conn, $sqlDel);
    header("Location: category.php");
   }else{
    header("Location: category.php");
   }
  }
?>