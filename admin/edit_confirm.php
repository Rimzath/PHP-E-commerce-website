<?php 
include '../conn.php';

$productid = $_POST['productid'];
$productname = $_POST['productname'];
$price = $_POST['price'];
$cost = $_POST['cost'];
$instock = $_POST['instock'];
$filepath = $_POST['filepath'];

$sql = "UPDATE products SET product_id='$productid' ,product_name='$productname' , in_stock='$instock',
         price='$price', cost='$cost', filepath='$filepath' where product_id='$productid' ";
$result = $conn->query($sql);

if ($result == TRUE){
    echo "Record updated successfully";
}

echo 'Edit Successful';
sleep(5);
header("Location: ../products.php");
exit();

?>