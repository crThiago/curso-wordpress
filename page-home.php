<?php get_header(); ?>
    <div class="content-area">
		<main>
			<section class="slide">
                <?php 
                $design = get_theme_mod( 'set_slider_design' );
                $limit = get_theme_mod( 'set_slider_limit' );
                echo do_shortcode( '[recent_post_slider design="design-' . $design . '" limit="' . $limit . '"]' );
                ?>
			</section>
			<section class="services">
				<div class="container">
					<h1><?php _e( 'Our Serives', 'wpcurso' ); ?></h1>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="services-item">
                                <?php if (is_active_sidebar('service-1') ) {
                                     dynamic_sidebar('service-1');
                                }  ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services-item">
                                <?php if (is_active_sidebar('service-2') ) {
                                     dynamic_sidebar('service-2'); 
                                } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services-item">
                                <?php if (is_active_sidebar('service-3') ) {
                                     dynamic_sidebar('service-3'); 
                                } ?>
                            </div>
                        </div>
                    </div>
				</div>				
			</section>
			<section class="middle-area">
				<div class="container">
					<div class="row">
                        <?php get_sidebar( 'home' )?>
						<div class="news col-md-8">
                            <div class="container">
                                <div class="row">
                                <?php 
                                $featured = new WP_Query( 'post_type=post&posts_per_page=1&cat=3,6' );

                                // Se houver algum post
                                if( $featured->have_posts() ):
                                    // Enquanto houver posts, mostre-os pra gente
                                    while( $featured->have_posts() ): $featured->the_post();
                                    ?>
                                    <div class="col-12"><?php get_template_part( 'template-parts/content', 'featured'); ?></div>
                                    <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;

                                // Segundo loop
                                $args = array(
                                    'post_type' => 'post', //(opcional)
                                    'posts_per_page' => '2',
                                    'category__not_in' => array(11),
                                    'category__in' => array( 4, 6 ),
                                    // 'offset' => 1
                                );
                                $secondary = new WP_Query( $args );

                                // Se houver algum post
                                if( $secondary->have_posts() ):
                                    // Enquanto houver posts, mostre-os pra gente
                                    while( $secondary->have_posts() ): $secondary->the_post();
                                    ?>
                                    <div class="col-md-6"><?php get_template_part( 'template-parts/content', 'secondary'); ?></div>
                                    <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif; 
                                ?>  
                                </div>
                            </div>
						</div>						
					</div>
				</div>				
			</section>
			<section class="map">
            <?php
            $apikey =  urlencode( get_theme_mod( 'set_map_apikey' ) );
            $address =  get_theme_mod( 'set_map_address' );
            ?>
            <iframe
                width="100%"
                height="450"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=<?=$apikey?>
                    &q=<?=$address?>&zoom=15" allowfullscreen>
                </iframe>
			</section>
		</main>
	</div>
<?php get_footer(); ?>