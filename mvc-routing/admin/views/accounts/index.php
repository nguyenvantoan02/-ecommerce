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
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=accounts&action=create" class="button_add"><i class="fa-solid fa-plus"></i>Thêm</a>
                    <table border=1>
                        <thead>
                            <tr>
                                <th style="width: 10%;">Id</th>
                                <th style="width: 15%;">Name</th>
                                <th style="width: 20%;">Email</th>
                                <th style="width: 10%;">Password</th>
                                <th style="width: 10%;">code</th>
                                <th style="width: 15%;">Time create</th>
                                <th style="width: 10%;"></th>
                                <th style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($acc as $acc_child){
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $acc_child->user_id; ?></td>
                                <td><?php echo $acc_child->getUsername(); ?></td>
                                <td><?php echo $acc_child->getEmail(); ?></td>
                                <td><?php echo $acc_child->getPassword(); ?></td>
                                <td><?php echo $acc_child->getCode_acc(); ?></td>
                                <td><?php echo $acc_child->time_create; ?></td>
                                <td style="text-align: center;"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=accounts&action=update&ma=<?php echo $acc_child->user_id;?>&username=<?php echo $acc_child->getUsername();?>&email=<?php echo $acc_child->getEmail();?>&password=<?php echo $acc_child->getPassword();?>&code_acc=<?php echo $acc_child->getCode_acc();?>&time_create=<?php echo $acc_child->time_create;?>" class="button_add1"><i class="fa-solid fa-pen-to-square"></i>Sửa</a></td>
                                <td style="text-align: center;"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=accounts&action=delete&ma=<?php echo $acc_child->user_id;?>" class="button_add2" ><i class="fa-solid fa-trash"></i>Xóa</a></td>
                            </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
            </section>
        </div>

    </div>
   
</body>
</html>