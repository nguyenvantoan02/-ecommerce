<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <div class="wraper">
        <!--header-->
        <!-- <header id="header">
            <div class="row row1">
                <a href="home.php" class="col-xl-3 header_logo" style="">
                    <img src="https://caodang.fpt.edu.vn/wp-content/uploads/x18198154_10208600482868814_3469513_n.png.pagespeed.ic_.4_CcyctRxZ.png" alt="ảnh" width="60px" height="62px">
                    Poly shop
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
                        <i class="fa-solid fa-user"></i>
                        <section class="header_information">
                            <a href="personal_information.php" class="profile">
                                <i class="fa-solid fa-address-card"></i>
                                Hồ sơ
                            </a>
                            <a href="cart.php">
                                <i class="fa-solid fa-cart-shopping" style="color: #f6412d;"></i>
                                Giỏ hàng
                            </a>
                            <a href="../admins/admin_home.php" class="admin">
                                <i class="fa-solid fa-arrow-right-from-bracket" style="color: blue;"></i>
                                Admin
                            </a>
                            <a href="../../index.php" class="header_logOut">
                                <i class="fa-solid fa-arrow-right-from-bracket" style="color: red;"></i>
                                Đăng xuất
                            </a>
                        </section>
                    </button>
                </div>
            </div>
            <div class="row row2" style="">
                <div class="col-xl-6 header-category-main">
                    <a href="computer.php" class="header_categories">
                        <i class="fa-solid fa-laptop"></i>
                        Máy tính
                    </a>
                    <a href="tv.php" class="header_categories">
                        <i class="fa-solid fa-tv"></i>
                        Tv
                    </a>
                    <a href="watch.php" class="header_categories">
                        <i class="fa-regular fa-clock"></i>
                        Đồng hồ
                    </a>
                    <a href="phone.php" class="header_categories">
                        <i class="fa-solid fa-mobile"></i>
                        Phone
    
                    </a>
                    <a href="general_introduction.php" class="header_categories">
                        <i class="fa-solid fa-info"></i>
                        Giới thiệu
    
                    </a>
                </div>
                
            </div>
            


        </header> -->
        <?php include 'layouts/header.php'; ?>
        <!--container-->
        <div id="container" class="grid wide" style="margin-top: 220px;">
            <ul class="container_category_list">
                <li>
                    <img src="https://tse2.mm.bing.net/th?id=OIP.3DKrBRa5FjVgdmknCfmXMwHaHa&pid=Api&P=0&h=180" alt="" width="45px" height="45px">
                    <strong>Voucher</strong>
                </li>
                <li>
                    <img src="https://tse4.mm.bing.net/th?id=OIP.W9yygaNH8NNmWhDifbyDFwAAAA&pid=Api&P=0&h=180" alt="" width="45px" height="45px">
                    <strong>Miễn phí Ship</strong>
                </li>
                <li>
                    <img src="https://tse1.mm.bing.net/th?id=OIP.56Mq32onYq8iwNhghrLW0QHaHa&pid=Api&P=0&h=180" alt="" width="45px" height="45px">
                    <strong>Mã giảm giá</strong>
                </li>
                <li>
                    <img src="https://tse2.mm.bing.net/th?id=OIP.SttmDc21xA1TN35hJZiNewHaHa&pid=Api&P=0&h=180" alt="" width="45px" height="45px">
                    <strong>Hàng hiệu giảm 50%</strong>
                </li>
                <li>
                    <img src="https://tse4.mm.bing.net/th?id=OIP.AVElaBoIJ2YrsnyHsXCShwHaF6&pid=Api&P=0&h=180" alt="" width="45px" height="45px">
                    <strong>Hàng quốc tế</strong>
                </li>
                <li>
                    <img src="https://tse1.mm.bing.net/th?id=OIP.rnceVlTfgNMU5xPtKgAcKAHaE2&pid=Api&P=0&h=180" alt="" width="45px" height="45px">
                    <strong>Dịch vụ</strong>
                </li>
            </ul>
            <div class="container_arrange_main">
                <h5>
                    <strong><i>Số lượng sản phẩm 20.</i></strong>
                </h5>
                <button class="container_arrange">
                    <i class="fa-solid fa-filter"></i>
                    Bộ Lọc
                    <i class="fa-solid fa-chevron-down"></i>
                    <ul class="arrange_list">
                        <a href="">Thấp đến cao</a>
                        <a href="">Cao đến thấp</a>
                    </ul>
                </button>
            </div>
            <div class="container_list_products">
            <?php foreach($products as $prd){ ?>
                <div class="product_box">
                    <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=detail&id=<?php echo $prd['p_id']?>&name=<?php echo $prd['name']?>&address=<?php echo $prd['address']?>&tel=<?php echo $prd['tel']?>&price_old=<?php echo $prd['price_old']?>&price_new=<?php echo $prd['price_new']?>&information=<?php echo $prd['information']?>&sell_number=<?php echo $prd['sell_number']?>&img=<?php echo $prd['img']?>&time_create=<?php echo $prd['time_create']?>&category_id=<?php echo $prd['category_id']?>" class="product_item">
                        <div class="categories_deal">
                            <?php 
                                // require '../models/database.php';
                                $conn = mysqli_connect('localhost','root','123456','php2');
                                $category = $prd['category_id'];
                                $select = "SELECT category_name FROM categories WHERE category_id = $category";
                                $result = mysqli_query($conn,$select);
                                $row = mysqli_fetch_array($result);
                                $category_name = $row['category_name'];
                            ?>
                            <strong class="product_categories">Danh mục: <?php echo $category_name; ?></strong>

                            <?php
                                $price_old = $prd['price_old'] ;
                                $price_new = $prd['price_new'] ;
                                $price_main = (($price_old - $price_new) / $price_old) *100;
                             ?>
                            <p class="deal">Giảm <?php echo sprintf('%0.2d',$price_main); ?>%</p>
                        </div>
                        <div class="product_img">
                            <img src="<?php echo $prd['img']; ?>" alt="ảnh">
                        </div>
                        <div class="product_name"><?php echo $prd['name']; ?></div>
                        <div class="product_address">
                            <i class="fa-solid fa-location-dot"></i>
                            <?php echo $prd['address']; ?>
                        </div>
                        <div class="product_tel">
                            <i class="fa-solid fa-phone"></i>
                            <?php echo $prd['tel']; ?>
                        </div>
                        <div class="product_information"><?php echo $prd['information']; ?></div>
                        <div class="product_price">
                            <div class="product_price_old">
                                <p><?php echo $price_old; ?><span>vnđ</span></p>
                            </div>
                            <div class="product_price_new">
                                <p><?php echo $price_new; ?><span>vnđ</span></p>
                            </div>

                        </div>
                        <div class="product_sell_number">
                            <input type="submit" value="Mua">
                            <p><?php echo $prd['sell_number']; ?><span>k</span></p>
                        </div>
                    </a>
                </div>
                <?php }; ?>
            </div>
            <div class="container_page_product">
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=phone&page=1" class="page_product_direcational">1</a>
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=page&action=phone&page=2" class="page_product_direcational" style="margin: 0 8px;">2</a>
            </div>
        </div>
        <!--footer-->
        <!-- <footer class="footer">
            <div class="footer__thongtin-chung">
                <div class="footer__support">
                    <div class="footer__support-item">
                        <h3 class="footer__heading">CHĂM SÓC KHÁCH HÀNG</h3>
                        <ul class="footer__support-list">
                            <li class="footer__support-name"><a href="">Trung tâm trợ giúp</a></li>
                            <li class="footer__support-name"><a href="">Shop mall</a></li>
                            <li class="footer__support-name"><a href="">Hướng dẫn mua hàng</a></li>
                            <li class="footer__support-name"><a href="">Hướng dẫn bán hàng</a></li>
                            <li class="footer__support-name"><a href="">poly xu</a></li>
                            <li class="footer__support-name"><a href="">Vận chuyển</a></li>
                            <li class="footer__support-name"><a href="">Chăm sóc khách hàng</a></li>
                            <li class="footer__support-name"><a href="">Chính sách bảo hành</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer__support">
                    <div class="footer__about-shoppe">
                        <h3 class="footer__heading">VỀ POLY</h3>
                        <ul class="footer__support-list">
                            <li class="footer__support-name"><a href="">Giới thiệu về poly việt nam</a></li>
                            <li class="footer__support-name"><a href="">Tuyển dụng</a></li>
                            <li class="footer__support-name"><a href="">Điều khoản poly</a></li>
                            <li class="footer__support-name"><a href="">Chính sách bảo mật</a></li>
                            <li class="footer__support-name"><a href="">Chính hãng</a></li>
                            <li class="footer__support-name"><a href="">Chương trình tiếp thị liên kết với
                                poly</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer__support">
                    <div class="footer__thanhtoan">
                        <div class="footer__thanhtoan-list-main">
                            <div class="footer__thanhtoan-card">
                                <h3 class="footer__heading">THANH TOÁN</h3>
                                <div class="footer__anh-main">
                                    <img src="https://cf.shopee.vn/file/d4bbea4570b93bfd5fc652ca82a262a8" alt="ảnh"
                                        class="footer__thanhtoan-anh">
                                    <img src="https://cf.shopee.vn/file/a0a9062ebe19b45c1ae0506f16af5c16" alt="ảnh"
                                        class="footer__thanhtoan-anh">
                                    <img src="https://cf.shopee.vn/file/38fd98e55806c3b2e4535c4e4a6c4c08" alt="ảnh"
                                        class="footer__thanhtoan-anh">
                                    <img src="https://cf.shopee.vn/file/9263fa8c83628f5deff55e2a90758b06" alt="ảnh"
                                        class="footer__thanhtoan-anh">
                                    <img src="https://cf.shopee.vn/file/2c46b83d84111ddc32cfd3b5995d9281" alt="ảnh"
                                        class="footer__thanhtoan-anh">
                                    <img src="https://cf.shopee.vn/file/0217f1d345587aa0a300e69e2195c492" alt="ảnh"
                                        class="footer__thanhtoan-anh">
                                </div>
                            </div>
                            <div class="footer__thanhtoan_express footer__thanhtoan--change">
                                <h2 class="footer__heading">ĐƠN VỊ VẬN CHUYỂN</h2>
                                <div class="footer__anh-main">
                                    <img src="https://cf.shopee.vn/file/5e7282bd0f7ee0872fdb0bd1d40fbe9e" alt="ảnh"
                                        class="footer__thanhtoan-anh">
                                    <img src="https://cf.shopee.vn/file/957f4eec32b963115f952835c779cd2c" alt="ảnh"
                                        class="footer__thanhtoan-anh">
                                    <img src="https://cf.shopee.vn/file/77bf96a871418fbc21cc63dd39fb5f15" alt="ảnh"
                                        class="footer__thanhtoan-anh">
                                    <img src="https://cf.shopee.vn/file/0d349e22ca8d4337d11c9b134cf9fe63" alt="ảnh"
                                        class="footer__thanhtoan-anh">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="footer__support">
                    <div class="footer__follow">
                        <h3 class="footer__heading">THEO DÕI CHÚNG TÔI TRÊN</h3>
                        <ul class="footer__social-main">
                            <li class="footer__social">
                                <a href="">
                                    <i class="footer__social-app fa-brands fa-square-facebook"></i>
                                    facebook
                                </a>
                            </li>
                            <li class="footer__social">
                                <a href="">
                                    <i class="footer__social-app fa-brands fa-instagram"></i>
                                    instagram
                                </a>
                            </li>
                            <li class="footer__social">
                                <a href="">
                                    <i class="footer__social-app fa-brands fa-linkedin"></i>
                                    linkedin
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer__support">
                    <div class="footer__dowload-app">
                        <h3 class="footer__heading">DOWLOAD APP</h3>
                        <div class="footer__dowload-ma">
                            <a href="" class="footer__dowload-qr">
                                <img src="https://cf.shopee.vn/file/a5e589e8e118e937dc660f224b9a1472"
                                    alt="qr-dowload">
                            </a>
                            <a href="" class="footer__dowload-now">
                                <img src="https://cf.shopee.vn/file/ad01628e90ddf248076685f73497c163"
                                    alt="app store">
                                <img src="https://cf.shopee.vn/file/ae7dced05f7243d0f3171f786e123def"
                                    alt="google play">
                                <img src="https://cf.shopee.vn/file/35352374f39bdd03b25e7b83542b2cb0"
                                    alt="app garelly">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__khuvuc">
                <div class="footer__khuvuc-quyen">
                    © 2024 Poly shop. Tất cả các quyền được bảo lưu.
                </div>
                <div class="footer__khuvuc-address">
                    <span>
                        Quốc gia & Khu vực :
                    </span>
                    <ul>
                        <li>Singapore</li>
                        <li>Indonesia</li>
                        <li>Đài Loan</li>
                        <li>Thái Lan</li>
                        <li>Malaysia</li>
                        <li>Việt Nam</li>
                        <li>Philippines</li>
                        <li>Brazil</li>
                        <li>México</li>
                        <li>Colombia</li>
                        <li>Chile</li>
                        <li>Poland</li>

                    </ul>
                </div>
            </div>
            <div class="footer__end">
                <div>
                    © Bản quyền thuộc về nguyễn văn toàn
                </div>
            </div>

        </footer> -->
        <?php include 'layouts/footer.php';?>
    </div>

    <script>
        function open_close(){
            var submit = document.querySelector('.submit');
            var search_done = document.querySelector('.search_done');
            submit.addEventListener("click",function(){
                search_done.classList.add('open');
            })
            document.addEventListener("click", function(event) {
                if (!search_done.contains(event.target) && !submit.contains(event.target)) {
                    search_done.classList.remove('open');
                }
            });
        }
        open_close();

    
    </script>
    
</body>
</html>