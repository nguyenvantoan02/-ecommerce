<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới Thiệu</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
        line-height: 1.6;

    }
    html{
        scroll-behavior: smooth;

    }

    header {
        background-image: linear-gradient(#f6412d, #fe6232);
        color: white;
        padding: 1rem;
        text-align: center;
        position: relative;

    }

    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: center;
        background-color: #333;

    }

    nav ul li {
        margin: 0 1rem;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
        padding: 1rem;
        display: block;

    }

    nav ul li a:hover {
        background-color: #555;
    }

    .title {
        margin: 0;
        font-size: 20px;
    }

    section {
        padding: 2rem;
        margin: 1rem auto;
        max-width: 800px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    h2 {
        color: #f6412d;
        margin-top: 0;
        font-size: 18px;
    }

    .team {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        justify-content: space-evenly;
    }

    .team-member {
        text-align: center;
        flex-basis: calc(33.333% - 2rem);
        background-color: #f1f1f1;
        padding: 1rem;
        border-radius: 8px;
    }

    .team-member img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }

    .team-member h3 {
        margin-top: 1rem;
        margin-bottom: 0.5rem;
    }

    .services {
        /* display: flex;
        flex-wrap: wrap;
        gap: 2rem; */
    }
    .service-list-item{
        display: flex;
        flex-wrap: wrap;
        margin-right: -10px;
        margin-left: -10px;
        
    }
    .service-box{
        flex-basis: calc(100%/2);
        padding-left: 10px;
        padding-right: 10px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }
    .service-item {
        background-color: #f1f1f1;
        padding: 1rem;
        border-radius: 8px;
        text-align: center;
        box-sizing: border-box;
    }

    .service-item h3 {
        color: #333;
    }

   
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="http://localhost/mvc-routing-Ver1.1/mvc-routing/index.php?controller=home&action=home"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
                <li><a href="#about">Về Chúng Tôi</a></li>
                <li><a href="#mission">Sứ Mệnh</a></li>
                <li><a href="#vision">Tầm Nhìn</a></li>
                <li><a href="#team">Đội Ngũ</a></li>
                <li><a href="#services">Dịch Vụ</a></li>
            </ul>
        </nav>
        <h1 class="title">Giới Thiệu</h1>
    </header>
    
    <section id="about" class="about">
        <h2>Về Chúng Tôi</h2>
        <p>Website Poly shop, luôn không ngừng cải tiến và cung cấp những dịch trải nghiệm tốt nhất cho khách hàng.</p>
        <p>Thành lập vào năm 2024, công ty của chúng tôi đã và đang cung cấp những dịch vụ chất lượng cao trong lĩnh vực công nghệ thông tin và tư vấn giải pháp kinh doanh. Chúng tôi tự hào với đội ngũ chuyên gia có kinh nghiệm và nhiệt huyết.</p>
    </section>

    <section id="mission" class="mission">
        <h2>Sứ Mệnh</h2>
        <p>Sứ mệnh của chúng tôi là cung cấp các giải pháp công nghệ tiên tiến, giúp khách hàng đạt được mục tiêu kinh doanh và nâng cao hiệu quả hoạt động.</p>
    </section>

    <section id="vision" class="vision">
        <h2>Tầm Nhìn</h2>
        <p>Chúng tôi hướng tới trở thành công ty hàng đầu trong lĩnh vực công nghệ, luôn đổi mới và phát triển để đáp ứng nhu cầu ngày càng cao của thị trường.</p>
    </section>
    
    <section id="team" class="team">
        <h2>Đội Ngũ</h2>
        <div class="team-member">
            <img src="" alt="Thành viên 1">
            <h3>Nguyễn Văn Toàn</h3>
            <p>Designer</p>
            <p>Nguyễn Văn Toàn thiết kế ra giao diện và dữ liệu trang web, với hơn 0 năm kinh nghiệm trong lĩnh vực công nghệ thông tin và quản lý dự án.</p>
        </div>

    </section>

    <section id="services" class="services">
        <h2>Dịch Vụ</h2>
        <div class="service-list-item">
            <div class="service-box">
                <div class="service-item">
                    <h3>Thiết Kế Website Bán Hàng</h3>
                    <p>Chúng tôi cung cấp dịch vụ thiết kế website bán hàng chuyên nghiệp, tối ưu hóa cho trải nghiệm người dùng và tăng cường khả năng bán hàng trực tuyến.</p>
                </div>
            </div>
            <div class="service-box">
                <div class="service-item">
                    <h3>Quản Lý Sản Phẩm</h3>
                    <p>Chúng tôi hỗ trợ quản lý sản phẩm, từ nhập liệu, quản lý tồn kho đến cập nhật thông tin sản phẩm, giúp bạn tiết kiệm thời gian và tối ưu hóa quy trình bán hàng.</p>
                </div>
            </div>
            <div class="service-box">
                <div class="service-item">
                    <h3>Chạy Quảng Cáo Trực Tuyến</h3>
                    <p>Chúng tôi cung cấp dịch vụ chạy quảng cáo trên các nền tảng như Google, Facebook, Instagram để tăng cường sự hiện diện và thu hút khách hàng tiềm năng.</p>
                </div>
            </div>
            <div class="service-box">
                <div class="service-item">
                    <h3>Hỗ Trợ Khách Hàng 24/7</h3>
                    <p>Dịch vụ hỗ trợ khách hàng của chúng tôi luôn sẵn sàng giải đáp mọi thắc mắc và xử lý các vấn đề của khách hàng một cách nhanh chóng và hiệu quả.</p>
                </div>
            </div>
            <div class="service-box">
                <div class="service-item">
                    <h3>Tư Vấn Chiến Lược Kinh Doanh</h3>
                    <p>Đội ngũ chuyên gia của chúng tôi sẽ tư vấn cho bạn các chiến lược kinh doanh, giúp bạn xây dựng và phát triển thương hiệu, tăng doanh số bán hàng.</p>
                </div>
            </div>
            <div class="service-box">
                <div class="service-item">
                    <h3>Phân Tích Dữ Liệu và Báo Cáo</h3>
                    <p>Chúng tôi cung cấp dịch vụ phân tích dữ liệu bán hàng và tạo báo cáo chi tiết, giúp bạn hiểu rõ hơn về tình hình kinh doanh và đưa ra các quyết định chiến lược đúng đắn.</p>
                </div>
            </div>

        </div>
    </section>
    
    
    
    <footer>
        <p style="text-align: center;"> 2024 Poly shop. Bảo lưu mọi quyền.</p>
    </footer>
</body>
</html>
