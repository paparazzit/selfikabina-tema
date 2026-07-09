<?php  $cnt = true;?>
<?php get_header();?>

<?php $optionsTitle= array();?>
<?php $optionsImgs= array();?>
<?php $optionsAlts = array();?>
		<main>
			<!---------------------------
                       HEADER
            ------------------------------>
			<header class="home_header">
				
				<?php $kabina = new WP_Query(array(
					'post_type' =>'kabina',
					'category_name' =>'hero'
				))?>
				<?php if($kabina->have_posts()):?>
				<?php while($kabina->have_posts()): $kabina->the_post();?>
				<?php 
					$image_id = get_post_thumbnail_id(get_the_ID());
					$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);?>
			
				<div class="box">
					<?php the_post_thumbnail(); ?>
					

				</div>
				<div class="box">
					
					<div class="content">
						<h2>
							<?php echo get_the_excerpt();?>
						</h2>
						<h1>
							<?php the_title();?>
						</h1>
						<a href="<?php the_permalink();?>" class="btn btn-blue">Šta je selfi Kabina? </a>
					</div>

					<img
					src="<?php echo esc_url(get_template_directory_uri());?>/assets/header/patterntPlus.png"
						alt=""
						class="op"
						data-op="0.3"

					/>
				</div>
				<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<?php else:_e('NEMA OPCIJA'); ?>
						<?php endif;?>
			</header>

			<!---------------------------
                       SPACER
            ------------------------------>
			<section class="spacer">
				<div class="container">
					<div class="headline">
						<h2 class="underline">
							<?php the_field('stasvemoze')?>
						</h2>
					</div>
					<div class="img-wrapper">
						<img
							data-src="<?php the_field('stasvemoze_img')?>"

							alt=""
						/>
					</div>
				</div>
			</section>

			<!---------------------
			-------THIRDS---------- 
			------------------------>
			<section class="thirds" id="options">
				<div class="inner">
					<div class="left">
						<div class="top">
						<?php $optionsPosts = new WP_Query(array(
						'post_type' =>'options',
						'orderby'=>'date',
						'order'=>'ASC',
						));?>
					<?php if($optionsPosts ->have_posts()):?>
					<?php while($optionsPosts ->have_posts()):?>
						<?php $image_id = get_post_thumbnail_id(get_the_ID());
					$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);?>
						<?php  $optionsPosts->the_post();?>
						<?php $opt = get_field('opcija')?>
						<?php $optionsTitle[$opt]= get_the_title();?>
						<?php $optionsAlts [$opt] = $alt_text?>
					
					<?php $optionsImgs[$opt]= get_the_post_thumbnail_url(get_the_ID(),'full')?>
							<article class=" opt" data-link="<?php the_field('opcija')?>">
								<div class="content">
									<h3 id="hdl"><?php the_title();?></h3>
									
										<?php the_excerpt()?>
									
									<a href="<?php the_permalink();?>" class="btn btn-blue shadow"
										>Saznaj Vise</a
									>
								</div>
							</article>

					
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<?php else:_e('NEMA OPCIJA'); ?>
						<?php endif;?>
						</div>
						

						<div class="bottom">
							<div class="opts">
								
						<?php foreach($optionsTitle as $opt=>$title):?>
								<a href="#" class="opt-link" data-link="<?php echo $opt?>"><?php echo $title;?></a>
							
						<?php endforeach;?>
							</div>
						</div>
					</div>
					<div class="right">
						<div class="top" id="emp_box"></div>
						<div class="bottom">
							<div class="img-wrapper" id="optImg">
								<?php foreach($optionsImgs as $opt=>$img):?>
									
								<img
									data-src="<?php echo $img?>"
									alt="<?php echo $optionsAlts[$opt]?>"
									class="opt"
									data-link="<?php echo $opt?>"
									loading="lazy"
								/>
								<?php endforeach;?>
								
							</div>
						</div>
					</div>
				</div>
			</section>
			

			<section class="spacer">
				<div class="container">
					<div class="headline">
						<h2 class="underline">
							<?php the_field('detalj')?>
						</h2>
					</div>
					<p>
					<?php the_field('detalj_txt')?>
					</p>
				</div>
			</section>
			<!---------------------
			------- SLIDER -------->

				<section class="slider" id="slider">
				<div class="slider_inner">
					<?php 
					$eventsPosts = new WP_Query(array(
						'post_type' =>'eventsType',
						'orderby'=>'date',
						'order'=>'ASC',
					));?>
					<?php if($eventsPosts ->have_posts()):?>
					<?php while($eventsPosts ->have_posts()):?>
					<?php  $eventsPosts->the_post();?>
					<?php
					$image_id = get_post_thumbnail_id(get_the_ID());
					$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);?>
					<div class="item">
						<div class="bg-img">
							<img
								data-src="<?php the_field('bg-image')?>"
								alt="<?php echo $alt_text?>"
								loading="lazy"
							/>
						</div>
						<div class="item-inner">
							<div class="img-wrapper">
								<img
									data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full')?>"
									alt="<?php echo $alt_text?>"
									loading="lazy"
								/>
							</div>
							<div class="content">
								<h3>
									<?php the_title()?>
								</h3>
								<?php the_excerpt()?>
								<a href="<?php the_permalink()?>" class="btn btn-white shadow">Pročitaj</a>
							</div>
						</div>
					</div>
					<?php endwhile;?>
					<?php wp_reset_postdata(); ?>
						<?php else: _e('NEMATE POSTOVA'); ?>
					<?php endif;?>

					
				</div>

				<div class="sliderNav">
					<div class="slider-control">
						<div class="prev">
							<img data-src="<?php echo esc_url(get_template_directory_uri());?>/assets/slider/arrow.png" loading="lazy" alt="" />
						</div>
						<div class="indicators"></div>
						<div class="next">
							<img data-src="<?php echo esc_url(get_template_directory_uri());?>/assets/slider/arrow.png" loading="lazy" alt="" />
						</div>
					</div>
				</div>
			</section>
			<!-- CLIENTS CTA SECTION -->
			<section class="spacer cta">
				<div class="container">
					<div class="headline cta">
						<h2 class="underline">
							<?php the_field('clients_cta')?>
						</h2>
					</div>
					<!-- <a href="<?php the_field('btn_url')?>" class="btn btn-blue"><?php the_field('na_dogadjaju_btn')?></a> -->
					 <p><?php the_field('clients_txt')?></p>
				</div>
			</section>
			<!-- CLIENTS CTA SECTION -->
			<!-- SECTION CLIENTS -->

			<section class='clients' id='clients'>
			<div class="container">
			  <article class='on_over'>
					
					<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
				    endif;?>
			  </article>
			  <a href="<?php the_field('btn_url')?>" class="btn btn-blue"><?php the_field('na_dogadjaju_btn')?></a> 
			</div>
			
			</section>
			<!-- SECTION CLIENTS -->

	


			<section id="rekviziti">
				<?php $rekviziti = new WP_query(array(
					'post_type'=>'kabina',
					'category_name'=>'rekviziti',
				));
				?>
				<?php if($rekviziti->have_posts()):?>
				<?php while($rekviziti->have_posts()):?>
				<?php $rekviziti->the_post();?>
				<?php
					$image_id = get_post_thumbnail_id(get_the_ID());
					$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);?>
				<div class="box">
					<img
						data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full')?>"
						loading="lazy"
						alt="<?php echo $alt_text?>"
					/>
				</div>
				<div class="box">
					<div class="content">
						<div class="inner">
							<h3><?php the_title()?></h3>
							<?php the_content()?>
						</div>
					</div>

					<div class="btm"></div>
					<div class="btm">
						<img
							data-src="<?php the_field('add_img') ?>"
							loading="lazy"
							alt="foto kabina, večanje, selfi kabina, rentiranje foto kabine"
							/>
						
					</div>
					<div class="btm"></div>
					<?php endwhile; ?>
					<?php wp_reset_postdata();?>
					<?php else: _e('Nema postova');?>
					<?php endif;?>
				</div>
			</section>

		

			<section id="faq" class="faq in_view">
				<div class="container">
					<hgroup>
					<h2><?php the_field('cpp_title')?></h2>
					<h4><?php the_field('cpp_sub')?></h4>
					</hgroup>
					<div class="faqs">
						<div class="col">
							<?php $faqPosts  = new WP_Query(array(
								'post_type'=> 'faq',
								'orderby' => 'date',
								'order'=>'DESC',
								'category_name' => 'left'
							));?>
							<?php if($faqPosts->have_posts()): while($faqPosts->have_posts()): $faqPosts->the_post();?>
							<article class="acc_article ">
								<h3><span class="acc_btn">+</span><?php the_title()?></h3>
								<div class="content">
									<?php the_content()?>
								</div>
							</article>
							<?php endwhile; wp_reset_postdata();?>
							<?php else: _e("Nema Faq-ova");?>
							<?php endif;?>
						</div>
						<div class="col">
							<?php $faqPosts  = new WP_Query(array(
								'post_type'=> 'faq',
								'orderby' => 'date',
								'order'=>'DESC',
								'category_name' => 'right'
							));?>
							<?php if($faqPosts->have_posts()): while($faqPosts->have_posts()): $faqPosts->the_post();?>
							<article class="acc_article ">
								<h3><span class="acc_btn">+</span><?php the_title()?></h3>
								<div class="content">
									<?php the_content()?>
								</div>
							</article>
							<?php endwhile; ?>
							<?php wp_reset_postdata();?>
							<?php else: _e("Nema Faq-ova");?>
							<?php endif;?>
						</div>
					</div>
				</div>
			</section>
			 <!-- NOVOSTI -->

			 
<section class="hp-novosti">
    <div class="container">

        <div class="hp-novosti-head">
            <h2 class="underline">Novosti</h2>
            <a href="<?php echo esc_url(home_url('/novosti')); ?>" class="btn btn-red">
                Sve novosti
            </a>
        </div>
		 

        <div class="hp-novosti-grid">
            <?php
            // 1. Pinovan post
            $pinovan = new WP_Query(array(
                'post_type'      => 'novosti',
                'posts_per_page' => 1,
                'meta_query'     => array(
                    array(
                        'key'   => 'novosti_pinovan',
                        'value' => '1',
                    ),
                ),
            ));

            // 2. Najnoviji postovi (bez pinovanog)
            $pinovan_id = 0;
            if ($pinovan->have_posts()) {
                $pinovan->the_post();
                $pinovan_id = get_the_ID();
                get_template_part('partials/novost-card', null, array('pinovan' => true));
                wp_reset_postdata();
            }

            // Ostala 2 (ili 3 ako nema pinovanog)
            $broj = $pinovan_id ? 2 : 3;
            $novosti = new WP_Query(array(
                'post_type'      => 'novosti',
                'posts_per_page' => $broj,
                'post__not_in'   => $pinovan_id ? array($pinovan_id) : array(),
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            if ($novosti->have_posts()) :
                while ($novosti->have_posts()) : $novosti->the_post();
                    get_template_part('partials/novost-card', null, array('pinovan' => false));
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

    </div>
</section>
			

			<!-- CONTACT -->
			<section class="contact" id="contact">
				<div class="container">
					<hgroup>
						<h2><?php the_field('contact_title')?></h2>
						<p>
							<?php the_field('contact_txt')?>
						</p>
					</hgroup>
					<?php include 'partials/contactForm.php'?>
				</div>
			</section>
		</main>
    <?php get_footer();?>