
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/home.css">    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>

</head>
<body>
    <!--header-->
    <header id="header">
        <div class="row row1">  
            <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home" class="col-xl-3 header_logo" style="">
                <img src="https://caodang.fpt.edu.vn/wp-content/uploads/x18198154_10208600482868814_3469513_n.png.pagespeed.ic_.4_CcyctRxZ.png" alt="ảnh" width="50px" height="54px">
                <span style="color: #fff; font-size: 18px"> Poly shop</span>
            </a>
            <div class="col-xl-6 header_logo2">
                <div class="header_model_search">
                    <input type="search" name="search" id="search" style="width: 91%; padding: 4px 6px;" placeholder="Tìm kiếm danh mục hoặc sản phẩm............">
                    <button type="submit" value="Tìm kiếm" class="submit" style="font-size: 12px; width: 8.2%; padding: 6px 0; margin-left: 5px; border: none;"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <ul class="search_done">
                    <li>Thông tin 1</li>
                    <li>Thông tin 1</li>
                    <li>Thông tin 1</li>
                    <li>Thông tin 1</li>
                    <li>Thông tin 1</li>
                </ul>
                
            </div>
            <div class="col-xl-3 header_logo3" style="">
                <button class="header_chua">
                    <?php
                        $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'a';
                        $name = substr($username, 0, 1);
                    ?>
                    <span><?php echo $name;?></span>

                    <section class="header_information">
                        <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=personal_information" class="profile">
                            <i class="fa-solid fa-address-card"></i>
                            Hồ sơ
                        </a>
                        <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=cart&action=cart">
                            <i class="fa-solid fa-cart-shopping" style="color: #f6412d;"></i>
                            Giỏ hàng
                        </a>

                        <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/admin/index.php?controller=dashboard&action=index" class="admin">
                            <i class="fa-solid fa-arrow-right-from-bracket" style="color: blue;"></i>
                            Admin
                        </a>
                        <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/" class="header_logOut">
                            <i class="fa-solid fa-arrow-right-from-bracket" style="color: red;"></i>
                            Đăng xuất
                        </a>
                    </section>
                </button>
            </div>
        </div>
        <div class="row row2" style="">
            <div class="col-xl-6 header-category-main">
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=computer" class="header_categories">
                    <i class="fa-solid fa-laptop"></i>
                    Máy tính
                </a>
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=tv" class="header_categories">
                    <i class="fa-solid fa-tv"></i>
                    Tv
                </a>
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=watch" class="header_categories">
                    <i class="fa-regular fa-clock"></i>
                    Đồng hồ
                </a>
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=phone" class="header_categories">
                    <i class="fa-solid fa-mobile"></i>
                    Phone

                </a>
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=about" class="header_categories">
                    Giới thiệu

                </a>
            </div>
            
        </div>
            


    </header>
</body>
