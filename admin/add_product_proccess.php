<?php
    if(isset ($_POST['sbm'])){
        // ktra DL truyền từ client lên server
        // echo "<pre>";
        // print_r($_POST);
        // die();
        $prd_name = $_POST['prd_name'];
        $prd_price = $_POST['prd_price'];
        $prd_warranty = $_POST['prd_warranty'];
        $prd_accessories = $_POST['prd_accessories'];
        $prd_promotion = $_POST['prd_promotion'];
        $prd_new = $_POST['prd_new'];
        $cat_id = $_POST['cat_id'];
        $prd_status = $_POST['prd_status'];
        if(isset($_POST['prd_featured'])){
             $prd_featured = $_POST['prd_featured'];
        }else{
           $prd_featured = 0;
        }
        $prd_details = $_POST['prd_details'];
        $prd_image = $_FILES['prd_image']['name'];
        $prd_tmp_image = $_FILES['prd_image'] ['tmp_name'];
        $sqlInsertProduct = "INSERT INTO product(cat_id,prd_name,prd_price,prd_warranty,prd_accessories,prd_promotion,prd_new,prd_status,prd_featured,prd_details, prd_image  )
        VALUES($cat_id,'$prd_name', $prd_price, $prd_warranty,'$prd_accessories',$prd_promotion,$prd_new,$prd_status,$prd_featured,'$prd_details' ,'$prd_image') ";
        include_once ("../config/db.php"); // kết nối tới csdl
        mysqli_query($conn, $sqlInsertProduct);
        // upload file ảnh
        move_uploaded_file($prd_tmp_image, "images/" .$prd_image);
        // chuyển về trang product.php
        header("Location: product.php");
    }
?>