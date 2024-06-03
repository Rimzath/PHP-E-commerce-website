<?php include 'conn.php' ?>

<html>
    <head>
        <title>Products</title>
    </head>
    <body >
        
        <!-- search bar  -->
        <form action="products.php" method="post">
            <input type="text" name="search">
            <input type="submit" value="search">
        </form>
        
        <?php 
            // search bar logic 
            if(isset($_POST['search'])){
                $searchKey = $_POST['search'];
                $sql = "SELECT product_id, product_name, price, in_stock, filepath FROM products WHERE product_name LIKE '%".$searchKey."%'";
            } else {
                $sql = "SELECT product_id, product_name, price, in_stock, filepath FROM products";
            }
            $result = $conn->query($sql); 

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<img src='./products/" .$row['filepath']."' alt='item_img' height='250px'><br>";

                    // retrieve name from database 
                    echo "<span id='item_name'>".$row['product_name']."</span><br>";
                    // retrieve price from database
                    echo "<span id='item_price'>LKR ".$row['price']."</span><br>";
                ?>
                 
                        <form action="./cart.php" method="post">
                            <input type="hidden" name="productid" value="<?php echo $row['product_id'] ?>">
                            <button class='cart' type="submit">ADD TO CART</button>
                        </form>

                <?php
                    // Authorization - only admin can edit or delete products 
                    if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == "admin"){
                        global $P_id;
                        if (isset($row['product_id'])) {
                            $P_id = $row['product_id'];
                        }
                ?>

                        <form action="./admin/delete.php" method="post">
                        <input type="hidden" name="productid" value="<?php echo $P_id; ?>">
                        <button class='delete' type="submit">DELETE</button>
                        </form>

                        <form action="./admin/edit.php" method="post">
                        <input type="hidden" name="productid1" value="<?php echo $P_id; ?>">
                        <button type="submit" class='edit'>EDIT</button>
                        </form>
                        <?php
                    }
                    echo "</div>";
                }
            } else {
                echo "<p id='result'>0 results<p>";
            }
            ?>
            
            </body>
</html>

