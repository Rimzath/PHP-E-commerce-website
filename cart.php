<html>
<head>
    <title>Cart</title>
    
</head>

<body>
    <?php include 'menu.php'; ?>
    <h1 style="margin: 30px">Cart</h1>
    
    <table>
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>

<?php 

    include 'conn.php';
    
    $total = 0;
    if (isset($_POST['productid'])){
        $encode_cookie = "store_prodct_".$_POST['productid'];
        setcookie( $encode_cookie, 1);
    }

    foreach ($_COOKIE as $key => $el) {
        if (substr($key,0,13) == "store_prodct_") {
            $product_id = substr($key,13);
            
            $sql = "SELECT product_name, price FROM products WHERE product_id='$product_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if($row != NULL){
                
                global $total;
                $total += $row['price'];
                
                echo "<tr><td>".$product_id."</td><td>".$row['product_name']."</td><td>".$el."</td><td>".$row['price']."</td></tr>";
            }
        }
    }
?>
        <tr>
            <td></td>
            <td></td>
            <td><b>Total : </b></td>
            <td><?php echo $total; ?></td>
        </tr>
    </table>

</body>
</html>