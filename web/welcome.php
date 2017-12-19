<!DOCTYPE html>
<html>
    <head>
        <title>Billet simple pour l'Alaska</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="bootstrap/css/custom.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body><div class="homepage-hero-module">
            <div class="video-container">
                <div class="filter"></div>
                <video autoplay loop class="fillWidth">
                    <source src="images/Snow_Wires.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.

                </video>
                <div class="title-container">
                    <div class="headline">
                        <img src="images/logotransparent.png" height="130" alt="Jean Forteroche"><br/>

                        <h1 class="text-white text-thin">Billet simple pour l'Alaska</h1>
                        <h4 class="text-white text-thin">Decouvrez son prochain livre  chapitre par chapitre</h4> <br/>  
                        <a href="../index.php" class="btn btn-warning btn-lg" role="button">LIRE LE BLOG</a>
                    </div>
                </div>
                <div class="text-center" id="loadBannerVideoSpinner" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 4px; display: none; margin-top: 20px;">
                    <h1 class="text-thin text-primary">Loading Coverr... <i class="fa fa-circle-o-notch fa-spin"></i></h1>
                </div>
                <div class="poster hidden">
                    <img src="images/Snow_Wires.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $(this).toggleClass('active');
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {

                scaleVideoContainer();

                initBannerVideoSize('.video-container .poster img');
                initBannerVideoSize('.video-container .filter');
                initBannerVideoSize('.video-container video');

                $(window).on('resize', function () {
                    scaleVideoContainer();
                    scaleBannerVideoSize('.video-container .poster img');
                    scaleBannerVideoSize('.video-container .filter');
                    scaleBannerVideoSize('.video-container video');
                });

            });

            function scaleVideoContainer() {

                var height = $(window).height() + 5;
                var unitHeight = parseInt(height) + 'px';
                $('.homepage-hero-module').css('height', unitHeight);

            }

            function initBannerVideoSize(element) {

                $(element).each(function () {
                    $(this).data('height', $(this).height());
                    $(this).data('width', $(this).width());
                });

                scaleBannerVideoSize(element);

            }

            function scaleBannerVideoSize(element) {

                var windowWidth = $(window).width(),
                        windowHeight = $(window).height() + 5,
                        videoWidth,
                        videoHeight;

                // console.log(windowHeight);

                $(element).each(function () {
                    var videoAspectRatio = $(this).data('height') / $(this).data('width');

                    $(this).width(windowWidth);

                    if (windowWidth < 1000) {
                        videoHeight = windowHeight;
                        videoWidth = videoHeight / videoAspectRatio;
                        $(this).css({'margin-top': 0, 'margin-left': -(videoWidth - windowWidth) / 2 + 'px'});

                        $(this).width(videoWidth).height(videoHeight);
                    }

                    $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

                });
            }
        </script>
    </body>
</html>