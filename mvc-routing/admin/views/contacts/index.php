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
                <!-- <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=contacts&action=create" class="button_add"><i class="fa-solid fa-plus"></i>Thêm</a> -->
                    <table border=1 style="margin-top: 40px">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Id</th>
                                <th style="width: 24%;">Email</th>
                                <th style="width: 15%;">Tel</th>
                                <th style="width: 17%;">Content</th>
                                <th style="width: 10%;">Time create</th>
                                <th style="width: 8%;">User ID</th>
                                <th style="width: 8%;"></th>
                                <th style="width: 8%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($contacts as $contact){
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $contact->contact_id; ?></td>
                                <td><?php echo $contact->email; ?></td>
                                <td><?php echo $contact->tel; ?></td>
                                <td><?php echo $contact->content; ?></td>
                                <td><?php echo $contact->time_create; ?></td>
                                <td><?php echo $contact->user_id; ?></td>
                                <td style="text-align: center;"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=contacts&action=feedback&email=<?php echo $contact->email;?>" class="button_add1"><i class="fa-regular fa-paper-plane"></i>Feedback</a></td>
                                <td style="text-align: center;"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=contacts&action=delete&contact_id=<?php echo $contact->contact_id;?>" class="button_add2" ><i class="fa-solid fa-trash"></i>Xóa</a></td>
                            </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
            </section>
        </div>

    </div>
   
</body>
</html>