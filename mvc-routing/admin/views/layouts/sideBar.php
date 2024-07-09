<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <!-- <div id="admin_container"> -->
    <section class="sideBar">
        <h4 style="color: #fff">
            <i class="fa-solid fa-gauge"></i>
            Dashboard
        </h4>
        <section class="sideBar_list_nav">
            <ul class="sideBar_list">
                <li class="sideBar_child"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=accounts&action=index">Quản lí tài khoản</a></li>
                <li class="sideBar_child view_more">
                    <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=index" class="view_more">
                        Quản lí sản phẩm
                        <!-- <i class="fa-solid fa-chevron-down"></i>
                        <ul class="sideBar_child1">
                            <li><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=products&action=index">Quản lí sản phẩm</a></li>
                            <li><a href="">Quản lí giỏ hàng</a></li>
                            <li><a href="">Quản lí sản phẩm đã mua</a></li>
                            <li><a href="">Quản lí chi tiết sản phẩm</a></li>
                        </ul> -->
                    </a>
                </li>
                <li class="sideBar_child"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=categories&action=index">Quản lí danh mục</a></li>
                <li class="sideBar_child"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=comments&action=index">Quản lí bình luận</a></li>
                <li class="sideBar_child"><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=contacts&action=index">Quản lí liên hệ</a></li>
            </ul>
            <div class="sideBar_child" style=";">
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home" style="color:dodgerblue; font-size: 16px">
                    Log out
                    <i class="fa-solid fa-right-from-bracket" style="color: red; margin-left: 4px;"></i>
                </a>
            </div>
        </section>
    </section>
    <!-- </div> -->
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