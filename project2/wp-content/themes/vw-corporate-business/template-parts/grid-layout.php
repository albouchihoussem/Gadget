<?php
/**
 * The template part for displaying grid layout
 *
 * @package VW Corporate Business
 * @subpackage vw-corporate-business
 * @since VW Corporate Business 1.0
 */
?>
<div class="col-md-6 col-lg-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>  
	        </div>
	        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>      
	        <div class="new-text">
	          	<div class="entry-content">
	          		<p>
			          <?php $excerpt = get_the_excerpt(); echo esc_html( vw_corporate_business_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_corporate_business_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('vw_corporate_business_excerpt_suffix','') ); ?>
			        </p>
	          	</div>
	        </div>
	        <?php if( get_theme_mod('vw_corporate_business_button_text','Read More') != ''){ ?>
		      <div class="content-bttn">
		        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html(get_theme_mod('vw_corporate_business_button_text',__('Read More','vw-corporate-business')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_corporate_business_button_text',__('Read More','vw-corporate-business')));?></span></a>
		      </div>
		    <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>