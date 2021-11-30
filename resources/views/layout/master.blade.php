<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Công ty chứng thực chữ ký số MADEVN</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <link href="{{asset('static-html/css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('static-html/css/custom.css')}}" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}">
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ route('posts.index') }}">Trang chủ</a>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url(@yield('bg'))">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>CÔNG TY MADEVN</h1>
                        <span class="subheading">Giải pháp chứng thực chữ ký số cho doanh nghiệp</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @if(isset($is_home))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://vnpt-ca.vn/images/banner/banner1-01.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://vnpt-ca.vn/images/banner/banner2-01.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://vnpt-ca.vn/images/banner/banner3-01.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div style="text-align:center; color: blue; margin-top: 50px;"><h2>Giới thiệu về chữ kí số<h2></div>
            <div class="col-md-12">
                <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">CHỮ KÝ SỐ</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">KÝ SỐ</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">CHỨNG THƯ SỐ</button>
                    </li>
                </ul>
                <div class="tab-content Tabside mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="tab-custom">
                            <div class="TabImage">
                                <div class="img1">
                                    <figure>
                                        <img src="https://vnpt-ca.vn:443/images/about-img3.jpg" alt="Chữ ký số">
                                    </figure>
                                </div>
                            </div>
                            <div class="Description">
                                <h3>Chữ ký số</h3>
                                <p>- Chữ ký số là một dạng chữ ký điện tử.</p>
                                <p>- Chữ ký số dựa trên công nghệ mã khóa công khai (RSA): mỗi
                                    người dùng phải có 1 cặp khóa (keypair) gồm khóa công khai (public
                                    key) và khóa bí mật (private key).</p>
                                <p>- Khóa bí mật là một khóa trong cặp khóa thuộc hệ thống mật
                                    mã không đối xứng, được dùng để tạo chữ ký số</p>
                                <p>- Khóa công khai là một khóa trong cặp khóa thuộc hệ thống
                                    mật mã không đối xứng, được sử dụng để kiểm tra chữ ký số được tạo
                                    bởi khóa bí mật tương ứng trong cặp khóa.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="tab-custom">
                            <div class="TabImage">
                                <div class="img1">
                                    <figure>
                                        <img src="https://vnpt-ca.vn:443/images/about-img2.jpg" alt="Chữ ký số">
                                    </figure>
                                </div>
                            </div>
                            <div class="Description">
                                <h3>Ký số</h3>
                                <p>- Ký số là việc đưa khóa bí mật vào một chương trình phần
                                    mềm để tự động tạo và gắn chữ ký số vào thông điệp dữ liệu.</p>
                                <p>- Người ký là thuê bao dùng đúng khóa bí mật của mình để ký
                                    số vào một thông điệp dữ liệu dưới tên của mình.</p>
                                <p>- Người nhận là tổ chức, cá nhân nhận được thông điệp dữ
                                    liệu được ký số bởi người ký, sử dụng chứng thư số của người ký đó
                                    để kiểm tra chữ ký số trong thông điệp dữ liệu nhận được và tiến
                                    hành các hoạt động, giao dịch có liên quan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="tab-custom">
                            <div class="TabImage">
                                <div class="img1">
                                    <figure>
                                        <img src="https://vnpt-ca.vn:443/images/about-img3.jpg" alt="Chữ ký số">
                                    </figure>
                                </div>
                            </div>
                            <div class="Description">
                                <h3>Chứng thư số</h3>
                                <p>- Chứng thư số là một dạng chứng thư điện tử do tổ chức cung
                                    cấp dịch vụ chứng thực chữ ký số cấp.</p>
                                <p>- Chứng thư số có thể được xem như là một “chứng minh thư”
                                    sử dụng trong môi trường máy tính và Internet.</p>
                                <p>- Chứng thư số được sử dụng để nhận diện một cá nhân, một
                                    máy chủ, hoặc một vài đối tượng khác và gắn định danh của đối
                                    tượng đó với một khóa công khai (public key), được cấp bởi những
                                    tổ chức có thẩm quyền xác nhận định danh và cấp các chứng thư số.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align:center; color: blue; margin-top: 50px;"><h2>Bảng giá chứng thư số</h2></div>
            <div style="text-align:center;">MADEVN trân trọng thông báo với Quý Khách hàng bảng giá Chứng thư số Doanh nghiệp như sau:</div>
            <div class="col-md-12">
                <ul class="nav nav-tabs mt-5" id="myTab2" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home1" type="button" role="tab" aria-controls="home" aria-selected="true">ĐĂNG KÝ MỚI</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile1" type="button" role="tab" aria-controls="profile" aria-selected="false">GIA HẠN</button>
                    </li>
                </ul>
                <div class="tab-content Tabside mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-bordered">
                            <thead style="background-color: rgba(30, 144, 255, 0.8)">
                                <tr>
                                    <th style="text-align: center">Tên gói dịch vụ</th>
                                    <th style="text-align: center">Thời hạn</th>
                                    <th style="text-align: center">Giá dịch vụ</th>
                                    <th style="text-align: center">Giá token</th>
                                    <th style="text-align: center">Tổng gói cước</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>OID Standard 01 năm</td>
                                    <td>12 tháng</td>
                                    <td>1.273.000</td>
                                    <td>550.000</td>
                                    <td>1.823.000</td>
                                </tr>
                                <tr>
                                    <td>OID Standard 02 năm</td>
                                    <td>24 tháng</td>
                                    <td>2.190.000</td>
                                    <td>550.000</td>
                                    <td>2.740.000</td>
                                </tr>
                                <tr>
                                    <td>OID Standard 03 năm</td>
                                    <td>36 tháng</td>
                                    <td>3.112.000</td>
                                    <td>Đã bao gồm</td>
                                    <td>3.112.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-bordered">
                            <thead style="background-color: rgba(30, 144, 255, 0.8)">
                                <tr>
                                    <th style="text-align: center">Tên gói dịch vụ</th>
                                    <th style="text-align: center">Thời hạn</th>
                                    <th style="text-align: center">Giá dịch vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>OID Standard 01 năm</td>
                                    <td>12 tháng</td>
                                    <td>1.273.000</td>
                                </tr>
                                <tr>
                                    <td>OID Standard 02 năm</td>
                                    <td>24 tháng</td>
                                    <td>2.191.000</td>
                                </tr>
                                <tr>
                                    <td>OID Standard 03 năm</td>
                                    <td>36 tháng</td>
                                    <td>2.912.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="section-title">
                    <h2 class="text-center" style="color: blue;">Khách hàng tiêu biểu</h2>
                </div>
                <div id="owl-customer" class="owl-carousel owl-theme">
                    <div class="item">
                        <img class="img-responsive" src="https://vnpt-ca.vn:443/images/customer/camau-1.png" alt="">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="https://vnpt-ca.vn:443/images/customer/ivb-1.png" alt="">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="https://vnpt-ca.vn:443/images/customer/mxp-1.png" alt="">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="https://vnpt-ca.vn:443/images/customer/fwd-1.png" alt="">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="https://vnpt-ca.vn:443/images/customer/shb-1.png" alt="">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="https://vnpt-ca.vn:443/images/customer/bsc-1.png" alt="">
                    </div>
                </div>
            </div>
            <style>
                #owl-customer .item {
                    margin: 10px;
                    color: #FFF;
                    text-align: center;
                }
            </style>
        </div>
    </div>
	<div style="text-align:center;color:blue"><h2>Liên hệ đăng ký sử dụng</h2></div>
	<div style="text-align:center;color:red"><h3>Hotline: 1900 8080</h3></div>
	<div style="text-align:center;color:red"><h3>Tòa nhà VNPT, số 57 phố Huỳnh Thúc Kháng, Phường Láng Hạ, Quận Đống Đa, Thành phố Hà Nội, Việt Nam</h3></div>
    @endif

    <!-- Main Content-->
    @yield('content')
    <!--Footer-->
    <div id="banquyen" style="text-align:center;"> Hotline 19008080 - MADEVN &copy 2019. ALL RIGHTS RESERVED
        
        
    </div>
    <!-- Bootstrap core JS-->
    <script src="{{asset('jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="{{asset('static-html/js/scripts.js')}}"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            items: 2
        })
    </script>
</body>

</html>