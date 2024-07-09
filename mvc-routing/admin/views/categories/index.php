<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>admin page</title>
</head>
<body>
    <div id="wrapper">
    <?php include 'views/layouts/header.php'; ?>

        <div id="admin_container">
            <?php include 'views/layouts/sideBar.php'; ?>
            <section class="contents">
                <?php include 'views/layouts/count.php'; ?>
                
                <!--Table-->
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=categories&action=create" class="button_add"><i class="fa-solid fa-plus"></i>Thêm</a>
                    <table border=1>
                        <thead>
                            <tr>
                                <th style="width: 10%;">category id</th>
                                <th style="width: 40%;">category name</th>
                                <th style="width: 30%;">time_create</th>
                                <th style="width: 10%;"></th>
                                <th style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($categories as $cate_child){
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $cate_child->category_id; ?></td>
                                <td><?php echo $cate_child->category_name; ?></td>
                                <td><?php echo $cate_child->time_create; ?></td>
                                <td style="text-align: center;"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=categories&action=update&ma=<?php echo $cate_child->category_id;?>&cate_name=<?php echo $cate_child->category_name;?>&time_create=<?php echo $cate_child->time_create;?>" class="button_add1"><i class="fa-solid fa-pen-to-square"></i>Sửa</a></td>
                                <td style="text-align: center;"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=categories&action=delete&ma=<?php echo $cate_child->category_id;?>" class="button_add2" ><i class="fa-solid fa-trash"></i>Xóa</a></td>
                            </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
            </section>
        </div>

    </div>
   
</body>
</html>