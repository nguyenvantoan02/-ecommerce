<?php session_start();?>
<?php require './models/comment.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/home.css">    
    <link rel="stylesheet" href="./assets/css/detail.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <div class="wraper grid wide ">
        <!--header-->
        <?php include 'layouts/header.php';?>
        <!-- detail-->
        <div class="detail_product_main">
            <div class="detail_product">
                <section class="detail_product_img">
                <?php 
                    if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['address']) && isset($_GET['tel']) && isset($_GET['price_new']) && isset($_GET['information']) && isset($_GET['sell_number']) && isset($_GET['img']) && isset($_GET['time_create']) && isset($_GET['category_id']) && isset($_GET['price_old'])){
                        $id =$_GET['id'];
                        $name =$_GET['name'];
                        $address =$_GET['address'];
                        $tel =$_GET['tel'];
                        $price_new =$_GET['price_new'];
                        $information =$_GET['information'];
                        $sell_number =$_GET['sell_number'];
                        $img =$_GET['img'];
                        $price_old =$_GET['price_old'];
                        $time_create =$_GET['time_create'];
                        $category_id =$_GET['category_id'];
                        //
                        $conn = mysqli_connect('localhost','root','123456','php2');
                        $select = "SELECT category_name FROM categories WHERE category_id = $category_id";
                        $result = mysqli_query($conn,$select);
                        $row = mysqli_fetch_array($result);
                        $category_name = $row['category_name'];
                        $cmts = comment::comments($id);
                        //
                        $deal=(($price_old-$price_new)/$price_old)*100;

                             
                ?>
                    <div class="detail_img_big">
                        <!---->
                        <img src="<?php echo $img?>" alt="ảnh" width="450px" height="449px">
                    </div>
                    <ul class="detail_img_list">
                        <li class="detail_img">
                            <img src="" alt="" class="img_hover" width="82px" height="82px"> 
                            <img src="" alt="" class="img_hover2">
                        </li>
                        <li class="detail_img">
                            <img src="" alt="" class="img_hover" width="82px" height="82px"> 
                            <img src="" alt="" class="img_hover2">
                        </li>
                        <li class="detail_img">
                            <img src="" alt="" class="img_hover" width="82px" height="82px"> 
                            <img src="" alt="" class="img_hover2">
                        </li>
                        <li class="detail_img">
                            <img src="" alt="" class="img_hover" width="82px" height="82px"> 
                            <img src="" alt="" class="img_hover2">
                        </li>
                        <li class="detail_img">
                            <img src="" alt="" class="img_hover" width="82px" height="82px"> 
                            <img src="" alt="" class="img_hover2">
                        </li>
                    </ul>
                    <div class="detail_social">
                        <section class="detail_social_share">
                            <p>Chia sẻ: </p>
                            <div class="list_social">
                                <i class="fa-brands fa-facebook" style="color: blue; font-size: 18px;"></i>
                                <i class="fa-brands fa-tiktok" style="color: black; font-size: 18px;"></i>
                                <i class="fa-brands fa-square-x-twitter" style="color: black; font-size: 18px;"></i>
                                <i class="fa-brands fa-instagram" style="color: pink; font-size: 18px;"></i>
                            </div>
                        
                        </section>
                        <section class="detail_social_like">
                            <i class="fa-solid fa-heart" style="color: red; font-size: 18px;"></i>
                            <i>Đã thích: 187.</i>
                        </section>
                    </div> 
                </section>

                <form action="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=cart&action=cart_order_handle" method="post" class="detail_product_informations">
                    <section class="information_categories">
                        <strong style="display:flex; align-items: center;">
                            Danh mục: <i style="background-color: #f6412d; font-size: 12px; color: #fff; padding: 4px 8px;"><?php echo $category_name; ?></i>
                        </strong>
                    </section>
                    
                    <h2 class="information_name"><strong><?php echo $name; ?></strong></h2>
                    <!----><input type="hidden" name="name" value="<?php echo htmlspecialchars($name)?>"><!-- 1-->
                    <!----><input type="hidden" name="id" value="<?php echo htmlspecialchars($id)?>"><!-- 2-->
                    <!----><input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category_id)?>"><!-- 3-->
                    <section class="information_list_star">
                        <p>5.0</p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </section>

                    <section class="information_price">
                        <input type="hidden" name="img" value="<?php echo htmlspecialchars($img)?>"><!-- 4-->
                        <div class="information_price_old"><?php echo $price_old; ?>vnđ</div>
                        <div class="information_price_new"><?php echo $price_new; ?>vnđ</div>
                        <!----><input type="hidden" name="price_new" value="<?php echo htmlspecialchars($price_new)?>"><!-- 5-->
                        <div class="information_price_deal"><?php echo sprintf('%d', $deal); ?>% giảm</div>
                    </section>

                    <section class="information_ship">
                        <p>Vận chuyển</p>
                        <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/productdetailspage/d9e992985b18d96aab90.png" alt="" width="28px" height="28px">
                        <div>Miễn phí vận chuyển.</div>
                    </section>
                    
                    <section class="information_quantity">
                        <p>Số lượng</p>
                        <div class="information_quantity_select">
                            <button type="button" onclick="Up_down(-1)">-</button>
                            <input type="text" name="quantity" id="quantiy_product_buy" value=1>
                            <!---->
                            <button type="button" onclick="Up_down(1)">+</button>
                        </div>
                    </section>
                    <section class="information_product_current">
                        <?php echo $information; ?>
                        <!----><input type="hidden" name="infor" value="<?php echo htmlspecialchars($information)?>"><!-- 6-->
                    </section>

                    <section class="information_button_list">
                        <button type="submit" class="button_add_cart" name="add_cart">
                            <i class="fa-solid fa-cart-plus"></i>
                            Thêm Vào Giỏ Hàng
                        </button>
                        <button type="submit" class="button_add_buy" name="add_order">
                            Mua Ngay
                        </button>
                    </section>
                </form>
               

            </div>
        </div>

        <div class="product_comment grid wide" style="margin-top: 50px;">
            <form action="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=comment&action=add_comments" method="post" class="write_comment">
                <textarea name="content" id="" placeholder="Nhập bình luận......" cols="30" rows="1"></textarea>
                <!---->
                <?php 
                    $user_id = $_SESSION['user_id'];
                    $username = $_SESSION['username'];
                ?>
                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id)?>">
                <input type="hidden" name="user_name" value="<?php echo htmlspecialchars($username)?>">
                <input type="hidden" name="p_id" value="<?php echo htmlspecialchars($id)?>">
                <button type="submit">Gửi<i class="fa-solid fa-paper-plane"></i></button>
            </form>
            <?php foreach($cmts as $cmt){?>
            <form action="" method="post" class="comment_user">
                <section class="comment_user_information">
                    <i class="fa-regular fa-user"></i>
                    <div>
                        <div><?php echo $cmt['user_name']?></div>
                        <p style="font-size: 12px; margin-left: 2px;"><?php echo $cmt['time_create']?></p>

                    </div>
                    <!---->
                    </section>
                <section class="comment_content">
                    <?php echo $cmt['content']?>
                    <!---->
                </section>
            </form>
            <?php }?>
            <?php }; ?>

            
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


        function Up_down(value){
            let quantity = document.getElementById('quantiy_product_buy');
            let currentQuantity = parseInt(quantity.value, 10); 
            if(value == -1){
                quantity.value = currentQuantity - 1;
                if(quantity.value < 1){
                    quantity.value = 1;
                }
            }else if(value == 1){
                quantity.value = currentQuantity + 1;
            }
        }

    
    </script>
    
</body>
</html>