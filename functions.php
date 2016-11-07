<?php 

//logo
function logo(){
    echo get_template_directory_uri().'/images/tokopedia-logo.png';
}
//add images
function images($images){
    echo get_template_directory_uri().'/images/'.$images;
}

function print_meta($metaname){
	global $post;
	echo get_post_meta($post->ID,$metaname, true);
}
function feature_img_url($postid, $imagesize) {
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($postid), $imagesize);
    $url = $thumb['0'];
    return $url;
}


//after setup function
function promotion_setup(){
    //adding feed link
    add_theme_support('automatic-feed-links');
    //adding title 
    add_theme_support('title-tag');
    //adding post thumbnail
    add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme','promotion_setup');

function promotion_scripts(){
    //adding bootstrap css
    wp_enqueue_style('bootstrapcss',get_template_directory_uri().'/css/bootstrap.min.css');
    //adding style css
    wp_enqueue_style('stylesheet',get_stylesheet_uri());
    //add bootstrap js
    wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'2016',true);
}
add_action('wp_enqueue_scripts','promotion_scripts');


//adding metabox to post
add_action('add_meta_boxes','post_metabox');
function post_metabox(){
    add_meta_box('promo_box','Promo Detail','promo_box','post','side','high');
}
function promo_box($post){
    $value=get_post_custom($post->ID);
    $linkpromo=isset($value['linkpromo']) ? esc_attr($value['linkpromo'][0]) : '';
    
     
     wp_nonce_field('post_meta_box_nonce','meta_box_nonce');
     ?>
     
     <style>
		.form-group label {
			margin-bottom: 10px;
		}
		
		.form-post {
			width: 100%;
			padding: 10px;
			border-radius: 3px;
			margin: 0;
		}
	</style>
	<div class="form-group">
		<label for="linkpromo">Masukan Link Promo</label>
		<input type="text" name="linkpromo" id="linkpromo" class="form-post" placeholder="Masukan Link Promo" value="<?php echo $linkpromo;?>">
	</div>
	
     
     <?php
}
add_action('save_post','post_promo_save');
function post_promo_save($post_id){
     if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    // if our nonce isn't there, or we can't verify it, bail
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'post_meta_box_nonce'))
        return;

    // if our current user can't edit this post, bail
    if (!current_user_can('edit_post'))
        return;
        if (isset($_POST['linkpromo'])) {
        update_post_meta($post_id, 'linkpromo', $_POST['linkpromo']);
    }
   
}


?>