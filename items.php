<?php include 'conn.php' ?>

<html>
    <head>
        <title>Products</title>
        <style>
        body, h1, h2, h3, h4, h5, h6, p, form, input, button, div, span {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f4f4f4;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            justify-content: center;
            width: 100%;
            max-width: 1200px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.2s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        #item_name {
            font-size: 1.2em;
            color: #333;
            margin: 10px 0;
        }

        #item_price {
            font-size: 1em;
            color: #666;
        }

        button {
            background-color: #007BFF;
            border: none;
            color: white;
            padding: 10px 15px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .delete {
            background-color: #dc3545;
        }

        .delete:hover {
            background-color: #c82333;
        }

        .edit {
            background-color: #ffc107;
        }

        .edit:hover {
            background-color: #e0a800;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
            width: 100%;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
            margin-right: 10px;
        }

        input[type="submit"] {
            padding: 10px 15px;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        #result {
            text-align: center;
            font-size: 1.2em;
            color: #666;
        }

        .card form {
            display: flex;
            justify-content: center;
            gap: 10px;
        }


        </style
    </head>
    <body >
        
        <!-- search bar  -->
        <form action="products.php" method="post">
            <input type="text" name="search">
            <input type="submit" value="search">
        </form>

        <div class="card-container">
        
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
                    echo "<img src='./photos/" .$row['filepath']."' alt='item_img' height='250px'><br>";

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
            </div>
            </body>
</html>

