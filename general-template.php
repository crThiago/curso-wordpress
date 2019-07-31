<?php
/*

Template Name: General Template

*/
?>

<?php get_header(); ?>
    <img 
        class="img-fluid" 
        src="<?php header_image(); ?>" 
        height="<?=get_custom_header()->height;?>"
        width="<?=get_custom_header()->width;?>" 
        alt="">
    <div class="content-area">
        <main>
            <section class="middle-area">
                <div class="news">
                    <?php
                    if ( have_posts() ):
                        while( have_posts() ):
                            the_post();
                    ?>
                    
                    <article>
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </article>
                    
                    <?php
                        endwhile;
                    else:
                    ?>

                    <p><?php _e( "There's nothing yet to be displayed...", 'wpcurso'); ?></p>
                    
                    <?php
                    endif;
                    ?>
                </div>
            </section>
        </main>
    </div>
<?php get_footer(); ?>