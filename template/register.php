<div class="large-popup register">
    <div class="large-popup-fixed"></div>
    <div class="container large-popup-container">
        <div class="row">
            <div class="col-md-10 col-md-push-1 col-lg-8 col-lg-push-2 large-popup-content">
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-times close-button"></i>
                        <h5 class="large-popup-title">Registrarse</h5>
                    </div>
                    <form method="POST" action="saveRegister.php" class="popup-input-search">
                        <div class="col-md-6">
                            <input class="input-signtype" type="text" required="true" placeholder="Nombre Art&iacute;stico" name="nombre_artistico">
                        </div>
                        <div class="col-md-6">
                            <input class="input-signtype" type="text" required="true" placeholder="Nombre de Pila">
                        </div>
                        <div class="col-md-6">
                            <input class="input-signtype" type="text" required="true" placeholder="Apellidos">
                        </div>
                        <div class="col-md-6">
                            <input class="input-signtype" type="email" required="true" placeholder="Email">
                        </div>                            
                        <div class="col-md-6">
                            <div class="be-custom-select-block">
                                <?php nationalitiesComboBox(); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="be-custom-select-block">
                                <?php residenceComboBox(); ?>
                            </div>                           
                        </div>
                        
                        <div class="col-md-6">
                            <div class="be-custom-select-block">
                                <?php professionComboBox(); ?>
                            </div>                           
                        </div>
                        <div class="col-md-6">
                            <span class="large-popup-text">
                                Curr&iacute;culum
                                <input class="input-signtype" type="file" required="" placeholder="Curr&iacute;culum">
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="large-popup-text">
                                Fecha de Nacimiento
                                <input id="reg_birthday" class="input-signtype" type="date" required="" placeholder="Fecha de Nacimiento">
                            </span>                            
                        </div>
                       
                        <div class="col-md-6">
                            <div class="be-checkbox">
                                <label class="check-box">
                                    <input class="checkbox-input" type="checkbox" required="" value="" > <span class="check-box-sign"></span>
                                </label>
                                <span class="large-popup-text">
                                    He le&iacute;do los <a class="be-popup-terms" href="blog-detail-2.html">Terminos de Uso</a> y <a class="be-popup-terms" href="blog-detail-2.html">Pol&iacute;ticas de Privacidad</a>.
                                </span>
                            </div>                           
                        </div>
                        <div class="col-md-6 for-signin">
                            <input type="submit" class="be-popup-sign-button" value="REGISTRARSE">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>