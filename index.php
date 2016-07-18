<!DOCTYPE html>
<html>
    <?php include("template/headers.php"); ?>
    <body>
        <!-- THE LOADER -->
        <?php include("template/loader.php"); ?>
        <!-- THE HEADER -->
        <?php include("template/header-menu.php"); ?>
        <!-- MAIN CONTENT -->
        <div id="content-block">
            <div class="head-bg">
                <div class="head-bg-img"></div>
                <div class="head-bg-content">
                    <h1>CHAMBING.MX</h1>
                    <p>TRUEQUE ART&Iacute;STICO</p>
                    <!--<a class="btn color-1 size-1 hover-1" ><i class="fa fa-facebook"></i>sign up via facebook</a>-->
                    <a class="be-register btn color-3 size-1 hover-6"><i class="fa fa-lock"></i>Registrarse</a>
                </div>	
            </div>
            <div class="container">
                <div class="about-description">
                    <div class="videoWrapper">
                        <!-- Copy & Pasted from YouTube -->
                        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/IwqNx-GkmmA" frameborder="0" allowfullscreen></iframe>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                            <div class="about-text">EL CHAMBING TRUEQUE ARTISTICO es una plataforma interactiva que busca crear un circuito de conexiones laborales y profesionales a través de una comunidad virtual en donde se publiquen mensualmente trabajos artísticos remunerados. Porque queremos unirnos como comunidad actoral para ampliar e impulsar la bolsa de trabajo, expandir y diversificar las oportunidades laborales.</div>
                        </div>
                    </div>
                </div>
            </div>	

        </div>

        <!-- THE FOOTER -->
        <?php include("template/footer.php"); ?>

        <div class="be-fixed-filter"></div>

        <?php include("template/login.php"); ?>

        <?php include("template/register.php"); ?>

        <!--        <div class="theme-config">
                    <div class="main-color">
                        <div class="title">Main Color:</div>
                        <div class="colours-wrapper">
                            <div class="entry color1 m-color active" data-colour="style/stylesheet.css"></div>   
                            <div class="entry color3 m-color"  data-colour="style/style-green.css"></div>
                            <div class="entry color6 m-color"  data-colour="style/style-orange.css"></div>
                            <div class="entry color8 m-color"  data-colour="style/style-red.css"></div>  
                            <div class="title">Second Color:</div>  
                            <div class="entry s-color  active color10"  data-colour="style/stylesheet.css"></div>
                            <div class="entry s-color color11"  data-colour="style/style-oranges.css"></div> 
                            <div class="entry s-color color12"  data-colour="style/style-greens.css"></div>
                            <div class="entry s-color color13"  data-colour="style/style-reds.css"></div>
                        </div>
                    </div>
                    <div class="open"><img src="img/icon-134.png" alt=""></div>
                </div>-->

        <!-- SCRIPTS	 -->
        <?php include("template/scripts.php"); ?>
    </body>
</html>