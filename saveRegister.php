<?php
include("sources/funciones.php");
if ($_POST) {
    ?>
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
                    <div class="head-bg-img2"></div>
                    <div class="head-bg-content">
                        <h1>CHAMBING.MX</h1>
                        <p>TRUEQUE ART&Iacute;STICO</p>
                        <p>&iexcl;GRACIAS POR TU REGISTRO <?php echo $_POST["nombre_artistico"] ?>!</p>
                    </div>	
                </div>
                <div class="container">             

                    <div class="row">
                        <!--                    <div class="col-md-9">-->
                        <div class="be-large-post">
                            <div class="info-block">
                            </div>
                            <div class="blog-content popup-gallery be-large-post-align">
                                <div class="blog-content popup-gallery be-large-post-align">
                                    <h5 class="be-post-title to">
                                        Gracias por tu registro en Chambing.mx
                                    </h5>

                                    <h6 class="be-post-title to">
                                        &iquest;Y ahora qu&eacute; sigue?
                                    </h6>
                                    <p>El equipo de Chambing revisar&aacute; cuidadosamente tu curr&iacute;culum para saber si tu perfil coincide con el de la comunidad. Posteriormente recibir&aacute;s un correo de confirmaci&oacute;n para configurar tu contrase&ntilde;a y poder comenzar a echar el Chambing!</p>
                                    <p>&iexcl;Nos leemos pronto! :)</p>
                                    <!--                                <div class="post-text">
                                                                        <p>EL CHAMBING TRUEQUE ARTISTICO es una plataforma interactiva que busca crear un circuito de conexiones laborales y profesionales a través de una comunidad virtual en donde se publiquen mensualmente trabajos artísticos remunerados. Porque queremos unirnos como comunidad actoral para ampliar e impulsar la bolsa de trabajo, expandir y diversificar las oportunidades laborales.</p>
                                                                    </div>-->
                                </div>	

                                <!--</div>-->
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
<?php
} else
    header("Location:index.php");
?>