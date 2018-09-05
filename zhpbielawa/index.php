<?php
	get_header();
?>

<!-- SLIDER -->
<div class="container">
		<div class="row d-flex justify-content-center">
				<div class="col-sm-9 py-3" id="slider">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
								<ol class="carousel-indicators">
										<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<?php

										$slide_post = new WP_Query('cat=-9,-10,-11,-12&posts_per_page=3&orderby=date');

										if($slide_post -> have_posts()):
										$n=0;
										while($slide_post -> have_posts()): $slide_post -> the_post();

									?>
										<div class="carousel-item <?php if($n == 0) echo 'active'; ?>">
												<a href="<?php the_permalink(); ?>"><img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="slider"></a>
												<div class="carousel-caption d-none d-md-block">
													<a class="nav-link" href="<?php the_permalink(); ?>">
														<h5><?php the_title(); ?></h5>
													</a>
												</div>
										</div>

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
										<?php wp_reset_postdata(); ?>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
								</a>
						</div>

				</div>
				<div class="col-sm-3 d-flex align-content-around flex-wrap">
						<div class="col-xs-12 my-2">
								<a href="<?php echo get_home_url().'/26-gz-kubusie-puchatki/';?>"><img class="img-fluid img-transform" alt="26GZ" src="<?php echo get_template_directory_uri(); ?>/img/26GZ.png" /></a>
						</div>
						<div class="col-xs-12 my-2">
								<a href="<?php echo get_home_url().'/32-dh-tomcia/';?>"><img class="img-fluid img-transform" alt="32DH" src="<?php echo get_template_directory_uri(); ?>/img/32dh.png" /></a>
						</div>
						<div class="col-xs-12 my-2">
								<a href="<?php echo get_home_url().'/2-dsh-wilki/';?> "><img class="img-fluid img-transform" alt="2DSH" src="<?php echo get_template_directory_uri(); ?>/img/2dsh.png" /></a>
						</div>
				</div>
		 </div>
</div>
<!-- END OF SLIDER -->

<!-- POSTS -->
        <div class="container">
            <div class="row d-flex justify-content-around">
			<?php

				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$main = new WP_Query(array(
					'type' => 'post',
					'cat' => '-9,-10,-11,-12',
					'orderby' => 'date',
					's' => $_GET['s'],
					'paged' => $paged
				));

				if($main -> have_posts()):
				while($main -> have_posts()): $main -> the_post();
			?>
                <div class="card col-md-5 my-3">
                    <img class="card-img-top mt-3" src="<?php the_post_thumbnail_url(); ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5><h6><?php the_time('j F Y'); ?></h6>
                        <div class="card-text post-text h-max"><?php the_content(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-2">Więcej</a>
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
					echo '<p> No content found </p>';
					endif;

					wp_reset_postdata();
				?>
            </div>
        </div>
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
																		$id = 20;
																		$p = get_page($id);
																		echo apply_filters('the_content', $p->post_content);
																		?>	                                </div>
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
