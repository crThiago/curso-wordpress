<?php get_header(); ?>
    <div class="content-area">
		<main>
			<section class="slide">
				<div class="container">
					<div class="row"><?php _e( 'Slide', 'wpcurso' ); ?></div>
				</div>
			</section>
			<section class="services">
				<div class="container">
					<div class="row"><?php _e( 'Serviços', 'wpcurso' ); ?></div>
				</div>				
			</section>
			<section class="middle-area">
				<div class="container">
					<div class="row">
						<aside class="sidebar col-md-4"><?php _e( 'Barra Lateral', 'wpcurso' ); ?></aside>
						<div class="news col-md-8">
							<?php 
							// Se houver algum post
							if( have_posts() ):
								// Enquanto houver posts, mostre-os pra gente
								while( have_posts() ): the_post();

							?>

							<p><?php _e( 'Conteúdo vindo do arquivo home.php', 'wpcurso' ); ?></p>

							<?php 
								endwhile;
							else:
							?>

							<p><?php _e( "There's nothing yet to be displayed...", 'wpcurso'); ?></p>

							<?php endif; ?>

						</div>						
					</div>
				</div>				
			</section>
			<section class="map">
				<div class="container">
					<div class="row"><?php _e( 'Mapa', 'wpcurso' ); ?></div>
				</div>				
			</section>
		</main>
	</div>
<?php get_footer(); ?>