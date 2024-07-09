<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>

</head>
<body>
    <div class="wraper">
        <!--header-->
        <?php include 'layouts/header.php'; ?>
        <!--slider-->
        <div id="slider">
            <div class="slider-show">
                <div class="list-imgs">
                    <img src="https://images.fpt.shop/unsafe/fit-in/665x374/filters:quality(100):fill(white)/fptshop.com.vn/Uploads/Originals/2023/8/1/638264876653280122_dell-vostro-15-v3520-i5-1235u-ket-noi.png" alt="" class="img_slide">
                    <img src="" alt="" class="">
                    <img src="" alt="" class="">
                    <img src="" alt="" class="">
                </div>
            </div>
        </div>
        <!--container-->
        <div id="container" class="grid wide">
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
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home&page=1" class="page_product_direcational">1</a>
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home&page=2" class="page_product_direcational" style="margin: 0 8px;">2</a>
                <a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home&page=3" class="page_product_direcational">3</a>
            </div>
        </div>
        <!--contact-->
        <div class="contact-container contact-content contact-padding-64 grid wide" style="max-width:950px; margin-top: 80px;" id="contact">
            <h2 class="contact-wide contact-center">LIÊN HỆ</h2>
            <p class="contact-opacity contact-center"><i>liên hệ ngay</i></p>
            <div class="contact-row contact-padding-32">
                <div class="contact-col m6 contact-large contact-margin-bottom">
                    <i class="fa-solid fa-location-dot" style="width:30px; color: black;"></i> Da nang, VN<br>
                    <i class="fa fa-phone" style="width:30px; color: #555;"></i> Phone: 19000000<br>
                    <i class="fa fa-envelope" style="width:30px; color: black;"> </i> Email: toannvpd09637@fpt.edu.vn<br>
                </div>
                <div class="contact-col m6">
                    <form action="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=contact&action=add_contacts" method="post" target="_blank">
                        <input class="contact-input contact-border" type="email" placeholder="Email" required name="Email">
                        <input class="contact-input contact-border" type="tel" placeholder="Phone" required name="Phone">
                        <textarea class="contact-input contact-border" type="text" placeholder="content" required name="content" style="resize: none; overflow: hidden;"></textarea>
                        <button class="contact-button contact-black contact-section contact-right" type="submit">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
          
        <!--footer-->
    
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
        const img1 = document.querySelector('.img_slide');
        let i = 1;
        let arr = ["https://images.fpt.shop/unsafe/fit-in/665x374/filters:quality(100):fill(white)/fptshop.com.vn/Uploads/Originals/2023/10/12/638327041739877048_iphone-15-pro-max-2.jpg",
           "https://images.fpt.shop/unsafe/fit-in/665x374/filters:quality(100):fill(white)/fptshop.com.vn/Uploads/Originals/2023/10/12/638327041738940000_iphone-15-pro-max-19.jpg",
           "https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/apple-tv-4k-2021-7.JPG",
           "https://images.fpt.shop/unsafe/fit-in/665x374/filters:quality(100):fill(white)/fptshop.com.vn/Uploads/Originals/2023/8/1/638264876661115691_dell-vostro-15-v3520-i5-1235u-ban-phim.png"
];
        let chay = function(){
            img1.src = arr[i];
            i++;
            if(i == 4){
                i = 0;
            }
        }
        setInterval(chay,2000);
    
    </script>
    
</body>
</html>