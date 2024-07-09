<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <style>
        /* CSS cho form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
        }
        textarea{
            resize: none;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            display: block;
            margin: 0 auto;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
            border-radius: 5px;
        }
        #category_id{
            width: 100%;
            padding: 10px 2px;
            box-sizing: border-box;
            margin-top: 10px;
            border-color: #ccc;
            border-radius: 5px;
        }

        #upload_imgs>#img{
            border: 1px solid #ccc;
            margin-top: 10px;
            width: 100%;
            padding: 8px 6px;
            box-sizing: border-box;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h2>Create Product</h2>
        <form action="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=create_handle" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter product name" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Enter product address" required>
            </div>
            <div class="form-group">
                <label for="tel">Telephone:</label>
                <input type="text" id="tel" name="tel" placeholder="Enter telephone number">
            </div>
            <div class="form-group">
                <label for="price_old">Old Price:</label>
                <input type="number" id="price_old" name="price_old" placeholder="Enter old price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="price_new">New Price:</label>
                <input type="number" id="price_new" name="price_new" placeholder="Enter new price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="information">Information:</label>
                <textarea id="information" name="information" placeholder="Enter product information" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="sell_number">Sell Number:</label>
                <input type="number" id="sell_number" name="sell_number" placeholder="Enter sell number" required>
            </div>
            <div id="upload_imgs" class="form-group">
                <label for="img">Image URL:</label>
                <input type="file" id="img" name="imgs[]" required multiple>
            </div>

            <div class="form-group">
                <label for="category_id">Category ID:</label>
                <!-- <input type="number" id="category_id" name="category_id" placeholder="Enter category ID" required> -->
                
                <select name="category_id" id="category_id">
                <?php 
                    $conn = mysqli_connect('localhost','root','123456','php2');
                    if(!$conn){
                        die('kết nối đến cơ sở dữ liệu không thành công');
                    }
                    $select = "SELECT category_id, category_name FROM categories";
                    $result = mysqli_query($conn,$select);
                    while($row = mysqli_fetch_array($result)){
                ?>
                    <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name']?></option>
                    <?php };?>
                </select>
            </div>
            <button type="submit">Create Product</button>
        </form>
    </div>
</body>
</html>
