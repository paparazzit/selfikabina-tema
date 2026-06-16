<?php get_header();?>
<main>
			<!---------------------------
                       HEADER
            ------------------------------>
			<header class="header_opt">
				<hgroup>
					<h1><?php the_title()?></h1>
				</hgroup>
				<img data-src="<?php echo esc_url(get_template_directory_uri());?>/assets/sections/logo-black.png" alt="" />
			</header>

			<section class="opt_post">
				<div class="container">
					<article>
						<div class="img_wrapper">
							<?php the_post_thumbnail()?>
						</div>
						<div class="text-content">
							<?php the_content();?>
						</div>
					</article>
				</div>
			</section>
		</main>
        <?php get_footer();?>