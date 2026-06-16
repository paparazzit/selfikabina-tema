<php die('taxonomy-novosti_lokacija.php se ucitava!'); ?>
<?php get_header(); ?>

<main>

    <header class="header_posts">
        <hgroup>
            <h1><?php single_term_title(); ?></h1>
        </hgroup>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/sections/logo-black.png" alt="" />
    </header>

    <section class="novosti-archive">
        <div class="container">

            <?php
            $term = get_queried_object();
            $args = array(
                'post_type'      => 'novosti',
                'posts_per_page' => 9,
                'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'novosti_lokacija',
                        'field'    => 'term_id',
                        'terms'    => $term->term_id,
                    ),
                ),
            );
            $query = new WP_Query($args);
            ?>

            <?php if ($query->have_posts()) : ?>
            <div class="novosti-grid">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article class="novost-card">
    <?php if (has_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>" class="novost-card-img">
        <?php the_post_thumbnail('medium_large'); ?>
    </a>
    <?php endif; ?>

    <div class="novost-card-overlay"></div>

    <div class="novost-card-body">
        <?php
        $tips = get_the_terms(get_the_ID(), 'novosti_tip');
        if ($tips && !is_wp_error($tips)) :
        ?>
        <a href="<?php echo esc_url(get_term_link($tips[0])); ?>" class="novost-card-badge">
            <?php echo esc_html($tips[0]->name); ?>
        </a>
        <?php endif; ?>

        <div class="novost-card-meta">
            <span>
                <i class="fa-regular fa-calendar"></i>
                <?php echo get_the_date('d.m.Y.'); ?>
            </span>
            <?php
            $loks = get_the_terms(get_the_ID(), 'novosti_lokacija');
            if ($loks && !is_wp_error($loks)) :
            ?>
            <span>
                <i class="fa-solid fa-map-pin"></i>
                <a href="<?php echo esc_url(get_term_link($loks[0])); ?>">
                    <?php echo esc_html($loks[0]->name); ?>
                </a>
            </span>
            <?php endif; ?>
        </div>

        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <a href="<?php the_permalink(); ?>" class="btn-overlay">Čitaj više</a>
    </div>
</article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <div class="novosti-pagination">
                <?php
                echo paginate_links(array(
                    'total'   => $query->max_num_pages,
                    'current' => get_query_var('paged') ? get_query_var('paged') : 1,
                ));
                ?>
            </div>

            <?php else : ?>
            <p class="no-posts">Nema novosti za lokaciju "<?php single_term_title(); ?>".</p>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>