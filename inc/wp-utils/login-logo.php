<?php

/************************************
  Login Logo
*************************************/

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg);
			height:60px;
			width:250px;
			background-size: 250px auto;
			background-repeat: no-repeat;
        	padding-bottom: 30px;
			margin: 0 auto;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
