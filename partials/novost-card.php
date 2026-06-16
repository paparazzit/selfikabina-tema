<?php
$pinovan = $args['pinovan'] ?? false;
$tips = get_the_terms(get_the_ID(), 'novosti_tip');
$loks = get_the_terms(get_the_ID(), 'novosti_lokacija');
?>
<article class="ncard">
    <?php if (has_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>" class="ncard-bg">
        <?php the_post_thumbnail('medium_large'); ?>
    </a>
    <?php else : ?>
    <div class="ncard-bg ncard-bg-placeholder"></div>
    <?php endif; ?>

    <div class="ncard-grad"></div>

    <div class="ncard-body">
        <?php if ($pinovan) : ?>
        <span class="ncard-pin-badge">
            <i class="fa-solid fa-thumbtack"></i> Istaknuto
        </span>
        <?php endif; ?>

        <?php if ($tips && !is_wp_error($tips)) : ?>
        <a href="<?php echo esc_url(get_term_link($tips[0])); ?>" class="ncard-ev-badge">
            <?php echo esc_html($tips[0]->name); ?>
        </a>
        <?php endif; ?>

        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

        <div class="ncard-meta">
            <span>
                <i class="fa-regular fa-calendar"></i>
                <?php echo get_the_date('d.m.Y.'); ?>
            </span>
            <?php if ($loks && !is_wp_error($loks)) : ?>
            <span>
                <i class="fa-solid fa-map-pin"></i>
                <a href="<?php echo esc_url(get_term_link($loks[0])); ?>">
                    <?php echo esc_html($loks[0]->name); ?>
                </a>
            </span>
            <?php endif; ?>
        </div>
    </div>
</article>