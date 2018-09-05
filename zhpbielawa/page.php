<?php get_header(); ?>



        <div class="container">
            <div class="row d-flex justify-content-around">
			<?php
				if(have_posts()):
				while(have_posts()): the_post();
			?>
                <div class="col-xs-10 my-3 p-2">
                        <h2 class="card-title"><?php the_title(); ?></h2>
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
