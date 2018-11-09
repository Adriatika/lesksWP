<?php $postId = get_the_ID();
						?>
							<div class="ctgWrapper">
								<div class="ctgRow">
									<a href="<?php the_permalink();?>" class="ctgRow__ancImg">
										<img src="<?php the_post_thumbnail_url();?>" alt="" class="ctgRow__img">
									</a>
									<div class="ctgRow__promo">
									<?php 
										$postTags = get_the_terms( $postId, 'post_tag');
									?>
									<?php if($postTags){ ?>
										<div class="ctgRow__meta">
											<?php
											$i=0;
											foreach ($postTags as $curTerm ) {
													echo '<a href="'.get_term_link( (int)$curTerm->term_id, $curTerm->taxonomy) .'" class="ctgRow__tag">'.$curTerm->name.'</a>';
													$i++;
													if($i==3){break;}
												}	
											?>
										</div>
									<?php
									};?>
										<a href="<?php the_permalink();?>" class="ctgRow__ancTitle">
											<h2>
											<?php the_title();?>
											</h2>
										</a>
										<p class="ctgRow__text"><?php echo kama_excerpt(array('maxchar'=>120));?></p>
									</div>
								</div>
							</div>	