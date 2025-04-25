<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- ==============================================
        Basic Page Needs
        =============================================== -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->

        <title>POLMIN</title>

        <meta name="description" content="Business, Consulting, Finance, Insurance, Startup and Technology">
        <meta name="subject" content="Business, Consulting, Finance, Insurance, Startup and Technology">
        <meta name="author" content="Codings">

        <!-- ==============================================
        Favicons
        =============================================== -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-touch-icon-114x114.png">

        <!-- ==============================================
        Vendor Stylesheet
        =============================================== -->
        <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/vendor/slider.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/vendor/icons.min.css">
        <link rel="stylesheet" href="assets/css/vendor/icons-fa.min.css">
        <link rel="stylesheet" href="assets/css/vendor/animation.min.css">
        <link rel="stylesheet" href="assets/css/vendor/gallery.min.css">
        <link rel="stylesheet" href="assets/css/vendor/cookie-notice.min.css">

        <!-- ==============================================
        Custom Stylesheet
        =============================================== -->
        <link rel="stylesheet" href="assets/css/default.css">

        <!-- ==============================================
        Theme Color
        =============================================== -->
        <meta name="theme-color" content="#21333e">

        <!-- ==============================================
        Theme Settings
        =============================================== -->
        <style>
            :root {
                --hero-bg-color: #080d10;
                
                --section-1-bg-color: #ffffff;
                --section-2-bg-color: #111117;
                --section-3-bg-color: #111117;
                --section-4-bg-color: #ffffff;
                --section-5-bg-color: #eef4ed;
                --section-6-bg-color: #111117;
                --section-7-bg-color: #ffffff;

                --footer-bg-color: #080d10; --footer-bg-image: url('../../assets/images/bg-7.jpg');
            }
        </style>
        
    </head>

    <body class="home">
        
        <!-- Preloader -->
        <div id="preloader" data-timeout="2000" class="odd preloader counter">
            <div data-aos="fade-up" data-aos-delay="500" class="row justify-content-center text-center items">
                <div data-percent="100" class="radial">
                    <span></span>
                </div>
            </div>
        </div>

        <!-- Header -->
		<?php include "inc_header.php";?>

        <!-- Hero -->
        <section id="slider" class="hero p-0 odd">
            <div class="swiper-container full-slider animation slider-h-100 slider-h-auto">
                <div class="swiper-wrapper">

                    <!-- Item 1 -->
                    <div class="swiper-slide slide-center">

                        <!-- Media -->
                        <img src="assets/images/bg-1.jpg" alt="Full Image" class="full-image" data-mask="40">

                        <div class="slide-content row">
                            <div class="col-12 d-flex justify-content-start inner">
                                <div class="left text-left">

                                    <!-- Content -->
                                    <h2 data-aos="zoom-in" data-aos-delay="2000" class="title effect-static-text">Orientasi Global</h2>
                                    <p data-aos="zoom-in" data-aos-delay="2400" class="description">Berorientasi Global, mengakar kuat pada kebajikan lokal dan potensi bangsa.</p>

                                    <!-- Action --
                                    <div data-aos="fade-up" data-aos-delay="2800" class="buttons">
                                        <div class="d-sm-inline-flex">
                                            <a href="#contact" class="smooth-anchor mt-4 btn primary-button">GET IN TOUCH</a>
                                            <a href="#video" class="smooth-anchor ml-sm-4 mt-4 btn outline-button">READ MORE</a>
                                        </div>
                                    </div>
									-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="swiper-slide slide-center">

                        <!-- Media -->
                        <img src="assets/images/bg-2.jpg" alt="Full Image" class="full-image" data-mask="40">  

                        <div class="slide-content row">
                            <div class="col-12 d-flex justify-content-start justify-content-md-center inner">
                                <div class="center text-left text-md-center">

                                    <!-- Content -->
                                    <h2 data-aos="zoom-in" data-aos-delay="400" class="title effect-static-text">Kawasan Industri</h2>
                                    <p data-aos="zoom-in" data-aos-delay="800" class="description mr-auto ml-auto">Didirikan di dalam Kawasan Industri MM2100, oleh expert & praktisi industri dan pendidikan.</p>
                                   
                                    <!-- Action --
                                    <div data-aos="fade-up" data-aos-delay="1200" class="buttons">
                                        <div class="d-sm-inline-flex">
                                            <a href="#contact" class="smooth-anchor mt-4 btn primary-button">GET IN TOUCH</a>
                                            <a href="#video" class="smooth-anchor ml-sm-4 mt-4 btn outline-button">READ MORE</a>
                                        </div>
                                    </div>
									-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 --
                    <div class="swiper-slide slide-center">

                        <img src="assets/images/bg-3.jpg" alt="Full Image" class="full-image" data-mask="40">     

                        <div class="slide-content row">
                            <div class="col-12 d-flex justify-content-start justify-content-md-end inner">
                                <div class="right text-left">

                                    <h1 data-aos="zoom-in" data-aos-delay="400" class="title effect-static-text">Audit & Assurance</h1>
                                    <p data-aos="zoom-in" data-aos-delay="800" class="description">Our focus is to map the technologies to solve the business transformation, offering services.</p>

                                    <div data-aos="fade-up" data-aos-delay="1200" class="buttons">
                                        <div class="d-sm-inline-flex">
                                            <a href="#contact" class="smooth-anchor mt-4 btn primary-button">GET IN TOUCH</a>
                                            <a href="#video" class="smooth-anchor ml-sm-4 mt-4 btn outline-button">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					-->

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <!-- Video -->
        <section id="video" class="section-1 highlights image-center">
            <div class="container smaller">
                <div class="row text-center intro">
                    <div class="col-12">
                        <span class="pre-title">Introduction</span>
                        <h2>Politeknik <span class="featured"><span>Mitra Industri</span></span></h2>
                        <p class="text-max-800">Politeknik Mitra Industri merupakan perguruan tinggi vokasi yang berlokasi di Kawasan Industri MM2100, Cikarang. Didirikan oleh para praktisi dan ahli pendidikan, kampus ini mengusung pembelajaran berbasis Teaching Factory dan Project-Based Learning, dengan kurikulum yang disusun sesuai kebutuhan industri. Fokus utamanya adalah mencetak lulusan yang kompeten, berkarakter, dan siap bersaing di dunia kerja nasional maupun global.</p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 gallery">
                        <img src="assets/images/bg-2x.jpg" class="w-100">
						
						<!--a href="https://vimeo.com/222990241" class="square-image d-flex justify-content-center align-items-center">
                            <i class="icon bigger fas fa-play clone"></i>
                            <i class="icon bigger fas fa-play"></i>
                            <img src="assets/images/video-1.jpg" class="fit-image" alt="Introduction Video">
                        </a-->
                    </div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section id="services" class="section-3 odd offers">
            <div class="container">
                <div class="row intro">
                    <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                        <span class="pre-title m-auto ml-md-0">Our business areas</span>
                        <h2>Konsentrasi <span class="featured"><span>POLMIN</span></span></h2>
                        <!--p>We are leaders in providing consultancy services with a set of cutting-edge technologies and a team of experienced and renowned professionals. These are some options that you can hire.</p-->
                    </div>
                    <!--div class="col-12 col-md-3 align-self-end">
                        <a href="#" class="btn mx-auto mr-md-0 ml-md-auto outline-button">SEE ALL</a>
                    </div-->
                </div>
                <div class="row justify-content-center items">
                    <div class="col-12 col-md-6 col-lg-6 item">
                        <div class="card">
                            <i class="icon icon-organization"></i>
                            <h4>Pembelajaran Praktis</h4>
                            <p>Pola belajar/kuliah tidak lagi dominan klasikal-konvensional, karena Teaching Factory (TEFA) mendorong mahasiswa belajar secara praktis dan kontekstual sesuai kebutuhan industri masa kini.</p>
                            <a href="page-single-service-1.html"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 item">
                        <div class="card">
                            <i class="icon icon-briefcase"></i>
                            <h4>Lokasi Strategis</h4>
                            <p>Kampus yang kreatif dan profesional ini berada di Kawasan Industri MM2100 Cikarang, dikelilingi ratusan perusahaan nasional maupun internasional yang mendukung proses pembelajaran kontekstual.</p>
                            <a href="page-single-service-1.html"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 item">
                        <div class="card">
                            <i class="icon icon-chart"></i>
                            <h4>Proyek Nyata</h4>
                            <p>Mahasiswa program Sarjana Terapan dan jenjang lainnya belajar melalui Teaching Factory (TEFA) yang menerapkan project-based learning dari proyek nyata industri di dalam maupun luar kawasan.</p>
                            <a href="page-single-service-1.html"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 item">
                        <div class="card">
                            <i class="icon icon-plane"></i>
                            <h4>Kurikulum Industri</h4>
                            <p>Kurikulum dan metode pembelajaran TEFA disesuaikan langsung dengan kebutuhan riil industri dan perusahaan, baik yang berada dalam kawasan industri maupun yang berada di luar kawasan.</p>
                            <a href="page-single-service-1.html"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 item">
                        <div class="card">
                            <i class="icon icon-globe-alt"></i>
                            <h4>Karakter Unggul</h4>
                            <p>Pembelajaran mengutamakan pembentukan karakter kerja positif, berlandaskan akhlak mulia dan etika, serta dilengkapi softskills dan hardskills sesuai tuntutan dunia kerja saat ini.</p>
                            <a href="page-single-service-1.html"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 item">
                        <div class="card">
                            <i class="icon icon-drawer"></i>
                            <h4>Akar Lokal</h4>
                            <p>Kampus berorientasi global namun tetap menjunjung tinggi nilai-nilai lokal, mengakar kuat pada budaya luhur dan kebijaksanaan lokal sebagai pondasi menghadapi tantangan global.</p>
                            <a href="page-single-service-1.html"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                        </div>
                    </div>
					<div class="col-12 col-md-6 col-lg-6 item">
                        <div class="card">
                            <i class="icon icon-drawer"></i>
                            <h4>Kolaborasi Ahli</h4>
                            <p>Kampus ini didirikan oleh para ahli dari industri dan pendidikan terapan, dan menerapkan Teaching Factory berbasis real project-based learning yang langsung dari dunia kerja.</p>
                            <a href="page-single-service-1.html"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog -->
        <section id="blog" class="section-5 carousel showcase">
            <div class="overflow-holder">
                <div class="container">
                    <div class="row intro">
                        <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                            <span class="pre-title m-auto m-md-0">Our editorial content</span>
                            <h2>Latest <span class="featured"><span>News</span></span></h2>
                            <p>Every week we publish content about what is best in the business world.</p>
                        </div>
                        <div class="col-12 col-md-3 align-self-end">
                            <a href="#" class="btn mx-auto mr-md-0 ml-md-auto primary-button">SEE ALL</a>
                        </div>
                    </div>
                    <div class="swiper-container mid-slider items" data-perview="3"> 
                        <div class="swiper-wrapper">
                            <div class="swiper-slide slide-center item">
                                <div class="row card p-0 text-center">
                                    <div class="image-over">
                                        <img src="assets/images/news-3.jpg" alt="Lorem ipsum">
                                    </div>
                                    <div class="card-footer d-lg-flex align-items-center justify-content-center">
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-user"></i>Admin</a>
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-clock"></i>01-04-2025</a>
                                    </div>
                                    <div class="card-caption col-12 p-0">
                                        <div class="card-body">
                                            <a href="page-single-post-1.html">
                                                <h4>Kampus berorientasi global yang menjunjung tinggi nilai lokal</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide slide-center item">
                                <div class="row card p-0 text-center">
                                    <div class="image-over">
                                        <img src="assets/images/news-4.jpg" alt="Lorem ipsum">
                                    </div>
                                    <div class="card-footer d-lg-flex align-items-center justify-content-center">
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-user"></i>Admin</a>
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-clock"></i>03-04-2025</a>
                                    </div>
                                    <div class="card-caption col-12 p-0">
                                        <div class="card-body">
                                            <a href="page-single-post-1.html">
                                                <h4>Kampus ini didirikan oleh para ahli dari industri dan pendidikan terapan</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide slide-center item">
                                <div class="row card p-0 text-center">
                                    <div class="image-over">
                                        <img src="assets/images/news-5.jpg" alt="Lorem ipsum">
                                    </div>
                                    <div class="card-footer d-lg-flex align-items-center justify-content-center">
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-user"></i>Admin</a>
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-clock"></i>06-04-2025</a>
                                    </div>
                                    <div class="card-caption col-12 p-0">
                                        <div class="card-body">
                                            <a href="page-single-post-1.html">
                                                <h4>Kurikulum dan metode pembelajaran TEFA riil kebutuhan insdustri</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide slide-center item">
                                <div class="row card p-0 text-center">
                                    <div class="image-over">
                                        <img src="assets/images/news-3.jpg" alt="Lorem ipsum">
                                    </div>
                                    <div class="card-footer d-lg-flex align-items-center justify-content-center">
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-user"></i>Admin</a>
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-clock"></i>01-04-2025</a>
                                    </div>
                                    <div class="card-caption col-12 p-0">
                                        <div class="card-body">
                                            <a href="page-single-post-1.html">
                                                <h4>Kampus berorientasi global yang menjunjung tinggi nilai lokal</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide slide-center item">
                                <div class="row card p-0 text-center">
                                    <div class="image-over">
                                        <img src="assets/images/news-4.jpg" alt="Lorem ipsum">
                                    </div>
                                    <div class="card-footer d-lg-flex align-items-center justify-content-center">
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-user"></i>Admin</a>
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-clock"></i>03-04-2025</a>
                                    </div>
                                    <div class="card-caption col-12 p-0">
                                        <div class="card-body">
                                            <a href="page-single-post-1.html">
                                                <h4>Kampus ini didirikan oleh para ahli dari industri dan pendidikan terapan</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide slide-center item">
                                <div class="row card p-0 text-center">
                                    <div class="image-over">
                                        <img src="assets/images/news-5.jpg" alt="Lorem ipsum">
                                    </div>
                                    <div class="card-footer d-lg-flex align-items-center justify-content-center">
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-user"></i>Admin</a>
                                        <a href="#" class="d-lg-flex align-items-center"><i class="icon-clock"></i>06-04-2025</a>
                                    </div>
                                    <div class="card-caption col-12 p-0">
                                        <div class="card-body">
                                            <a href="page-single-post-1.html">
                                                <h4>Kurikulum dan metode pembelajaran TEFA riil kebutuhan insdustri</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Subscribe --
        <section id="subscribe" class="section-6 odd subscribe">
            <div class="container smaller">
                <div class="row">
                    <div class="col-12 col-md-6 m-md-0 intro">
                        <span class="pre-title m-0">Newsletter</span>
                        <h2><span class="featured"><span>Know</span></span> First</h2>
                        <p>Follow closely and receive content about our company and the news of the current market.</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <form action="php/form.php" id="nexgen-subscribe" class="row m-auto items">
                            <input type="hidden" name="section" value="nexgen_subscribe">

                            <input type="hidden" name="reCAPTCHA">
                            
                            <div class="col-12 mt-0 input-group align-self-center item">
                                <input type="text" name="name" class="form-control field-name" placeholder="Name">
                            </div>
                            <div class="col-12 input-group align-self-center item">
                                <input type="email" name="email" class="form-control field-email" placeholder="Email">
                            </div>
                            <div class="col-12 input-group align-self-center item">
                                <a data-aos="zoom-in" class="btn primary-button">SUBSCRIBE</a>
                            </div>
                            <div class="col-12 item">
                                <span class="form-alert mt-3 mb-0"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
		-->

        <!-- Contact --
        <section id="contact" class="section-7 form contact">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 pr-md-5 align-self-center text">
                        <div class="row intro">
                            <div class="col-12 p-0">
                                <span class="pre-title m-0">Send a message</span>
                                <h2>Get in <span class="featured"><span>Touch</span></span></h2>
                                <p>We will respond to your message as soon as possible.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <form action="php/form.php" id="nexgen-simple-form" class="nexgen-simple-form">
                                    <input type="hidden" name="section" value="nexgen_form">

                                    <input type="hidden" name="reCAPTCHA">
                       
                                    <div class="row form-group-margin">
                                        <div class="col-12 col-md-6 m-0 p-2 input-group">
                                            <input type="text" name="name" class="form-control field-name" placeholder="Name">
                                        </div>
                                        <div class="col-12 col-md-6 m-0 p-2 input-group">
                                            <input type="email" name="email" class="form-control field-email" placeholder="Email">
                                        </div>
                                        <div class="col-12 col-md-6 m-0 p-2 input-group">
                                            <input type="text" name="phone" class="form-control field-phone" placeholder="Phone">
                                        </div>
                                        <div class="col-12 col-md-6 m-0 p-2 input-group">
                                            <i class="icon-arrow-down mr-3"></i>
                                            <select name="info" class="form-control field-info">
                                                <option value="" selected disabled>More Info</option>
                                                <option>Audit & Assurance</option>
                                                <option>Financial Advisory</option>
                                                <option>Analytics and M&A</option>
                                                <option>Middle Marketing</option>
                                                <option>Legal Consulting</option>
                                                <option>Regulatory Risk</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                        <div class="col-12 m-0 p-2 input-group">
                                            <textarea name="message" class="form-control field-message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-12 col-12 m-0 p-2 input-group">
                                            <span class="form-alert"></span>
                                        </div>
                                        <div class="col-12 input-group m-0 p-2">
                                            <a class="btn primary-button">SEND</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="contacts">
                            <h4>Example Inc.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p>Praesent diam lacus, dapibus sed imperdiet consectetur.</p>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-phone-alt mr-2"></i>
                                        +1 (305) 1234-5678
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-envelope mr-2"></i>
                                        hello@example.com
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        Main Avenue, 987
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="mt-2 btn outline-button" data-toggle="modal" data-target="#map">VIEW MAP</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		-->
        
        <!-- Footer -->
        <?php include "inc_footer.php";?>

        <!-- Modal [search] -->
        <div id="search" class="p-0 modal fade" role="dialog" aria-labelledby="search" aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideout" role="document">
                <div class="modal-content full">
                    <div class="modal-header" data-dismiss="modal">
                        <i class="icon-close fas fa-arrow-right"></i>
                    </div>
                    <div class="modal-body">
                        <form class="row">
                            <div class="col-12 p-0 align-self-center">
                                <div class="row">
                                    <div class="col-12 p-0">
                                        <h2>What are you looking for?</h2>
                                        <div class="badges">
                                            <span class="badge"><a href="#">Consulting</a></span>
                                            <span class="badge"><a href="#">Audit</a></span>
                                            <span class="badge"><a href="#">Assurance</a></span>
                                            <span class="badge"><a href="#">Advisory</a></span>
                                            <span class="badge"><a href="#">Financial</a></span>
                                            <span class="badge"><a href="#">Capital Markets</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-0 input-group">
                                        <input type="text" class="form-control" placeholder="Enter Keywords">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-0 input-group align-self-center">
                                        <button class="btn primary-button">SEARCH</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal [sign] -->
        <div id="sign" class="p-0 modal fade" role="dialog" aria-labelledby="sign" aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideout" role="document">
                <div class="modal-content full">
                    <div class="modal-header" data-dismiss="modal">
                        <i class="icon-close fas fa-arrow-right"></i>
                    </div>
                    <div class="modal-body">
                        <form action="/" class="row">
                            <div class="col-12 p-0 align-self-center">
                                <div class="row">
                                    <div class="col-12 p-0 pb-3">
                                        <h2>Sign In</h2>
                                        <p>Don't have an account? <a href="#" class="primary-color" data-toggle="modal" data-target="#register">Register now</a>.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-0 input-group">
                                        <input type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="col-12 p-0 input-group">
                                        <input type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-0 input-group align-self-center">
                                        <button class="btn primary-button">SIGN IN</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal [register] -->
        <div id="register" class="p-0 modal fade" role="dialog" aria-labelledby="register" aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideout" role="document">
                <div class="modal-content full">
                    <div class="modal-header" data-dismiss="modal">
                        <i class="icon-close fas fa-arrow-right"></i>
                    </div>
                    <div class="modal-body">
                        <form action="/" class="row">
                            <div class="col-12 p-0 align-self-center">
                                <div class="row">
                                    <div class="col-12 p-0 pb-3">
                                        <h2>Register</h2>
                                        <p>Have an account? <a href="#" class="primary-color" data-toggle="modal" data-target="#sign">Sign In</a>.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-0 input-group">
                                        <input type="text" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="col-12 p-0 input-group">
                                        <input type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="col-12 p-0 input-group">
                                        <input type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="col-12 p-0 input-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-0 input-group align-self-center">
                                        <button class="btn primary-button">REGISTER</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal [map] -->
        <div id="map" class="p-0 modal fade" role="dialog" aria-labelledby="map" aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideout" role="document">
                <div class="modal-content full">
                    <div class="modal-header absolute" data-dismiss="modal">
                        <i class="icon-close fas fa-arrow-right"></i>
                    </div>
                    <div class="modal-body p-0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.123073808986!2d12.490042215441486!3d41.89021017922119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f61b6532013ad%3A0x28f1c82e908503c4!2sColiseu!5e0!3m2!1spt-BR!2sbr!4v1594148229878!5m2!1spt-BR!2sbr" width="600" height="450" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal [responsive menu] -->
        <div id="menu" class="p-0 modal fade" role="dialog" aria-labelledby="menu" aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideout" role="document">
                <div class="modal-content full">
                    <div class="modal-header" data-dismiss="modal">
                        <i class="icon-close fas fa-arrow-right"></i>
                    </div>
                    <div class="menu modal-body">
                        <div class="row w-100">
                            <div class="items p-0 col-12 text-center">
                                <!-- Append [navbar] -->
                            </div>
                            <div class="contacts p-0 col-12 text-center">
                                <!-- Append [navbar] -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll [to top] -->
        <div id="scroll-to-top" class="scroll-to-top">
            <a href="#header" class="smooth-anchor">
                <i class="fas fa-arrow-up"></i>
            </a>
        </div>        
        
        <!-- ==============================================
        Google reCAPTCHA // Put your site key here
        =============================================== -->
        <script src="https://www.google.com/recaptcha/api.js?render=6Lf-NwEVAAAAAPo_wwOYxFW18D9_EKvwxJxeyUx7"></script>

        <!-- ==============================================
        Vendor Scripts
        =============================================== -->
        <script src="assets/js/vendor/jquery.min.js"></script>
        <script src="assets/js/vendor/jquery.easing.min.js"></script>
        <script src="assets/js/vendor/jquery.inview.min.js"></script>
        <script src="assets/js/vendor/popper.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/vendor/ponyfill.min.js"></script>
        <script src="assets/js/vendor/slider.min.js"></script>
        <script src="assets/js/vendor/animation.min.js"></script>
        <script src="assets/js/vendor/progress-radial.min.js"></script>
        <script src="assets/js/vendor/bricklayer.min.js"></script>
        <script src="assets/js/vendor/gallery.min.js"></script>
        <script src="assets/js/vendor/shuffle.min.js"></script>
        <script src="assets/js/vendor/cookie-notice.min.js"></script>
        <script src="assets/js/vendor/particles.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>