<?php get_header()?>
<main>
			<!---------------------------
                       HEADER
            ------------------------------>
			<header class="header_posts">
				<hgroup>
					<h1>
						<?php the_title()?>
					</h1>
				</hgroup>
				<img data-src="assets/sections/logo-black.png" alt="" />
			</header>

			<section class="opt_post posts">
				<div class="container">
					<article>
						<div class="img_wrapper">
							<?php the_post_thumbnail()?>
						</div>
						<div class="text-content">
							<?php the_content()?>
							<a href="<?php echo site_url("paketi");?>" class="btn btn-red">Rezervisi termin</a>
						</div>
					</article>
				</div>
			</section>
		</main>
        <?php get_footer()?>