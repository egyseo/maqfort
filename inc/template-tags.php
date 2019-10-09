<?php
/*
 * -----------------------------------------------------------
 * 1.0 Setup Social Icons to the theme.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_social_icons' ) ) {

  function mf_social_icons() { ?>

    <div class="social-icons">
      <a href="https://www.linkedin.com/company/11062619/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
      <a href="https://www.youtube.com/channel/UCGm3A-0jxzlwbbnb45YuB-Q" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
      <a href="https://www.facebook.com/maqfortportugal/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <!-- <a href="https://twitter.com/mf_SA" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> -->
      <a href="https://plus.google.com/106255417800774888840" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
    </div><!-- social icons ends -->

  <?php }

}

/*
 * -----------------------------------------------------------
 * 2.0 Display numbered  pagination navigation.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_pagination' ) ) {

  function mf_pagination() {
    global $wp_query;
    $bignum = 999999999;
    if ( $wp_query->max_num_pages <= 1 )
      return;
    echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
    echo '<hr>';
    echo '<nav class="pagination">';
    echo paginate_links( array(
      'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
      'format'       => '',
      'current'      => max( 1, get_query_var('paged') ),
      'total'        => $wp_query->max_num_pages,
      'prev_text'    => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
      'next_text'    => '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
      'type'         => 'list',
      'end_size'     => 1,
      'mid_size'     => 1
    ) );
    echo '</nav>';
    echo '</div>';
  }

}



/*
 * -----------------------------------------------------------
 * 3.0 Social Share Buttons
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'mf_sharing_buttons' ) ) {

  function mf_sharing_buttons( $content ) {
  	global $post;
  	if( is_singular('post') ){

  		// Get current page URL
      $maqfortURL = get_permalink($post->ID);
      $maqfortURL = esc_url($maqfortURL);

  		// Get current page title
  		$maqfortTitle = str_replace( ' ', '%20', get_the_title());

  		// Get Post Thumbnail for pinterest
  		$maqfortThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

  		// Construct sharing URL without using any script
  		$twitterURL = 'https://twitter.com/intent/tweet?text='. $maqfortTitle .'&amp;url=' . $maqfortURL . '&amp;via=mf_SA';
  		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $maqfortURL;
  		$googleURL = 'https://plus.google.com/share?url=' . $maqfortURL;
  		$whatsappURL = 'whatsapp://send?text=' . $maqfortTitle . ' ' . $maqfortURL;
  		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $maqfortURL . '&amp;title=' . $maqfortTitle;

  		// Based on popular demand added Pinterest too
  		$pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $maqfortURL . '&amp;media=' . $maqfortThumbnail[0] . '&amp;description=' . $maqfortTitle;

  		// Add sharing button at the end of page/page content
  		$content .= '<div class="maqfort-social-share">';
  		$content .= '<h4>' . __('Share on:', 'maqfort') . '</h4>';

  		$content .= '<a class="maqfort-link maqfort-facebook" title="Facebook" href="' . $facebookURL . '" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
      $content .= '<a class="maqfort-link maqfort-twitter" title="Twitter" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
      $content .= '<a class="maqfort-link maqfort-googleplus" title="Google Plus" href="' . $googleURL . '" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
  		$content .= '<a class="maqfort-link maqfort-linkedin" title="Linked In" href="' . $linkedInURL . '" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
  		$content .= '<a class="maqfort-link maqfort-whatsapp" title="Whatsappk" href="' . $whatsappURL . '" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>';
  		$content .= '<a class="maqfort-link maqfort-pinterest" title="Pinterest" href="' . $pinterestURL . '" data-pin-custom="true" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>';
  		$content .= '</div>';

  		return $content;
  	}else{
  		// if not a post/page then don't include sharing button
  		return $content;
  	}
  }

}

add_filter("the_content", "mf_sharing_buttons");

/*
 * -----------------------------------------------------------
 * 9.0 Post meta tags
 * -----------------------------------------------------------
*/
if ( ! function_exists( 'mf_post_meta' ) ) {
	function mf_post_meta() {
    if( has_tag() ) { ?>
      <div class="meta-tags">
        <ul itemprop="keywords">
          <li class="tag-icon"><i class="fa fa-tag" aria-hidden="true"></i></li>
          <?php
            $tag_list = get_the_tag_list( ' ', ', ' );
            if ( $tag_list ) {
              echo '<li class="tags">' . $tag_list . ' </li>';
            }?>
        </ul>
      </div><!-- meta tags ends -->
    <?php }
	}
  add_action( 'mf_postmeta', 'mf_post_meta' );
}

/*----------- Touch Icons -----------*/
if ( ! function_exists( 'mf_all_touch_icons' ) ) {
  function mf_all_touch_icons() {
    $touch_icon_phone = get_theme_mod( 'touch-icon-phone');
    $touch_icon_ipad = get_theme_mod( 'touch-icon-ipad');
    $touch_icon_iphone_retina = get_theme_mod( 'touch-icon-iphone-retina');
    $touch_icon_ipad_retina = get_theme_mod( 'touch-icon-ipad-retina');
    $touch_icon_ipad_pro = get_theme_mod( 'touch-icon-ipad-pro');
    $touch_icon_iphone_6_plus = get_theme_mod( 'touch-icon-iphone-6-plus');
    $android_icon_hd = get_theme_mod( 'android-icon-hd');
    $android_icon = get_theme_mod( 'android-icon');
    if ( !empty( $touch_icon_phone ) ) {
      echo '<link rel="apple-touch-icon" sizes="57x57" href="' , esc_url($touch_icon_phone) , '">';
    } else {
      return;
    }
    if ( !empty( $touch_icon_ipad ) ) {
      echo '<link rel="apple-touch-icon" sizes="76x76" href="' , esc_url($touch_icon_ipad) , '">';
    } else {
      return;
    }
    if ( !empty( $touch_icon_iphone_retina ) ) {
      echo '<link rel="apple-touch-icon" sizes="120x120" href="' , esc_url($touch_icon_iphone_retina) , '">';
    } else {
      return;
    }
    if ( !empty( $touch_icon_ipad_retina ) ) {
      echo '<link rel="apple-touch-icon" sizes="152x152" href="' , esc_url($touch_icon_ipad_retina) , '">';
    } else {
      return;
    }
    if ( !empty( $touch_icon_ipad_pro ) ) {
      echo '<link rel="apple-touch-icon" sizes="167x167" href="' , esc_url($touch_icon_ipad_pro) , '">';
    } else {
      return;
    }
    if ( !empty( $touch_icon_iphone_6_plus ) ) {
      echo '<link rel="apple-touch-icon" sizes="180x180" href="' , esc_url($touch_icon_iphone_6_plus) , '">';
    } else {
      return;
    }
    if ( !empty( $android_icon_hd ) ) {
      echo '<link rel="icon" sizes="192x192" href="' , esc_url($android_icon_hd) , '">';
    } else {
      return;
    }
    if ( !empty( $android_icon ) ) {
      echo '<link rel="icon" sizes="128x128" href="' , esc_url($android_icon) , '">';
    } else {
      return;
    }
  }
  add_action( 'mf_touch_icons', 'mf_all_touch_icons' );
}
