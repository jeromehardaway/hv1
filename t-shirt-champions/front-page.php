<?php get_header(); the_post(); ?>

<div id="wrapper" class="">
  <div id="main" class="">
    <div id="content" class="">
      <div id="content_int">
        <div class="slick" id="home_photoset">
        <?php 
          if(have_rows('slides')):
            while(have_rows('slides')):
              the_row();
              $slide_background = get_sub_field('slide_repeating_background');
              $slide_image        = get_sub_field('slide_image');
              $slide_url        = get_sub_field('slide_url');
          ?>
          <div class="responsive-image" style="background-image:url(<?php echo $slide_background; ?>);">
            <div class="container">
              <a href="<?php echo $slide_url; ?>"><img src="<?php echo $slide_image; ?>" class="responsive-image" /></a>
            </div>
          </div>
        <?php 
            endwhile;
          endif;
        ?>
        </div>
      </div>

      <noscript>
      <style type="text/css">
      .not_first,
      .control {
        display: none;
      }
      </style>
      </noscript>
    </div>

<div id="shipping">
  <div class="container">
    <div class="ship_info">
      <div class="free">
        <div class="month openxb">
<?php
              echo date('M', strtotime('+ 6 days'));
?>
        </div>
        <div class="day openb">
          <?php
              echo date('d', strtotime('+ 6 days'));
          ?>
      </div>
      </div>
     <div class="rush">
      <div class="month openxb" >
                      <?php
              echo date('M', strtotime('+ 4 days'));
              ?>
      </div>
      <div class="day openb">
      <?php
$Date = "d";
echo date('d', strtotime(' + 4 days'));
?>
</div>
     </div>
    <div class="link">
    <a href="">see our shipping policies</a>
	 </div>
</div>
</div>
</div>
<div id="homeh1_wrap" class="container">
  <div class="row">
    <div id="homeh1">
	   <h1>3 easy ways to create</h1>
    </div>
  </div>
</div>
<div id="triptych" class="container">
  <div id="edit-triptych" class="">
    <div class="row">
     <?php
        if(have_rows('blue_boxes')):
          while(have_rows('blue_boxes')):
            the_row();
            $link = get_sub_field('link');
            $image = get_sub_field('image');
            $text = get_sub_field('text');
      ?> 
      <div class="trip large-4 columns last">
        <a href="<?php echo $link; ?>">
          <span class="hover robotr"><?php echo $text; ?><span class="more open">learn more &raquo;</span></span>
          <img src="<?php echo $image; ?>" class="responsive-image" />
        </a>
      </div>
      <?php
          endwhile;
        endif;
      ?>

    </div>
  </div>
</div>
<div id="testimonials">
  <div class="container">
    <div class="row">
      <div class="champion col14 columns append-1">
        <div id="edit-champion" class="">
          <?php
            $args = array(
              'post_type' => 'tsc_champion',
              'posts_per_page' => 1
            );
            $champions = get_posts($args);
            $champion_of_the_month = $champions[0];

            $hidden = get_field('home_page_visibility', $champion_of_the_month->ID);
            $month = get_field('month', $champion_of_the_month->ID);
            $year = get_field('year', $champion_of_the_month->ID);
            $excerpt = get_field('home_page_excerpt', $champion_of_the_month->ID);

            if(!$hidden):
          ?>
          <div class="top">
          <h2>Champion of the month</h2>
          <?php echo get_the_post_thumbnail( $champion_of_the_month->ID, 'home_champion' ); ?>
          <p><?php echo $excerpt; ?><br />
          <a href="<?php echo site_url('/champion-of-the-month') ?>" target="_self" title="Click here to read more about the Champion of the Month">Continue Reading...</a></p>
          </div>

          <?php endif; ?>
          
          <div class="bottom">
          <?php echo get_field('content'); //Home Become a Member ?>
          </div>
      </div>
    </div>
    <div class="col9 columns last prepend-1">
    <h4>Testimonials</h4>
      <div class="testimonials">
        <?php 
        $args = array(
  'post_type' => 'tsc_testimonials',
  'posts_per_page' => 2
);
$home_testimonials = get_posts($args);
foreach($home_testimonials as $testimonial){
  $title = $testimonial->post_title;
  $location = get_field('location', $testimonial->ID);
  $company = get_field('company', $testimonial->ID);
  $rating = get_field('rating', $testimonial->ID);
  ?>
  <div class="item">
   <div class="rating">
   <?php
   for  ($i = 0; $i < $rating; $i++):
    if(($rating - $i) < 1){
      echo '<img src="'. get_bloginfo('template_directory') .'/images/half.png" class="responsive-image" />';
    }
    else{
      echo '<img src="'. get_bloginfo('template_directory') .'/images/full.png" class="responsive-image" />';
    }
    endfor;
    ?>
     </div>
      <?php echo apply_filters('the_content', strip_tags($testimonial->post_content)); ?>
      <div class="name robotb"><?php echo $title; ?></div>
      <div class="loc"><?php echo $company; ?></div>
      <div class="loc"><?php echo $location; ?></div>
      </div>
  <?php 
}
?>
      </div>
</div>
</div>
</div>
</div>
<div id="about" class="container">
  <div class="row">
    <div class="col10 columns append-2">
      <h4>We have worked with many champions</h4>
      <div id="logo_farm">
      <?php
        if(have_rows('champion_logos')):
          while(have_rows('champion_logos')):
            the_row();
            $link = get_sub_field('link');
            $attachment_id = get_sub_field('logo');
            $image = wp_get_attachment_image( $attachment_id, 'home_champion_logo', false, array('class' => 'responsive-image') );
      ?>
        <div class="logo first">
          <a target="_blank" href="<?php echo $link; ?>">
            <?php echo $image; ?>
          </a>
        </div>
      <?php
          endwhile;
        endif;
      ?>
      </div>
    </div>
    <div class="video_wrap col14 columns last">
      <div id="edit-video" class="">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</div>
</div><!-- end content_int -->
</div><!-- end content -->
<div class="clear"></div>
</div><!-- end main -->
</div><!-- end wrapper -->
<?php get_footer(); ?>
