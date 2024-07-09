<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>admin page</title>
</head>
<body>
    <div id="wrapper" class="">
    <?php include 'views/layouts/header.php'; ?>

        <div id="admin_container">
            <?php include 'views/layouts/sideBar.php'; ?>
            <section class="contents">
                <?php include 'views/layouts/count.php'; ?>
                <section class="contents_control">
                    <h4>Chào mừng nguyễn văn toàn!</h4>
                </section>
            </section>
        </div>
    </div>
    <script>
        let open = function(){
            document.querySelector('.view_more').addEventListener('click',function(){
                document.querySelector('.sideBar_child1').style.display = 'block';
            })
            document.addEventListener("click", function(event) {
                if (!document.querySelector('.sideBar_child1').contains(event.target) && !document.querySelector('.view_more').contains(event.target)) {
                    document.querySelector('.sideBar_child1').style.display = 'none';
                }
            });
        }
        open();

    </script>
</body>
</html>