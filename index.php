<?php 


Class AdvancePortfolio{


		public function portfolio_shortcode(){

				add_shortcode('ms_advance_portfolio', array( $this, 'ms_portfolio_output'));

		}

		public function ms_portfolio_output(){

			ob_start(); ?>


			 <div class="sortableLinks">
		        <a data-filter="all">All</a>

				<?php 
					$portfolio_cats = get_terms('portfolio_category');
					foreach($portfolio_cats as $category) :
				?>
		        <a data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>

		        <?php endforeach; ?>




		    </div>

		    <div class="container-fluid">
		        <div class="ms-advance-portfolio row">
					<?php 


					

					$portfolios = new WP_Query(array(
							'post_type' => 'ms_portfolio',
							'posts_per_page' => 8,
							'orderby'        => array( 'meta_value_num' => 'ASC', 'ID' => 'ASC' )

						));
					while($portfolios->have_posts() ) : $portfolios->the_post();

						
							
					?>
		            <article class="nopadding col-md-3 col-sm-6 mix <?php

		            	$categories = get_the_terms(get_the_id(), 'portfolio_category');
						if($categories) :
						foreach($categories as $catgory) :

		             echo $catgory->slug." "; 

		              endforeach; endif; 


		             ?>">

		                <div id="thelink" class="ms_portofolio_container">
		                    <figure class="ms_image_frame">
		                        <span class="ms_image_holder">
									<?php the_post_thumbnail(); ?>
								</span>
		                    </figure>
		                    <div class="ms_portofolio_details">
		                        <h4 class="ms_portfolio_title"><a class="open-popup-link" href="#popup_id_<?php echo get_the_id(); ?>"><?php the_title(); ?></a></h4>
		                        <div class="ms_portofolio_det">
		                            <p class="ms_portfolioCategory"><?php

		            	$categories = get_the_terms(get_the_id(), 'portfolio_category');
						if($categories) :
						foreach($categories as $catgory) :

		             echo $catgory->name.", "; 

		              endforeach; endif; 


		             ?></p>
		                        </div>
		                    </div>
		                </div>
		            </article>
					
				<?php endwhile; ?>

		        


		        </div>

		    </div>




		    <div class="tottal_popup_slider">

				<?php 


					$prefix = "_pref_";
					$portfolio_pop = new WP_Query(array(
							'post_type' => 'ms_portfolio',
							'posts_per_page' => -1
						));
					while($portfolio_pop->have_posts() ) : $portfolio_pop->the_post();  ?>

		        <div id="popup_id_<?php echo get_the_id(); ?>" class="mfp-hides white-popup">
		            <div class="right-side-button">
		                <button title="%title%" type="button" class="mfp-close">&#215;</button>

		                <div class="share-button">
		                    <a href="#"><i class="fas fa-share"></i></a>
		                </div>
		                <div class="social-share-icons">
		                    <ul>
		                        <li><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>"><i class="fab fa-pinterest"></i></a></li>
		                        <li><a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a></li>
		                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fab fa-linkedin-in"></i></a></li>
		                        <li><a href="mailto:?subject=<?php the_title(); ?>;body=<?php the_permalink(); ?>"><i class="far fa-envelope"></i></a></li>
		                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i></a></li>


		                       <!--  https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fjustifiedgrid.com%2Flightboxes%2Fmagnific-popup%2F%3F_escaped_fragment_%3Djig%5B4%5D%2FML%2F19168


                               https://twitter.com/intent/tweet?text=Lightboxes&url=https%3A%2F%2Fjustifiedgrid.com%2Flightboxes%2Fmagnific-popup%2F%23!jig%5B4%5D%2FML%2F19168 -->
		                    </ul>
		                </div>
		            </div>
		            <div class="light-box">
		                <div class="portolio-project-slider">
		                    <div class="top-image-gallery owl-carousel">
							

								<?php $portfolio_images =  get_post_meta(get_the_id(), $prefix.'portfolio_images', true); 

								if($portfolio_images): 
								foreach($portfolio_images as $port_image): ?>

		                        <div class="gallery-slide">

		                        	
		                            <img src="<?php echo $port_image; ?>" alt="">
		                        </div>

		                    	<?php 

		               			 endforeach;  

		            else: 

		            	the_post_thumbnail();

		            endif;




		                ?>
		                       



		                    </div>
		                    <div class="portfolio_incicator_button">
		                        <a class="customPrevBtn" href="javascript:avoid(0)"><i class="fas fa-chevron-left"></i></a>
		                        <a class="customNextBtn" href="javascript:avoid(0)"><i class="fas fa-chevron-right"></i></a>
		                    </div>
		                </div>
		                <div class="lightbox-content">



		                    <div class="client">Client: <span><?php echo get_post_meta(get_the_id(), $prefix.'client_name', true); ?></span></div>
		                    <div class="service">Provided Service: <span><?php echo get_post_meta(get_the_id(), $prefix.'provided_service', true); ?></span></div>

		                    <p><?php echo get_post_meta(get_the_id(), $prefix.'portfolio_description', true); ?></p>
		                    <b>Categories : 	</b>
		                    <span><?php 

		                    	$categories = get_the_terms(get_the_id(), 'portfolio_category');
								if($categories) :
								foreach($categories as $catgory) :

		                    		 echo $catgory->name; 

		                      	endforeach; endif;



		                     ?></span>

						 


		                </div>

		               <div>


	




		  	<div class="popup-pagination">

		  
                
				



				<?php  	


				$postid = get_the_id();

				$pid = $postid - 1;


					
					$my_posts = new WP_Query(array(


					  'post__in'	=> array( $pid),
					  'post_type' => 'ms_portfolio',
					  'posts_per_page' => 1,

					)); 
					while($my_posts->have_posts()): $my_posts->the_post();?>
		        	<div class="left-project">
		            <a  id="photo-prev" class="mk-post-nav mk-post-prev with-image" href="javascript:avoid(0)">


					<?php 



					// $prevThumb = get_the_post_thumbnail_url( get_previous_post(), 'thumbnail-size' );

					// $prevTitle = get_the_title( get_previous_post() );
					
					
					 ?>


					<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
		               
		                <span class="mk-pavnav-icon"> 
									<i class="fas fa-chevron-left"></i>
								</span>
		                <div class="nav-info-container">
		                    <span class="pagenav-bottom">
										<span class="pagenav-title"><?php the_title(); ?></span>
		                    <span class="pagenav-category">Professional Services</span>
		                    </span>
		                </div>
		            </a>
		        </div>
		    	<?php endwhile;  ?>




		    	<?php  	

		    		$postidss = get_the_id();

					$pidss = $postidss + 2;

		    	
					$my_posts = new WP_Query(array(
					  'post__in'	=> array($pidss),
					  'post_type' => 'ms_portfolio',
					  'posts_per_page' => 1,

					)); 
					while($my_posts->have_posts()): $my_posts->the_post();?>
		        <div class="right-project">
		            <a  id="photo-next" class="mk-post-nav mk-post-next with-image" href="javascript:avoid(0)">
		                <span class="mk-pavnav-icon"> 
									<i class="fas fa-chevron-right"></i>
								</span>


				<?php 

					
					//$nextThumb = get_the_post_thumbnail_url( get_next_post(), 'thumbnail-size' );

					//$nextTitle = get_the_title( get_next_post() );


					

			 ?>

				<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
		                
		                <div class="nav-info-container">
		                    <span class="pagenav-bottom">
										<span class="pagenav-title"><?php the_title(); ?></span>
		                    <span class="pagenav-category">Professional Services</span>
		                    </span>
		                </div>

		            </a>
		        </div>
		        <?php endwhile; ?>
		    </div>









		            </div>
		        </div>

				 </div>
				

				<?php endwhile; ?>







		   



			
		    

			<?php 

			return ob_get_clean();


		}


}

$portfolios = new AdvancePortfolio();

$portfolios-> portfolio_shortcode();