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
				<div class="container">
					<div class="row">
						<div class="error-404">
                            <header>
                                <h1><?php _e( 'Page not Found', 'wpcurso' ); ?></h1>
                                <p><?php _e( 'Unfortunately, the page you tried to reach does not exist on this site!', 'wpcurso' ) ?></p>
                            </header>
                            <div class="error">
                                <p>How about doing a search?</p>
                                <?php 
                                get_search_form();
                                the_widget('WP_Widget_Recent_Posts', 
                                    array( 
                                        'title' => __('Lastest Post', 'wpcurso'),
                                        'number' => 3
                                    )
                                );
                                ?>
                            </div>
                        </div>
					</div>
				</div>				
			</section>
		</main>
	</div>
<?php get_footer(); ?>