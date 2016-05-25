<?php 

/*

Template Name: Testimonials

*/



get_header();

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(

    'post_type' => 'tsc_testimonials',

    'posts_per_page' => 1,

    'paged' => $paged

);

$testimonials_query = new WP_Query( $args );

 ?>

<?php get_sidebar(); ?>

    <div id="content" class="col17 columns last prepend-1">

        <div id="content_int">

            <div id="edit-head" class="">

            <h1>Testimonials</h1>

            </div>

            <div id="testi_view">

            <a href="/our-company/submit-testimonial">Submit Testimonials</a>

            </div>

            <div class="rf-paragraph ">

                <div id="paragraph-121867" class="">

                    <div class="image center">

                    <a href="http://www.tshirtchampions.com/sites/437/uploaded/images/testimonialsbanner.png" class="thickbox">

                    <img src="http://www.tshirtchampions.com/sites/437/uploaded/images/testimonialsbanner-thumb600x600.png" alt="Testimonialsbanner">

                    </a>

                    </div>

                    <div class="clear"></div>

                </div>

                <div id="testimonials" class="page">



                    <div class="overall_rating">

                    Current average rating:

                    <img src="<?php bloginfo('template_directory'); ?>/images/full.png" alt="0" /><img src="<?php bloginfo('template_directory'); ?>/images/full.png" alt="1" /><img src="<?php bloginfo('template_directory'); ?>/images/full.png" alt="2" /><img src="<?php bloginfo('template_directory'); ?>/images/full.png" alt="3" /><img src="<?php bloginfo('template_directory'); ?>/images/full.png" alt="4" /></div>

                        <div class="testimonials">

                        <?php if ($testimonials_query->have_posts()) : ?>

                            <?php while ($testimonials_query->have_posts()) : $testimonials_query->the_post(); ?>

                            <div class="item">

                                <div class="rating">

                                <img src="<?php bloginfo('template_directory'); ?>/images/full.png" alt="0" />

                                <img src="<?php bloginfo('template_directory'); ?>/images/full.png" alt="1" />

                                <img src="<?php bloginfo('template_directory'); ?>/images/full.png" alt="2" />

                                <img src="<?php bloginfo('template_directory'); ?>/images/full.png" alt="3" />

                                <img src="<?php bloginfo('template_directory'); ?>/images/full.png" alt="4" />

                                </div>



                                <?php if( has_post_thumbnail()){ ?>

                                    <div id="test_img">

                                    <?php the_post_thumbnail(); ?>

                                    </div>

                                <?php } ?>



                                <div id="test_comments">

                                  <?php the_content(); ?>

                                </div>

                                <div class="name robotb"><?php the_field('name'); ?></div>

                                <div class="loc"><?php echo the_field('company'); ?></div>

                                <div class="loc"><?php echo the_field('state'); ?></div>

                                <div class="clear"></div>

                            </div>

                            <?php endwhile; ?>

                            <?php endif; ?>

                                    <div id="blog_pager">

                                    <?php

                                        $big = 999999999; // need an unlikely integer

                                        echo paginate_links( array(

                                        	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),

                                        	'format' => '?paged=%#%',

                                        	'current' => max( 1, get_query_var('paged') ),

                                        	'total' => $testimonials_query->max_num_pages

                                        ) );

                                    ?>

                                    </div>

                                </div>

                                <div id="testi_submit_bg">

                                <a href="/our-company/submit-testimonial">Submit Testimonials</a>

                                </div>

                            </div>

                        </div><!-- end content_int -->

                    </div><!-- end content -->

                    <div class="clear"></div>

                </div><!-- end main -->

            </div><!-- end wrapper -->

<?php 

wp_reset_postdata();

get_footer();

?>