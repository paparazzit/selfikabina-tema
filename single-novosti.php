<?php get_header(); ?>

<?php
$novosti_header_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '';
?>

<main>

    <header class="header_posts header_novosti novosti-single-header<?php echo $novosti_header_image ? ' has-featured-bg' : ''; ?>"<?php if ($novosti_header_image) : ?> style="background-image: url('<?php echo esc_url($novosti_header_image); ?>');"<?php endif; ?>>
        <hgroup>
            <h1>
                <?php the_title(); ?>
            </h1>
           <div class="novosti-meta">
    <span class="novosti-date">
        <i class="fa-regular fa-calendar"></i>
        <?php echo get_the_date('d.m.Y.'); ?>
    </span>

    <?php
   $categories = get_the_terms(get_the_ID(), 'novosti_tip');
    if ($categories && !is_wp_error($categories)) :
        $cat = $categories[0];
    ?>
    <span class="novosti-cat">
        <i class="fa-solid fa-tag"></i>
        <a href="<?php echo esc_url(get_term_link($cat)); ?>">
            <?php echo esc_html($cat->name); ?>
        </a>
    </span>
    <?php endif; ?>

    <?php
    $lokacije = get_the_terms(get_the_ID(), 'novosti_lokacija');
    if ($lokacije && !is_wp_error($lokacije)) :
        $lok = $lokacije[0];
    ?>
    <span class="novosti-lokacija">
        <i class="fa-solid fa-map-pin"></i>
        <a href="<?php echo esc_url(get_term_link($lok)); ?>">
            <?php echo esc_html($lok->name); ?>
        </a>
    </span>
    <?php endif; ?>
</div>
        </hgroup>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/sections/logo-black.png" alt="" />
    </header>

    <section class="breadcrumbs-section">
        <div class="container">
            <div class="breadcrumbs">
                <a href="<?php echo esc_url(home_url()); ?>">Početna</a>
                <span class="sep">/</span>
                <a href="<?php echo esc_url(home_url('/novosti')); ?>">Novosti</a>
                <span class="sep">/</span>
                <span><?php the_title(); ?></span>
            </div>
        </div>
    </section>

    <section class="opt_post posts novosti-single">
        <div class="container">
            <article>
                <div class="text-content">
                    <?php the_content(); ?>

                    <?php
                    $gallery = get_field('novosti_galerija');
                    if ($gallery && is_array($gallery)) :
                    ?>
                    <div class="novosti-galerija">
                        <h3 class="galerija-title">Galerija</h3>
                        <div class="galerija-grid">
                            <?php foreach ($gallery as $img_id) : ?>
                            <div class="galerija-item img-wrapper">
                                <?php echo wp_get_attachment_image($img_id, 'medium'); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="novosti-share">
                        <span class="share-label">Podeli:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-blue share-btn">
                            <i class="fa-brands fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://www.instagram.com/selfi_kabina/"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-pink share-btn">
                            <i class="fa-brands fa-instagram"></i> Instagram
                        </a>
                    </div>

                    <a href="<?php echo esc_url(home_url('paketi')); ?>" class="btn btn-red">
                        Rezerviši termin
                    </a>

                </div>
            </article>
        </div>
    </section>

    <?php
    $related = new WP_Query(array(
        'post_type'      => 'novosti',
        'posts_per_page' => 3,
        'post__not_in'   => array(get_the_ID()),
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));
    if ($related->have_posts()) :
    ?>
    <section class="novosti-related">
        <div class="container">
            <h2 class="related-title underline">Pročitaj još</h2>
            <div class="related-grid">
                <?php while ($related->have_posts()) : $related->the_post(); ?>
                <article class="related-card">
                    <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="related-card-img img-wrapper">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                    <?php endif; ?>
                    <div class="related-card-body">
                        <span class="related-date"><?php echo get_the_date('d.m.Y.'); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-black">Čitaj više</a>
                    </div>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php get_footer(); ?>