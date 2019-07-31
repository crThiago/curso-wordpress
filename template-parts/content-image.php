<article <?php post_class() ?>>
    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <a href="<?php the_permalink() ?>">
        <?php the_post_thumbnail( array(275, 275) ) ?>
    </a>  
    <?php the_post_thumbnail( array(275, 275) ) ?>
    <p><?php _e( 'Published', 'wpcurso' ); ?> in <?=get_the_date();?></p>
    <p><?php _e( 'Categories:', 'wpcurso' ); ?> <?php the_category(' '); ?></p>
    <p><?php the_tags( __( 'Tags:',  'wpcurso' ), ', ' ); ?></p>
    <?php the_content(); ?>
</article>