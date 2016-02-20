<?php

function get_cta_banner_ad_widget() {
    do_action( 'get_cta_banner_ad_widget' );
    if ( file_exists( TEMPLATEPATH . '/inc/cta-widget.php') ) {
        load_template( TEMPLATEPATH . '/inc/cta-widget.php');
    } else {
       load_template( ABSPATH . 'wp-content/themes/sfch/inc/cta-widget.php');
    }
}

function cta_banner_ad_widget() {
    get_cta_banner_ad_widget();
    return;
}


wp_register_sidebar_widget( 
	'cta_banner_ad_widget', 
	'Call To Action Banner', 
	'cta_banner_ad_widget_display', 
	array(
		'classname' => 'cta_banner_ad_widget', 
		'description' => 'A banner for the "Get Started" section.'
	)
);

wp_register_widget_control(
	'cta_banner_ad_widget',		// id
	'cta_banner_ad_widget',		// name
	'cta_banner_ad_widget_control'	// callback function
);

function cta_banner_ad_widget_control ($args=array(), $params=array()) {
	//the form is submitted, save into database
	if (isset($_POST['submitted'])) {
		update_option('cta_banner_ad_widget_title', $_POST['widgettitle']);
		update_option('cta_banner_ad_widget_cta_url', $_POST['cta_url']);
		update_option('cta_banner_ad_widget_cta_title', $_POST['cta_title']);
		update_option('cta_banner_ad_widget_description', $_POST['description']);
	}

	//load options
	$widgettitle = get_option('cta_banner_ad_widget_title');
	$cta_url = get_option('cta_banner_ad_widget_cta_url');
	$cta_title = get_option('cta_banner_ad_widget_cta_title');
	$description = get_option('cta_banner_ad_widget_description');
	?>

	<br /><br />Title:<br />
	<input type="text" class="widefat" name="widgettitle" value="<?php echo stripslashes($widgettitle); ?>" />
	<br /><br />

	Description:<br />
	<textarea class="widefat" rows="5" name="description"><?php echo stripslashes($description); ?></textarea>
	<br /><br />

	CTA URL:<br />
	<input type="text" class="widefat" name="cta_url" value="<?php echo stripslashes($cta_url); ?>" />
	<br /><br />

	CTA Title:<br />
	<input type="text" class="widefat" name="cta_title" value="<?php echo stripslashes($cta_title); ?>" />
	<br /><br />

	<input type="hidden" name="submitted" value="1" />
	<?php
}



function cta_banner_ad_widget_display($args=array(), $params=array()) {
	//load options
	$title = get_option('cta_banner_ad_widget_title');
	$cta_url = get_option('cta_banner_ad_widget_cta_url');
	$cta_title = get_option('cta_banner_ad_widget_cta_title');
	$description = get_option('cta_banner_ad_widget_description');

	//widget output
	echo stripslashes($args['before_widget']);

	echo stripslashes($args['before_title']);
	echo stripslashes($title);
	echo stripslashes($args['after_title']);

	echo '<div class="textwidget">'.stripslashes(nl2br($description));

	echo '<dive class="widgetcta"><a href="'.stripslashes($cta_url).'" target="_blank">'.stripslashes($cta_title).'</a></div>';

	echo '</div>';//close div.textwidget
  echo stripslashes($args['after_widget']);
}

