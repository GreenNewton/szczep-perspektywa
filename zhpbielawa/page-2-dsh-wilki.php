<?php get_header(); ?>


<?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $orders = new WP_Query(array(

        'type' => 'post',
        'cat' => '10',
        'orderby' => 'date',
        'paged' => $paged

      ));

				if($orders -> have_posts()):
        $n = 1;
        echo '<div class="container my-4">
        <h3><p class="text-primary">Wilcza kadra:</p></h3>
        <div class="row justify-content-around">';

				while($orders -> have_posts()): $orders -> the_post();

        if(has_category('przyboczny')) $color = 'text-success';
        elseif(has_category('druzynowy')) $color = 'text-primary';
        elseif(has_category('zastepowy')) $color = 'text-warning';
        else $color = '';
        ?>
        <div class="card col-md-5 my-3">
        <img class="card-img-top mt-3" src="<?php the_post_thumbnail_url(); ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="<?php echo $color; ?>"><?php the_content(); ?></h5>
            <h4 class="card-title text-center <?php echo $color; ?>"><?php the_title(); ?></h4>
          </div>
        </div>
				<?php
          $n++;
					endwhile;
          echo '</div>
        </div>';
					else:
            echo '
            <div style="min-height: 400px;">
              <h3 class="my-5"><p class="text-center"> Brak postów </p></h3>
            </div>
            ';
					endif;
				?>

      <?php
        wp_reset_postdata();
      ?>


        <div class="container">
            <div class="row d-flex justify-content-center">
			<?php
				if(have_posts()):
				while(have_posts()): the_post();
			?>
                <div class="col-xs-10 my-3 p-2">
                        <h5 class="card-title"><?php the_title(); ?></h5>
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
