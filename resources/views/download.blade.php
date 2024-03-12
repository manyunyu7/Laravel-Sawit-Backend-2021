<!DOCTYPE html>
<!-- saved from url=(0034)http://lapor-satgas.feylabs.my.id/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('dn')}}/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('dn')}}/styles.css">
    <title>Download Aplikasi {{config('app.name')}}</title>
    <script src="{{asset('dn')}}/lottie-player.js.download"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
        @import url('https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap');

        @font-face {
            font-family: gloss;
            src: url({{asset('dn')}}/gloss.ttf);
        }

        @media (max-width: 767.98px) {
            .album-poster {
                margin: 40px;
            }

            h1 {
                font-size: 30px;
            }

            img {
                width: 100%;
                height: 500px;
                border-radius: 20px;
            }

        }

        html {
            scroll-behavior: smooth;
        }

        footer {
            color: white;
            font-family: Quicksand, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        img {
            /* object-fit: cover; */
            /* background-position: center center;
            background-repeat: no-repeat; */
            width: 100%;
            height: 500px;
            border-radius: 20px;
        }

        .main {
            padding: 40px 0;
        }

        footer {
            background-color: #00B0FF;
        }

        footer a {
            color: white;
        }

        .h4 {
            text-transform: uppercase;
        }

        p {
            font-family: Quicksand, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .album-poster {
            padding: 10px;
            box-shadow: 0px 0px 36px #dbdbdb, -13px -13px 36px #ffffff;
            display: block;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            /* box-shadow: 0 0 25px #57b8f8; */
            transition: all ease 1s;
        }

        .album-poster:hover {
            transform: scale(0.95) translateY(10px);
        }

        .col-md-3,
        col-md-2 {
            margin-bottom: 50px;
        }

        h3 {
            font-size: 34px;
            margin-bottom: 34px;
            /* border-bottom: 4px solid #e6e6e6; */
        }

        h4 {
            font-size: 14px;
            text-transform: uppercase;
            margin-top: 15px;
            font-weight: 700;
        }

        .blue-font {
            color: blue;
        }


        .feylabs {
            font-family: Quicksand, 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .content {
            margin-top: 50px;
        }
    </style>
</head>

<body>


<div class="main">
    <div class="container">
        <div class="row header">
            <div class="col-md-12">
                <h1 style="font-family: gloss;">CMC<span class="blue-font"></span></h1>
            </div>
            <div class="col-md-12">
                <h4 class="title">Aplikasi Android CMC</h4>
            </div>
        </div>

        <div class="row" style="margin: 20px;">
            <p></p>
            <h5>Cara Penginstallan</h5>
            <p>1. Buka file .apk yang sudah didownload dengan
                <strong>File Explorer</strong>
                bawaan Android atau dengan aplikasi <strong>APK Installer dari</strong> dari Playstore</p>
            <p>2. Jika perangkat menampilkan peringatan keamanan, klik izinkan penginstallan dari pihak luar/ketiga</p><br>
            <p>3. Install file .apk</p> <br>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="#download"><button class=" btn btn-primary btn-block">Download Sekarang</button></a>
            </div>
        </div>

        <div class="row content">
            <div class="col-md-3">
                <a href="javascript:void();" class="album-poster">
                    <img src="{{asset('dn')}}/s1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void();" class="album-poster">
                    <img src="{{asset('dn')}}/s2.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void();" class="album-poster">
                    <img src="{{asset('dn')}}/s3.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void();" class="album-poster">
                    <img src="{{asset('dn')}}/s4.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void();" class="album-poster">
                    <img src="{{asset('dn')}}/s5.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void();" class="album-poster">
                    <img src="{{asset('dn')}}/s6.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void();" class="album-poster">
                    <img src="{{asset('dn')}}/s7.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void();" class="album-poster">
                    <img src="{{asset('dn')}}/s8.jpg" alt="">
                </a>
            </div>
        </div>


        <section id="download">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{asset('dn')}}/SAWIT_JAYA.apk"><button class=" btn btn-primary btn-block">Download Sekarang</button></a>
                </div>
            </div>
        </section>


        <!-- Footer -->



    </div>
</div>

<footer class="page-footer teal" style="background-color: #22215B !important;">
    <div class="footer-copyright text-center py-3">
        <a href="#"> <br> <br>
            <span class="feylabs ">
                    <h1 style="font-family: gloss;">Sawit    Jaya</h1>
                </span> </a>
    </div>
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('dn')}}/jquery-3.5.1.slim.min.js.download" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="{{asset('dn')}}/popper.min.js.download" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="{{asset('dn')}}/bootstrap.min.js.download" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>








</body><auto-scroll></auto-scroll></html>
