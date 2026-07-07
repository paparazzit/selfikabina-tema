<?php


get_header(); ?>

<main id="page-content" class="page-content-wrapper">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>

            <!-- <?php if ( get_the_title() ) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </header>
            <?php endif; ?> -->

            <div class="page-body entry-content">
                <?php
                the_content();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'foto-kabina' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>

        </article>

    <?php endwhile; ?>

      <?php
if ( is_page( array( 'korporativni-dogadjaji', 'corporate-events', 'corporate events' ) ) ) {
    get_template_part( 'partials/corpo-contact' );
}
?>

</main>

<?php get_footer(); ?>
