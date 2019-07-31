<article <?php post_class() ?>>
    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <?php the_post_thumbnail( array(275, 275) ) ?>
    <p><?php _e( 'Published', 'wpcurso' ); ?> in <?=get_the_date();?></p>
    <?php if (has_category()): ?>
    <p><?php _e( 'Categories:', 'wpcurso' ); ?> <?php the_category(' '); ?></p>
    <?php endif;?>
    <p><?php the_tags( __( 'Tags:',  'wpcurso' ), ', ' ); ?></p>
    <?php the_excerpt(); ?>
</article>