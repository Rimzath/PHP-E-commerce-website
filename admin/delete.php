<?php

    include '../conn.php';

    $productid = $_POST['productid'];

    $sql1 = "DELETE FROM products WHERE product_id = $productid";
    $result = $conn->query($sql1); 
    echo 'Deletion Successful';

?>