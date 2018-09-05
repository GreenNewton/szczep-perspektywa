<?php get_header(); ?>



        <div class="container">
            <div class="row d-flex justify-content-around">
			<?php
				if(have_posts()):
				while(have_posts()): the_post();
			?>
				<div class="col-xs-8 my-3" style="max-width: 600px;">
					<img class="img-fluid mt-3" src="<?php the_post_thumbnail_url(); ?>" alt="Post Image">
				</div>
                <div class=" col-xs-12 my-3">
                        <h5 class="card-title"><?php the_title(); ?></h5><h6><?php the_time('j F Y'); ?></h6>
                        <p class="card-text"><?php the_content(); ?></p>
                </div>
				<?php		
					endwhile;
					else:
					echo '<p> No content found </p>';
					endif;
				?>
            </div>
        </div>



<?php get_footer(); ?>