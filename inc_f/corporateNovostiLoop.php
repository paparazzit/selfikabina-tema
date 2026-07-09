<?php
/**
 * Corporate Novosti loop shortcode.
 *
 * Usage in Gutenberg Shortcode block:
 * [sk_corporate_novosti]
 *
 * Optional:
 * [sk_corporate_novosti posts_per_page="3" terms="poslovni-dogadjaji,corporate-event,promocije"]
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sk_corporate_novosti_normalize_term( $value ) {
    $value = wp_strip_all_tags( (string) $value );
    $value = remove_accents( $value );
    $value = strtolower( $value );
    $value = preg_replace( '/[^a-z0-9]+/', '-', $value );

    return trim( $value, '-' );
}

function sk_corporate_novosti_default_term_aliases() {
    return array(
        'poslovni-dogadjaji',
        'poslovni-dogadaji',
        'poslovni-dogaji',
        'poslovni-dogadjaj',
        'poslovni-dogadaj',
        'poslovni-event',
        'korporativni-dogadjaji',
        'korporativni-dogadaji',
        'korporativni-dogadjaj',
        'korporativni-dogadaj',
        'korporativni-event',
        'corporate-event',
        'corporate-events',
        'corporate',
        'promocije',
        'promocija',
        'promo',
    );
}

function sk_corporate_novosti_get_term_ids( $terms_csv = '' ) {
    $candidate_terms = sk_corporate_novosti_default_term_aliases();

    if ( ! empty( $terms_csv ) ) {
        $custom_terms = array_filter( array_map( 'trim', explode( ',', $terms_csv ) ) );
        $candidate_terms = array_merge( $candidate_terms, $custom_terms );
    }

    $candidate_terms = array_unique( array_map( 'sk_corporate_novosti_normalize_term', $candidate_terms ) );

    $terms = get_terms( array(
        'taxonomy'   => 'novosti_tip',
        'hide_empty' => false,
    ) );

    if ( is_wp_error( $terms ) || empty( $terms ) ) {
        return array();
    }

    $term_ids = array();

    foreach ( $terms as $term ) {
        $term_name = sk_corporate_novosti_normalize_term( $term->name );
        $term_slug = sk_corporate_novosti_normalize_term( $term->slug );

        if ( in_array( $term_name, $candidate_terms, true ) || in_array( $term_slug, $candidate_terms, true ) ) {
            $term_ids[] = (int) $term->term_id;
        }
    }

    return array_unique( $term_ids );
}

function sk_corporate_novosti_get_badge_term( $post_id, $preferred_term_ids = array() ) {
    $terms = get_the_terms( $post_id, 'novosti_tip' );

    if ( is_wp_error( $terms ) || empty( $terms ) ) {
        return 'Novosti';
    }

    foreach ( $terms as $term ) {
        if ( in_array( (int) $term->term_id, $preferred_term_ids, true ) ) {
            return $term->name;
        }
    }

    return $terms[0]->name;
}

function sk_corporate_novosti_shortcode( $atts ) {
    $atts = shortcode_atts(
        array(
            'posts_per_page' => 3,
            'terms'          => '',
            'excerpt_words'  => 18,
        ),
        $atts,
        'sk_corporate_novosti'
    );

    $term_ids       = sk_corporate_novosti_get_term_ids( $atts['terms'] );
    $posts_per_page = max( 1, (int) $atts['posts_per_page'] );
    $excerpt_words  = max( 8, (int) $atts['excerpt_words'] );

    if ( empty( $term_ids ) ) {
        return '<p class="sk-section-sub">Još nije pronađen odgovarajući tip događaja za korporativne novosti.</p>';
    }

    $corporate_novosti = new WP_Query( array(
        'post_type'           => 'novosti',
        'post_status'         => 'publish',
        'posts_per_page'      => $posts_per_page,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
        'tax_query'           => array(
            array(
                'taxonomy' => 'novosti_tip',
                'field'    => 'term_id',
                'terms'    => $term_ids,
            ),
        ),
    ) );

    if ( ! $corporate_novosti->have_posts() ) {
        return '<p class="sk-section-sub">Trenutno pripremamo nove priče sa korporativnih događaja.</p>';
    }

    ob_start();
    ?>
    <div class="wp-block-columns sk-corporate-novosti-loop">
        <?php while ( $corporate_novosti->have_posts() ) : $corporate_novosti->the_post(); ?>
            <article class="wp-block-column sk-blog-card">
                <a href="<?php the_permalink(); ?>" class="sk-blog-image-link" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
                    <figure class="wp-block-image size-large">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large' ); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2025/02/events.jpg' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
                        <?php endif; ?>
                    </figure>
                </a>

                <div class="wp-block-group sk-blog-body">
                    <span class="sk-blog-cat"><?php echo esc_html( sk_corporate_novosti_get_badge_term( get_the_ID(), $term_ids ) ); ?></span>

                    <h3 class="wp-block-heading">
                        <a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none">
                            <?php the_title(); ?>
                        </a>
                    </h3>

                    <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), $excerpt_words, '...' ) ); ?></p>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode( 'sk_corporate_novosti', 'sk_corporate_novosti_shortcode' );
