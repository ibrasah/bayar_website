<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" type="image/png" href="{{asset('img/icons/favicon.ico')}}"/>
    <!--
Tinker Template
http://www.templatemo.com/tm-506-tinker
-->
    <title>Pembayaran SPP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontAwesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/hero-slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
    

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse"
                        data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand scroll-top"><em>B</em>ayar's</a>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="scroll-top">Home</a></li>
                        <li><a href="#" class="scroll-link" data-id="about">About Us</a></li>
                        <li><a href="#" class="scroll-link" data-id="portfolio">Portfolio</a></li>
                        <li><a href="#" class="scroll-link" data-id="testimonial">Blog</a></li>
                        <li><a href="#" class="scroll-link" data-id="blog">Download</a></li>
                        <li><a href="{{URL('/assets/file/bayar.pdf')}}" target="_blank">Dokumentasi</a></li>
                        <li><a href="{{URL('login')}}">ADMIN</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->


    <div class="parallax-content baner-content" id="home">
        <div class="container">
            <div class="text-content nah">
                <h2><em style="">CARA BARU <br> BAYAR UANG <br> PENDIDIKAN</em></h2>
                <p>Sistem Pembayaran uang Sekolah Terkini</p>
                <div class="primary-white-button">
                    <a href="#" class="scroll-link" data-id="about">Let's Start</a>
                </div>
            </div>
        </div>
    </div>


    <section id="about" class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/service_icon_01.png" alt="">
                        </div>
                        <h4>Payment Reminder</h4>
                        <div class="line-dec"></div>
                        <p>Pembayaran yang telah jatuh tempo akan diingatkan melalui Fiture chat yang kami sediakan.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/service_icon_02.png" alt="">
                        </div>
                        <h4>Secure</h4>
                        <div class="line-dec"></div>
                        <p>Kami menjamin keamanan terhadap 
                            transaksi yang terjadi pada masing-masing pihak, dan siap memfasilitasi sekaligus 
                            melakukan investigasi jika terjadi perselisihan transaksi.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/service_icon_03.png" alt="">
                        </div>
                        <h4>Online Reporting</h4>
                        <div class="line-dec"></div>
                        <p>Sekolah dan Yayasan memiliki reporting yang dapat di akses secara real-time dan 
                            terhubung dengan berbagai institusi pembayaran yang telah terintegrasi.
                        </p>
                        <div class="primary-blue-button">
                            <a href="#" class="scroll-link" data-id="portfolio">Continue Reading</a>
                       </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

    <section id="portfolio">
        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="section-heading">
                            <h4>Bayar'S App</h4>
                            <div class="line-dec"></div>
                            <p>Platform untuk Murid, Mahasiswa, dan Orang Tua untuk membayar keperluan 
                                sekolah dari aplikasi pembayaran favorit mereka.</p>
                            <div class="filter-categories">
                                <ul class="project-filter">
                                    <li class="filter" data-filter="branding"><span>Bayar'S</span></li>
                                    <li class="filter" data-filter="home"><span>Home Page</span></li>
                                    <li class="filter" data-filter="pay"><span>Payment</span></li>
                                    <li class="filter" data-filter="chat"><span>Chating</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="projects-holder-3">
                            <div class="projects-holder">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 project-item mix pay">
                                        <div class="thumb">
                                            <div class="image">
                                                <a href="img/portfolio_big_item_07.png" data-lightbox="image-1"><img
                                                        src="img/portfolio_big_item_07.png" style="height:300px;width:200px;margin-bottom:10px;"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 project-item mix chat">
                                        <div class="thumb">
                                            <div class="image">
                                                <a href="img/portfolio_big_item_02.png" data-lightbox="image-1"><img
                                                        src="img/portfolio_big_item_02.png" style="height:300px;width:200px;margin-bottom:10px;"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 project-item mix pay">
                                        <div class="thumb">
                                            <div class="image">
                                                <a href="img/portfolio_big_item_06.png" data-lightbox="image-1"><img
                                                        src="img/portfolio_big_item_06.png" style="height:300px;width:200px;margin-bottom:10px;"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 project-item mix graphic home">
                                        <div class="thumb">
                                            <div class="image">
                                                <a href="img/portfolio_big_item_04.png" data-lightbox="image-1"><img
                                                        src="img/portfolio_big_item_04.png" style="height:300px;width:200px;margin-bottom:10px;"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 project-item mix branding">
                                        <div class="thumb">
                                            <div class="image">     
                                                <a href="img/portfolio_big_item_05.png" data-lightbox="image-1"><img
                                                        src="img/portfolio_big_item_05.png" style="height:300px;width:200px;margin-bottom:10px;"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 project-item mix graphic chat">
                                        <div class="thumb">
                                            <div class="image">
                                                <a href="img/portfolio_big_item_03.png" data-lightbox="image-1"><img
                                                        src="img/portfolio_big_item_03.png" style="height:300px;width:200px;margin-bottom:10px;"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div id="owl-testimonials" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="testimonials-item">
                                <p>“ Saya berterima kasih kepada CEO Bayar's karena dengan adnya aplikasi ini sekolah kami menjadi kerja lebih efisien. ”</p>
                                <h4>Yoga Nasution.Spd</h4>
                                <span>Kepala Sekolah SDN 01 Menteng</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <p>“ Semoga aplikasi ini bisa digunakan seluruh sekolah di Indonesia ”</p>
                                <h4>Ir. Pramudianto</h4>
                                <span>Kepala Sekolah SMU Harapan Bangsa</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <p>“ Saya percaya dengan mengembangkan aplikasi ini pasti semua pihak diuntungkan, terutama wali murid bisa menjadi lebih mudah dalam melakukan pembayaran sekolah ”</p>
                                <h4>Danny Priambodo</h4>
                                <span>Siswa SMA 1 Malang</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <p>“ Dukung aplikasi karya anak bangsa dengan membayar SPP dengan menggunakan Aplikasi Bayar'S !!! ”</p>
                                <h4>Ibu Nanik Sudahmasih.Spd</h4>
                                <span>SMA Bina Ilmu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="testi">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="judul">
                            <h1>Melalui Banyak Metode Pembayaran</h1>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="channel">
                            <div class="channel-option">
                                <div>
                                    <img src="img/bank.png" alt=""><br>
                                    <h5>Bank</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="channel">
                            <div class="channel-option">
                                <div>
                                    <img src="img/bcellphone.png" alt=""><br>
                                    <h5>App's</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="channel">
                            <div class="channel-option">
                                <div>
                                    <img src="img/blist.png" alt=""><br>
                                    <h5>Struk Tranfer</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <div class="tabs-content" id="blog">
        <div class="container">
            <div class="row">
                <div class="section-heading">
                    <h1>DOWNLOAD</h1>
                    <h5>Untuk APK Android</h5>
                    <div class="download">
                        <div class="col-md-12 text-center">
                            <p>
                                <a href="{{URL('/assets/file/Bayars.apk')}}" class="btn btn-primary download">Download</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h4>BENEFIT UNTUK SEKOLAH & YAYASAN?</h4>
                        <div class="line-dec"></div>
                        <p>Semua tagihan seperti SPP, Uang Buku, Sumbangan dan lain-lain, akan 
                            lebih mudah diinformasikan dan dibayarkan oleh orang tua siswa. IDN 
                            mendukung penuh gerakan paperless untuk semua sekolah.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="map">
        <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
        -->
        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7895.485196115994!2d103.85995441789784!3d1.2880401763270322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7fb4e58ad9cd826e!2sSingapore+Flyer!5e0!3m2!1sen!2sth!4v1505825620371" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7463860762664!2d106.76277711449272!3d-6.164708962132398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f793e5d2ad35%3A0x5b339bf0290d368d!2sPT.%20Nusa%20Teknologi%20Persada%20(NTP)!5e0!3m2!1sen!2sid!4v1568429687523!5m2!1sen!2sid"
            width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen></iframe>
    </div>
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="logo">
                        <a class="logo-ft scroll-top" href="#"><em>B</em>ayar's</a>
                        <p>Copyright &copy; PT. Nusa Teknologi Persada
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="location">
                        <h4>Our Office Location</h4>
                        <ul>
                            <li>Jalan Inpres No. 13 & 14 Kav.27A, RT.1/RW.1, Kedoya Utara, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11520</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12">
                    <div class="contact-info">
                        <h4>More Info</h4>
                        <ul>
                            <li><em>Phone</em>: 090-090-0320</li>
                            <li><em>Email</em>: bayar@official.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12">
                    <div class="connect-us">
                        <h4>Get Social with us</h4>
                        <ul>
                            <li><a href="https://twitter.com/login?lang=en"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.google.com"><i class="fa fa-google"></i></a></li>
                            <li><a href="https://www.whatsapp.com"><i class="fa fa-whatsapp"></i></a></li>
                            <li><a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 50;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>



</body>

</html>