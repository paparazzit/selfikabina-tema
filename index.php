<?php $cnt = true;?>
<?php get_header();?>


<main>

			<!---------------------------
                       HEADER
            ------------------------------>
			<header class="header_paketi">
				<hgroup>
					<h1><?php  single_post_title();?></h1>
				</hgroup>
				<img data-src="<?php echo esc_url(get_template_directory_uri());?>/assets/sections/logo-black.png" alt="" />
			</header>

			<section class="paketi" id="paketi">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<?php 	$image_id = get_post_thumbnail_id(get_the_ID());
					$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);?>
           <?php $category = get_the_category()?>
				<article class="card">
					<div class="card_inner <?php the_field('class');?> ">
                        
						<img
							data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full')?>"
							alt=""
							class="bg-img"
						/>
						<div class="content">
							<div class="text">
								<h2><?php the_title();?></h2>
                                <?php the_content();?>
								
                              
								<a href="#" class="btn btn-red reserve" data-paket="<?php echo $category[0]->name?>">
									rezervisi
								</a>
							</div>
							<div class="img-wrapper">
								<img data-src="<?php the_field('image')?>" alt="<?php echo $alt_text?>" />
							</div>
						</div>
					</div>
				</article>
				
                <?php endwhile; else : ?>
           			<?php _e('There are no posts yet');?>
     
        		<?php endif?>
				<?php $page = get_id_by_slug('home');?>
				<div class="rodj">
					<div class="rodj_cont">
						<h2><?php the_field('rodjendani_title',$page)?></h2>
						<p>
							<?php the_field('rodjendani_txt',$page)?>
						</p>
						<a href="#" class="btn btn-black reserve" data-paket="rodjendan"
							>Rezervisi</a
						>
					</div>
				</div>
			</section>
			
			<!-- CONTACT -->
			
			<section class="contact contact_paketi" id="contact">
				<div class="container">
					<hgroup>
					
					
						<h2><?php the_field('contact_title', $page)?></h2>
						<p>
						<?php the_field('contact_txt', $page)?>
						</p>
					</hgroup>
					<?php include 'partials/contactForm.php'?>
				</div>
			</section>
		</main>

        <?php include 'partials/reserveForm.php'?>
        <?php get_footer();?>