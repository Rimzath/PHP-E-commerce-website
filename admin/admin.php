<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <?php include 'menu.php';?>
    <script>

        function AddItem(){
                location.href='addItemform.php';
            };

    </script>
    <h1>Dashboard</h1>

    <div class="addProduct">
        <form action="admin.php" method="POST">
            <fieldset>
            <table>
                <tr>
                    <td>Product Name &nbsp;</td>
                    <td><input type="text" name="p_name" required><br></td>
                </tr>
                <tr>
                    <td>Stock </td>
                    <td><input type="text" name="stock" required><br></td>
                </tr>
                <tr>
                    <td>Cost </td>
                    <td><input type="text" name="cost" required><br></td>
                </tr>
                <tr>
                    <td>Price </td>
                    <td><input type="text" name="price" required><br></td>
                </tr>
            </table>
            <input type="submit" value="Add">
            </fieldset>
        </form>
    </div>

    <?php 
        include 'conn.php';

        if (!isset($_POST['p_name'])){
            return;
        }

        $sql = "INSERT INTO products (product_name, in_stock, cost, price)
        VALUES ('".$_POST['p_name']."', ".$_POST['stock'].", ".$_POST['cost'].", ".$_POST['price'].")";

        echo $sql;
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    ?>

</body>
</html>