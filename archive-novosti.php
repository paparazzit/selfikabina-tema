<?php get_header(); ?>

<main>

    <header class="header_posts">
        <hgroup>
            <h1>Novosti</h1>
            <h3>Gde smo bili - šta smo radili - sa kim smo se slikali</h3>
        </hgroup>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/sections/logo-black.png" alt="" />
    </header>

    <section class="novosti-archive">
        <div class="container">

            <?php if (have_posts()) : ?>
            <div class="novosti-grid">
                <?php while (have_posts()) : the_post(); ?>
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
                <?php endwhile; ?>
            </div>


            <div class="novosti-pagination">
                <?php the_posts_pagination(array(
                    'prev_text' => '<i class="fa-solid fa-arrow-left"></i> Nazad',
                    'next_text' => 'Dalje <i class="fa-solid fa-arrow-right"></i>',
                )); ?>
            </div>

            <?php else : ?>
            <p class="no-posts">Trenutno nema objavljenih novosti. Uskoro!</p>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>