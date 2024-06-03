<?php

    include '../conn.php';
    
    $product_name = $_POST['product_name'];
    $stock = $_POST['stock'];
    $cost = $_POST['cost'];
    $price = $_POST['price'];
    $filename = $_POST['picture'];
    

    // SQL query to count total rows in a table
    $sql1 = "SELECT * FROM products ORDER BY product_id DESC LIMIT 1";

    // Execute the query
    $result = $conn->query($sql1);

    // Fetch the result and store it in a variable
    $row1 = $result->fetch_assoc();
    $idnum = $row1["product_id"] + 1;
 
    $sql = "INSERT INTO products (product_id ,product_name, in_stock, price, cost, filepath)
    VALUES ('$idnum','$product_name', '$stock', '$cost' , '$price', '$filename')";

    if ($conn->query($sql) === TRUE) {
            echo "New Record created successfully";
            header("Location: ./index.php");
            // sleep(5);
            // header("Location: ../products.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>