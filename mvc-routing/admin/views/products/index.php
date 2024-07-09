<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>admin page</title>
    <style>
        .data{
            display: none;
        }
    </style>
</head>
<body>
    <div id="wrapper" class="">
        <?php include 'views/layouts/header.php'; ?>
        <div id="admin_container">
            <?php include 'views/layouts/sideBar.php'; ?>
            <section class="contents">
            <?php include 'views/layouts/count.php'; ?>
                <ul class="nav_button">
                    <button onclick="openn('data1')">Quản lí sản phẩm</button>
                    <button onclick="openn('data2')">Quản lí chi tiết sản phẩm</button>
                    <button onclick="openn('data3')">Quản lí giỏ hàng</button>
                    <button onclick="openn('data4')">Quản lí sản phẩm đã mua</button>
                </ul>
                <section class="data" id="data1">
                    <!--Table-->
                    <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=create" class="button_add"><i class="fa-solid fa-plus"></i>Thêm</a>
                    <table border=1>
                        <thead>
                            <tr>
                                <th style="width: 4%;">id</th>
                                <th style="width: 8%;">name</th>
                                <th style="width: 8%;">address</th>
                                <th style="width: 5%;">tel</th>
                                <th style="width: 8%;">price old</th>
                                <th style="width: 8%;">price new</th>
                                <th style="width: 10%;">information</th>
                                <th style="width: 10%;">sell number</th>
                                <th style="width: 10%;">img</th>
                                <th style="width: 5%;">category</th>
                                <th style="width: 5%;">time create</th>
                                <th style="width: 7%;"></th>
                                <th style="width: 7%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($products as $product_child){?>
                            <tr>
                                <td style="text-align: center;"><?php echo $product_child['p_id'];?></td>
                                <td><?php echo $product_child['name']?></td>
                                <td><?php echo $product_child['address']?></td>
                                <td><?php echo $product_child['tel']?></td>
                                <td><?php echo $product_child['price_old']?></td>
                                <td><?php echo $product_child['price_new']?></td>
                                <td><?php echo $product_child['information']?></td>
                                <td><?php echo $product_child['sell_number']?></td>
                                <td><?php echo $product_child['img']?></td>
                                <td style="text-align: center;"><?php echo $product_child['category_id']?></td>
                                <td><?php echo $product_child['time_create']?></td>
                                <td style="text-align: center;">
                                    <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=update&p_id=<?php echo $product_child['p_id']; ?>"class="button_add1"><i class="fa-solid fa-pen-to-square"></i>Sửa</a>
                                </td>
                                <td style="text-align: center;"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=delete&ma=<?php echo $product_child['p_id']?>" class="button_add2" ><i class="fa-solid fa-trash"></i>Xóa</a></td>
    
    
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </section>
                <section class="data" id="data2">
                    <!--Table-->
                    <a href="" class="button_add"><i class="fa-solid fa-plus"></i>Thêm</a>
                    <table border=1>
                        <thead>

                            <tr>
                                <th style="width: 10%;">detail_id</th>
                                <th style="width: 30%;">time_create</th>
                                <th style="width: 10%;">quantity</th>
                                <th style="width: 10%;">order_id</th>
                                <th style="width: 10%;">product_id</th>
                                <th style="width: 10%;">total price</th>
                                <th style="width: 10%;"></th>
                                <th style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($details as $detail_child){?>
                                <td style="text-align: center;"><?php echo $detail_child['detail_id']?></td>
                                <td><?php echo $detail_child['time_create']?></td>
                                <td><?php echo $detail_child['quantity']?></td>
                                <td><?php echo $detail_child['order_id']?></td>
                                <td><?php echo $detail_child['p_id']?></td>
                                <td><?php echo $detail_child['total_price']?></td>
                                <td style="text-align: center;"><a href="" class="button_add1"><i class="fa-solid fa-pen-to-square"></i>Sửa</a></td>
                                <td style="text-align: center;"><a href="" class="button_add2" ><i class="fa-solid fa-trash"></i>Xóa</a></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </section>
                <section class="data" id="data3">
                    <!--Table-->
                    <a href="" class="button_add"><i class="fa-solid fa-plus"></i>Thêm</a>
                    <table border=1>
                        <thead>
                            <tr>
                                <th style="width: 3%;">cart id</th>
                                <th style="width: 8%;">cart name</th>
                                <th style="width: 10%;">cart address</th>
                                <th style="width: 10%;">cart tel</th>
                                <th style="width: 10%;">cart price</th>
                                <th style="width: 10%;">cart img</th>
                                <th style="width: 10%;">time create</th>
                                <th style="width: 10%;">user id</th>
                                <th style="width: 10%;">category id</th>
                                <th style="width: 5%;">product id</th>
                                <th style="width: 7%;"></th>
                                <th style="width: 7%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td style="text-align: center;"></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td style="text-align: center;">0</td>
                                <td style="text-align: center;"><a href="" class="button_add1"><i class="fa-solid fa-pen-to-square"></i>Sửa</a></td>
                                <td style="text-align: center;"><a href="" class="button_add2" ><i class="fa-solid fa-trash"></i>Xóa</a></td>
    
    
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section class="data" id="data4">
                    <!--Table-->
                    <a href="" class="button_add"><i class="fa-solid fa-plus"></i>Thêm</a>
                    <table border=1>
                        <thead>
                            <tr>
                                <th style="width: 10%;">id</th>
                                <th style="width: 10%;">name</th>
                                <th style="width: 10%;">email</th>
                                <th style="width: 10%;">tel</th>
                                <th style="width: 10%;">address</th>
                                <th style="width: 10%;">status</th>
                                <th style="width: 10%;">user id</th>
                                <th style="width: 10%;">category id</th>
                                <th style="width: 10%;">product id</th>
                                <th style="width: 10%;"></th>
                                <th style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($orders as $order_child){?>
                            <tr>
                                <td style="text-align: center;"><?php echo $order_child['order_id']?></td>
                                <td><?php echo $order_child['customer_name']?></td>
                                <td><?php echo $order_child['customer_email']?></td>
                                <td><?php echo $order_child['customer_phone_number']?></td>
                                <td><?php echo $order_child['customer_address']?></td>
                                <td><?php echo $order_child['status']?></td>
                                <td><?php echo $order_child['user_id']?></td>
                                <td><?php echo $order_child['category_id']?></td>
                                <td style="text-align: center;"><?php echo $order_child['p_id']?></td>
                                <td style="text-align: center;"><a href="" class="button_add1"><i class="fa-solid fa-pen-to-square"></i>Sửa</a></td>
                                <td style="text-align: center;"><a href="" class="button_add2" ><i class="fa-solid fa-trash"></i>Xóa</a></td>
    
    
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </section>
                
            </section>
        </div>
    </div>
    <script>
        function openn(pageId){
            var buttons = document.getElementsByClassName('data');
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].style.display= 'none';
            }
            //
            document.getElementById(pageId).style.display='block';
            
        };
        
    </script>
</body>
</html>