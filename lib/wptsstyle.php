<?php 
function wptsEditableCSS(){
    ?>
<style type="text/css">
.cd-testimonials-wrapper, .cd-testimonials-all p{
  background-color: <?php $wpts_bg_color = get_option('wpts_bg_color'); if(!empty($wpts_bg_color)) {echo $wpts_bg_color;} else {echo "#3397db";}?>;
}
.cd-testimonials-wrapper::after, .cd-testimonials, .cd-author .cd-author-info li:last-child, .flex-direction-nav li a::before, .flex-direction-nav li a::after, .cd-testimonials-all p{
	color: <?php $wpts_title_color = get_option('wpts_title_color'); if(!empty($wpts_title_color)) {echo $wpts_title_color;} else {echo "#fff";}?>;
}
.cd-testimonials-all p::after{
	border-top-color: <?php $wpts_bg_color = get_option('wpts_bg_color'); if(!empty($wpts_bg_color)) {echo $wpts_bg_color;} else {echo "#3397db";}?>;
}
.wptsColor{display:none !important;}
</style>
<?php
}
add_action('wp_footer','wptsEditableCSS', 100);
?>