<?php
/*
Plugin Name: View More Buttons
Description: View More Buttons for Phelo website project
Version: 1.1
Author: Ares Ioakimidis
*/

function view_more_shortcode($attr) {
  
  // Get a random unique ID usin the uniqid() methode
  $random_id = uniqid('view_more_', false);

  $sc_atts = shortcode_atts( array(
    'content' => '#',
  ), $attr );

  // Enqueue the styles
  wp_enqueue_style('view-more-buttons-style', plugins_url('css/style.css', __FILE__));

  // Construct the body of the button
  $viewMoreContent = '
  <div class="hiddenMsgContainer">
    <div>
      <a class="viewMoreBtnAbout'.$random_id.'">View More</a>
    </div>
    <div class="hiddenMessage'.$random_id.'">
      <p>
        '.$sc_atts['content'].'
      </p>
    </div>
  </div>

  
  <script>
      const theMessage'.$random_id.' = document.querySelector(".hiddenMessage'.$random_id.'");
      const theViewMoreLink'.$random_id.' = document.querySelector(".viewMoreBtnAbout'.$random_id.'");
      theViewMoreLink'.$random_id.'.addEventListener("click", () => {
        theMessage'.$random_id.'.style.opacity = 1;
        theViewMoreLink'.$random_id.'.style.display = "none";
      })
  </script>
  ';
  
  return $viewMoreContent;
}

add_shortcode('view-more-shortcode-phelo', 'view_more_shortcode');
?>