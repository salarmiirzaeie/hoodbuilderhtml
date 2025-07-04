<?php
session_start();
// function to display number of posts.
function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0";
	}
	return $count;
}

// function to count views.
function setPostViews($postID) {
	
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		if(!isset($_SESSION['post_views_count-'. $postID])){
			$_SESSION['post_views_count-'. $postID]="si";
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
}