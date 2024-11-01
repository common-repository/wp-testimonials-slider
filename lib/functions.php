<?php
function wptsRegisterePage() {
	add_submenu_page( 'edit.php?post_type=testimonial', 'WP Testimonials Settings', 'Testimonial Settings', 'manage_options', 'testimonial', 'wptsPageFunction' ); 
}
add_action('admin_menu', 'wptsRegisterePage');

function wptsPageFunction() {
	
	echo '<div class="newsWrap">';
		echo '<h1>WP Testimonial Slider Configurations</h1>';
?>

<div id="nhtLeft">
  <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>
    <div class="inside">
      <h3>Insert your text & background color</h3>
      <p>WP Testimonials Slider is a fully responsive wordpress testimonial slider plugin. <br />
        Just copy and paste "<strong>if(function_exists('wp_testimonial_content_exist')){wp_testimonial_content();}</strong> in the template code or <strong>[WPTS-TESTIMONIAL]</strong> in the post/page" where you want to display testimonial.</p>
      <table class="form-table">
        <tr>
          <th><label for="wpts_bg_color">Background Color</label></th>
          <td><input type="text" name="wpts_bg_color" id="wpts_bg_color" value="<?php $wpts_bg_color = get_option('wpts_bg_color'); if(!empty($wpts_bg_color)) {echo $wpts_bg_color;} else {echo "#3397db";}?>" class="color-picker wpts_bg_color" /></td>
        </tr>
        <tr>
          <th><label for="wpts_title_color">Font Color </label></th>
          <td><input type="text" name="wpts_title_color" id="wpts_title_color" value="<?php $wpts_title_color = get_option('wpts_title_color'); if(!empty($wpts_title_color)) {echo $wpts_title_color;} else {echo "#fff";}?>" class="color-picker wpts_title_color" /></td>
        </tr>
      </table>
      <input type="hidden" name="action" value="update" />
      <input type="hidden" name="page_options" value="wpts_bg_color, wpts_title_color" />
      <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" class="button button-primary" />
      </p>
    </div>
  </form>
</div>
<div id="nhtRight">
  <div class="clrFix"></div>
  <div class="nhtWidget">
    <h3>Donate and support the development.</h3>
    <p>With your help I can make Simple Fields even better! $5, $10, $100 – any amount is fine! :)</p>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="82C6LTLMFLUFW">
      <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
      <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
    </form>
  </div>
  <div class="clrFix"></div>
  <div class="nhtWidget">
    <div class="clrFix"></div>
    <h3>About the Author</h3>
    <p>My name is <strong><a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">S M Hasibul Islam</a></strong> and I am a <strong>Web Developer, Expert WordPress Developer</strong>. I am regularly available for interesting freelance projects. If you ever need my help, do not hesitate to get in touch <a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">me</a>.<br />
      <strong>Email:</strong> cse.hasib@gmail.com<br />
      <strong>Email:</strong> cse.hasib<br />
    <div class="clrFix"></div>
  </div>
</div>
<div class="clrFix"></div>
</div>
<div class="clrFix"></div>
<?php		
	echo '</div>';
}
