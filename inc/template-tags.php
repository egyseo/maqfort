<?php
/*
 * -----------------------------------------------------------
 * 1.0 Setup Social Icons to the theme.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_social_icons' ) ) {

  function maqfort_social_icons() { ?>

    <div class="social-icons">
      <a href="https://www.linkedin.com/company/11062619/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
      <a href="https://www.youtube.com/channel/UCGm3A-0jxzlwbbnb45YuB-Q" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
      <a href="https://www.facebook.com/maqfortportugal/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <!-- <a href="https://twitter.com/maqfort_SA" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> -->
      <a href="https://plus.google.com/106255417800774888840" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
    </div><!-- social icons ends -->

  <?php }

}

/*
 * -----------------------------------------------------------
 * 2.0 Display numbered  pagination navigation.
 * -----------------------------------------------------------
*/

if ( ! function_exists( 'maqfort_pagination' ) ) {

  function maqfort_pagination() {
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

if ( ! function_exists( 'maqfort_sharing_buttons' ) ) {

  function maqfort_sharing_buttons( $content ) {
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
  		$twitterURL = 'https://twitter.com/intent/tweet?text='. $maqfortTitle .'&amp;url=' . $maqfortURL . '&amp;via=maqfort_SA';
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

add_filter("the_content", "maqfort_sharing_buttons");

/*
 * -----------------------------------------------------------
 * 9.0 Post meta tags
 * -----------------------------------------------------------
*/
if ( ! function_exists( 'maqfort_post_meta' ) ) {
	function maqfort_post_meta() {
    if( has_tag() ) { ?>
      <div class="meta-tags">
        <ul temprop="keywords">
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
  add_action( 'maqfort_postmeta', 'maqfort_post_meta' );
}
