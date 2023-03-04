<?php 
 include_once("../config/db.php");
 if(isset($_GET['prd_id'])){
    $prd_id = $_GET['prd_id'];
    $sqlCheck = "SELECT * FROM product WHERE prd_id = $prd_id";
    $queryCheck = mysqli_query($conn, $sqlCheck);
    if(mysqli_num_rows($queryCheck)>0){
        //xóa
        $sqlDel = "DELETE FROM product WHERE prd_id = $prd_id";
        mysqli_query($conn, $sqlDel);
        header("Location: product.php");
    }
    else{
        header("Location: product.php");
    }
 }else{
    header("Location: product.php");
 }
?>