<!DOCTYPE html>

<html <?php language_attributes();?>>

	<head>

    <meta charset="<?php bloginfo('charset')?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="keywords" content="fotokabina, selfikabina, photobooth, selfi kabina, foto kabina, foto rekviziti, vencanje, korporativni dogadjaji, photo wall" />
		<meta name="description" content="Rentiranje Foto Kabine za venčanja, proslave i korporativne događaje. Instant foto print." />
		<link rel="alternate" type="text/markdown" title="LLM-friendly version" href="https://www.selfikabina.com/llms.txt" />
		<link

			rel="stylesheet"

			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"

			integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="

			crossorigin="anonymous"

			referrerpolicy="no-referrer"

		/>
		<link rel="icon" href="https://www.selfikabina.com/wp-content/uploads/2023/07/favicon.png" type="image/gif" sizes="16x16">

		<!-- <link rel="stylesheet" href="css/style.css" /> -->



		<!-- <title>Selfi Kabina</title> -->

        <?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KWRVDX5');</script>
<!-- End Google Tag Manager -->
	</head>

	<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KWRVDX5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<nav>

			<div class="nav-container">

				<a href="<?php echo esc_url(home_url()); ?>" class="nav-brand">

					<img

						src="<?php echo esc_url(get_template_directory_uri());?>/assets/header/selfikabina-logo-header.png"

					

						alt="Foto kabina, photo booth, rentiranje foto kabine"

					/>

				</a>

				<div class="drop">

				<?php 

         $home = esc_url(home_url());



		  $items_wrap = '<ul id="%1$s" class="%2$s">%3$s';

		  if(isset($GLOBALS['cnt'] )){

			$items_wrap .= sprintf( '<li class="delay"><a href="#contact">Kontakt</a></li></ul>' );

		  }else{

			$items_wrap .= sprintf( '<li class="delay"><a href="'.  $home .'#contact">Kontakt</a></li></ul>' );

		  }

		  

		  

		

		  wp_nav_menu(array(

			  'theme_location' => 'primary',

			  'depth' =>'2',

			  'container' => "ul",

			  'container_class' => 'drop',

			  'items_wrap' => $items_wrap,

			  'menu_class'=> "links",

			  "add_li_class" => "delay",

			

		  ))

		



	   ?>



				<!-- <ul class="links">

					<li class='delay' style="--i: 0"><a href="index.php">Selfi Kabina</a></li>

					<li class='delay'><a href="paketi.php">Paketi</a></li>

					<li class='delay'><a href="#contact">Rezervacija</a></li>

				</ul>					 -->

				<div  class="socials_mob delay">

						<div class="icon">

							<a href="https://www.facebook.com/fotokabinans" target="blank"><i class="fa-brands fa-facebook-f"></i></a>

						</div>

						<div class="icon">

							<a href="https://www.instagram.com/selfi_kabina/" target="blank"><i class="fa-brands fa-instagram"></i></a>

						</div>

						<div class="icon">

							<a href="mailto:rezervacije@selfikabina.com" target="blank"><i class="fa-regular fa-envelope"></i></a>

						</div>

				</div>

					<div class="close " style="--i: 5">

						<span></span>

						<span></span>

					</div>

				</div>

				<div class="socials">

					<div class="icon">

						<a href="https://www.facebook.com/fotokabinans" target="blank"><i class="fa-brands fa-facebook-f"></i></a>

					</div>

					<div class="icon">

						<a href="https://www.instagram.com/selfi_kabina/" target="blank"><i class="fa-brands fa-instagram"></i></a>

					</div>

					<div class="icon">

						<a href="mailto:rezervacije@selfikabina.com" target="blank"><i class="fa-regular fa-envelope"></i></a>

					</div>

				</div>

				<div class="burger">

					<span></span>

					<span></span>

					<span></span>

				</div>

			</div>

		</nav>





	

		  

	

	