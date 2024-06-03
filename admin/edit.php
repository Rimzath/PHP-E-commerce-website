
<html>
    <head>
        <title>Editing Values</title>
    </head>
    <body>
       
        <table>
        <?php
    
            include '../conn.php';

            $productid = $_POST['productid1'];

            $sql1 = "SELECT * FROM products WHERE product_id= $productid" ;
            $result = $conn->query($sql1);
            $row1 = $result->fetch_assoc();
            
            echo 'Now the preset values are
            <tr><td> product id: </td><td>' . $row1['product_id'] .'</td></tr>'.
            '<tr><td> product name : </td><td>' . $row1['product_name'] . '</td></tr>'.
            '<tr><td> In stock: </td><td>' . $row1['in_stock'] .'</td></tr>'.
            '<tr><td> Price: </td><td>' . $row1['price'] .'</td></tr>'.
            '<tr><td> Cost: </td><td>' . $row1['cost'] .'</td></tr>'.
            '<tr><td> Filename: </td><td>' . $row1['filepath'];'</td></tr>';

        ?>
        </table>
        <br>
        <br>
        <form action="edit_confirm.php" method="post">
            <input type="hidden" name='productid' value=<?php echo $productid; ?>>
            <fieldset>
            <table>
            <tr><td><label for="productname">Product Name :</label></td>
            <td><input type="text" name='productname' value='<?php echo $row1['product_name'] ?>' required> </td></tr>
            <tr><td><label for="price">Price :</label></td>
            <td><input type="number" name='price' value='<?php echo $row1['price'] ?>' required> </td></tr>
            <tr><td><label for="cost">Cost :</label></td>
            <td><input type="number" name='cost' value='<?php echo $row1['cost'] ?>' required> </td></tr>
            <tr><td><label for="instock">In Stock :</label></td>
            <td><input type="number" name='instock' value='<?php echo $row1['in_stock'] ?>' required> </td></tr>
            <tr><td><label for="filepath">Filename :</label></td>
            <td><input type="text" name='filepath' value='<?php echo $row1['filepath'] ?>' required> </td></tr>
            <tr><td></td><td><input type="submit" value="Confirm Edit"></td></tr>
        </table>
    </fieldset>
        </form>
    </body>
</html>
