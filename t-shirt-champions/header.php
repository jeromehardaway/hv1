<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>


        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
        <!--[if IE 6]><link rel="stylesheet" href="css/ie6.css?ct=1426879695" type="text/css" media="screen"><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="css/ie7.css?ct=1426879695" type="text/css" media="screen"><![endif]-->

<![endif]-->
<?php wp_head(); ?>
<body>
<?php
if(is_front_page()){
  echo '<div id="body" class="home">';
}
else{
  echo '<div id="body" >';
}
?>
	<div id="header_wrap">
		<div id="header" class="container">
			<div id="header_content" class="col24 columns">
				<img class="contact responsive-image" src="<?php bloginfo('template_directory'); ?>/images/tchamp_number_tag.png" alt="contact us" />
                <div id="utility" class="opensb">
                    <a href="http://stores.inksoft.com/Tshirt_Champions/Account/Register">Create Account</a><span>&nbsp;|&nbsp;</span> 
                    <a href="http://stores.inksoft.com/Tshirt_Champions/Account/LogOn">Login</a><span>&nbsp;|&nbsp;</span>
                    <a class="cart" href="http://stores.inksoft.com/Tshirt_Champions/Cart">View Cart</a>
                    <div class="clear"></div>
                </div>
				<a id="logo" class="responsive-image" href="/"><img src="<?php bloginfo('template_directory'); ?>/images/logo2.png" alt="Tshirt Champions"></a>
                <div class="title-bar" data-responsive-toggle="nav" data-hide-for="medium">
                <button class="menu-icon" type="button" data-toggle></button>
                    <div class="title-bar-title">Menu</div>
                </div>
                <ul id="nav">
                    <li id="nav_start_designing">
                    <a  href="<?php echo site_url('/start-designing') ?>"><span
                            class="robotb">Start</span><br><span
                            class="bebas">Designing</span></a>
                    </li>
                    <li id="nav_design_library">
                    <a href="<?php echo site_url('/design-library') ?>"><span
                            class="robotb">Design</span><br><span
                            class="bebas">Library</span></a>
                    </li>
                    <li id="nav_faqs">
                    <a  href="<?php echo site_url('/helpful-resources') ?>"><span
                            class="robotb">Help</span><br><span
                            class="bebas">Center</span></a>
                    </li>
                    <li id="nav_t-shirt_shop">
                    <a  href="<?php echo site_url('/t-shirt-shop') ?>"><span
                            class="robotb">T-Shirt</span><br><span
                            class="bebas">Shop</span></a>
                    </li>
                </ul>
			</div>
        </div>
        <div class="tab"></div>
    </div>
