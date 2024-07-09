<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 80%;
    margin: 0 auto;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

.error-message {
    color: #f00;
    font-size: 14px;
    margin-top: 5px;
}


    </style>
</head>
<body>

    <?php
        if (isset($_GET['p_id'])) {
            $p_id = $_GET['p_id'];

            $conn = mysqli_connect('localhost', 'root', '123456', 'php2');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if (isset($_GET['p_id'])) {
                $p_id = $_GET['p_id'];   
                $sql = "SELECT * FROM products WHERE p_id = $p_id";
                
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $p_id = $row['p_id'];
                        $name = $row['name'];
                        $address = $row['address'];
                        $tel = $row['tel'];
                        $price_old = $row['price_old'];
                        $price_new = $row['price_new'];
                        $information = $row['information'];
                        $sell_number = $row['sell_number'];
                        $img = $row['img'];
                        $category_id = $row['category_id'];
                        $time_create = $row['time_create'];

    ?>
                        <h2>Edit Product</h2>
                        <form action="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=update_handle" method="post">
                            <label for="name">Product Name:</label><br>
                            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br>
                            <label for="address">Address:</label><br>
                            <input type="text" id="address" name="address" value="<?php echo $address; ?>" required><br>
                            <label for="tel">Telephone:</label><br>
                            <input type="text" id="tel" name="tel" value="<?php echo $tel; ?>"><br>
                            <label for="price_old">Old Price:</label><br>
                            <input type="number" id="price_old" name="price_old" value="<?php echo $price_old; ?>" step="0.01" required><br>
                            <label for="price_new">New Price:</label><br>
                            <input type="number" id="price_new" name="price_new" value="<?php echo $price_new; ?>" step="0.01" required><br>
                            <label for="information">Information:</label><br>
                            <textarea id="information" name="information" rows="4" cols="50" required><?php echo $information; ?></textarea><br>
                            <label for="sell_number">Sell Number:</label><br>
                            <input type="number" id="sell_number" name="sell_number" value="<?php echo $sell_number; ?>" required><br>
                            <label for="img">Image URL:</label><br>
                            <input type="text" id="img" name="img" value="<?php echo $img; ?>" required><br>
                            <input type="hidden" id="category_id" name="category_id" value="<?php echo $category_id; ?>" required><br>
                            <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                            <button type="submit">Update Product</button>
                        </form>
    <?php
                    }
                } else {
                    echo "Không có dữ liệu phù hợp";
                }
            } else {
                echo "Không tìm thấy tham số p_id trong URL";
            }
        }
    ?>

    

</body>
</html>
