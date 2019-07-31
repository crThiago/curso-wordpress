<article>
    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <a href="<?php the_permalink() ?>">
        <?php the_post_thumbnail( array(275, 275) ) ?>
    </a>    
    <p><?php _e( 'Published in', 'wpcurso' ); ?> <?=get_the_date();?> <?php _e( 'by', 'wpcurso' ); ?> <?php the_author_posts_link(); ?></p>
    <p><?php the_tags( __( 'Tags:',  'wpcurso' ), ', ' ); ?></p>
    <?php the_content(); ?>
</article>