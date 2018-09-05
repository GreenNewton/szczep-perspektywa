<?php
	get_header();
?>
<!-- POSTS -->
			<?php

				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$main = new WP_Query(array(
					'type' => 'post',
					'cat' => '-3',
					'orderby' => 'date',
					's' => $_GET['s'],
					'paged' => $paged
				));

				if($main -> have_posts()):
				while($main -> have_posts()): $main -> the_post();
			?>

<div class="container my-3">
    <div class="card p-4">
      <div class="row">
        <div class="col-md-4 mb-3">
            <img src="<?php the_post_thumbnail_url(); ?>" class="w-100">
          </div>
          <div class="col-md-8 px-3">
            <div class="card-block px-3">
              <h4 class="card-title"><?php the_title(); ?></h4><h6><?php the_time('j F Y'); ?></h6>
              <div class="card-text post-text h-max"><?php the_content(); ?></div>
              <a href="<?php the_permalink(); ?>" class="btn btn-primary">Więcej</a>
            </div>
          </div>
        </div>
      </div>
    </div>
				<?php
			endwhile; ?>
					<div class="container d-flex justify-content-around">
						<?php previous_posts_link('Poprzednia strona', $main -> max_num_pages); ?>
						<?php next_posts_link('Następna strona', $main -> max_num_pages);     ?>
					</div>
				<?php
					else:
					echo
					'<div style="min-height: 400px;">
						<h3 class="my-5"><p class="text-center"> Brak wyników wyszukiwania </p></h3>
					</div>';
					endif;

					wp_reset_postdata();
				?>
    <!-- END OF POSTS-->

		<!-- CTA -->
	        <div class="container-fluid my-5 py-4 bg-gray">
	            <div class="row d-flex justify-content-center">
	                <div class="col-xs-4"><hr /></div>
	                <div class="col-xs-4">
	                    <!-- Button trigger modal -->
	                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalLong">
	                        Chcesz przyjść na jedną ze zbiórek?<br />Kliknij tutaj!
	                    </button>

	                    <!-- Modal -->
	                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	                        <div class="modal-dialog" role="document">
	                            <div class="modal-content">
	                                <div class="modal-header">
	                                    <h5 class="modal-title" id="exampleModalLongTitle">Zapraszamy na zbiórkę!</h5>
	                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                                        <span aria-hidden="true">&times;</span>
	                                    </button>
	                                </div>
	                                <div class="modal-body">
	                                    <?php
																			$id = 84;
																			$p = get_page($id);
																			echo apply_filters('the_content', $p->post_content);
																			?>
	                                </div>
	                                <div class="modal-footer">
	                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    <!-- END OF CTA -->

<?php get_footer(); ?>
