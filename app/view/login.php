
    <link rel="stylesheet" href="app/view/inc/css/template/matrix-login.css" />

        <div id="loginbox">            
            




            <form id="loginform" class="form-vertical" action="<?php echo LOCALHOST.'verificalogin'; ?>" method="POST">
				<div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                            <input type="text" name="user" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                            <input type="password" name="pass" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left">
                        <a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a>
                    </span>
                    <span class="pull-right">
                        <input type="submit" class="btn btn-success" value="Login" />
                    </span>
                </div>
            </form>




            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>







        <script src="app/view/inc/js/template/matrix.login.js"></script> 