<?php
$cookiesMsg = get_theme_mod('cookies_msg');
$cookiesReadmore = get_theme_mod('cookies_read_more');
?>
<?php if(!empty($cookiesMsg)) :?>
<div id="eu-cookie-bar">
  <div class="container container-fluid">
    <div class="row middle-xs between-xs">
      <div class="cookies-content">
        <p><?php echo esc_html($cookiesMsg); ?></p>
        <?php if(!empty($cookiesReadmore)) :?>
          <div class="cookies-buttons">
            <a href="<?php echo esc_url($cookiesReadmore); ?>"><?php _e('Ler mais' , 'maqfort'); ?></a>
            <button id="euCookieAcceptWP" onclick="euAcceptCookiesWP();"><?php _e( 'Ok, continuar', 'maqfort' ); ?></button>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
