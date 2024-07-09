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
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=comments&action=create" class="button_add"><i class="fa-solid fa-plus"></i>Thêm</a>
                    <table border=1>
                        <thead>
                            <tr>
                                <th style="width: 10%;">Cmt Id</th>
                                <th style="width: 10%;">User Id</th>
                                <th style="width: 15%;">User Name</th>
                                <th style="width: 10%;">Product Id</th>
                                <th style="width: 20%;">Content</th>
                                <th style="width: 15%;">Time create</th>
                                <th style="width: 10%;"></th>
                                <th style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($comments as $comment){
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $comment->id_cmt; ?></td>
                                <td><?php echo $comment->user_id; ?></td>
                                <td><?php echo $comment->user_name; ?></td>
                                <td><?php echo $comment->p_id; ?></td>
                                <td><?php echo $comment->content; ?></td>
                                <td><?php echo $comment->time_create; ?></td>
                                <td style="text-align: center;"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=comments&action=update&id_cmt=<?php echo $comment->id_cmt;?>&user_id=<?php echo $comment->user_id;?>&user_name=<?php echo $comment->user_name;?>&p_id=<?php echo $comment->p_id;?>&content=<?php echo $comment->content;?>&time_create=<?php echo $comment->time_create;?>" class="button_add1"><i class="fa-solid fa-pen-to-square"></i>Sửa</a></td>
                                <td style="text-align: center;"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=comments&action=delete&id_cmt=<?php echo $comment->id_cmt;?>" class="button_add2" ><i class="fa-solid fa-trash"></i>Xóa</a></td>
                            </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
            </section>
        </div>

    </div>
   
</body>
</html>