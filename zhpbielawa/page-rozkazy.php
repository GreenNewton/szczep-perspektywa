<?php get_header(); ?>



        <div class="container my-5" style="min-height: 400px;">


          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tytuł</th>
                <th scope="col">Data dodania na stone</th>
                <th scope="col">Odnośnik do rozkazu</th>
              </tr>
            </thead>
            <tbody>
			<?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $orders = new WP_Query(array(

        'type' => 'post',
        'cat' => '9',
        'orderby' => 'date',
        'paged' => $paged

      ));

				if($orders -> have_posts()):
        $n = 1;
				while($orders -> have_posts()): $orders -> the_post();
			?>
                <tr>
                  <th scope="row"><?php echo $n; ?></th>
                  <td><?php the_title(); ?></td>
                  <td><?php the_time('j F Y'); ?></td>
                  <td><?php the_content(); ?></td>
                </tr>
				<?php
          $n++;
					endwhile;
					else:
            echo '
            <div style="min-height: 400px;">
              <h3 class="my-5"><p class="text-center"> Brak postów </p></h3>
            </div>
            ';
					endif;
				?>
            </tbody>
          </table>
        </div>
      <?php
        wp_reset_postdata();
      ?>
      <div class="container d-flex justify-content-around">
        <?php previous_posts_link('Poprzednia strona', $orders -> max_num_pages); ?>
        <?php next_posts_link('Następna strona', $orders -> max_num_pages);     ?>
      </div>


<?php get_footer(); ?>
