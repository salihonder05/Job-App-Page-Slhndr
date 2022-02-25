<?php
/** first create a function for processing your request*/
function process_jobapps_post_request(WP_REST_Request $request){
		$request_body = $request->get_body_params();

		$postID = create_jobapps_cv_post($request_body['name'],' ') ;

		foreach($request_body as $key => $val) {
			update_post_meta( $postID, $key, $val );
		}

		if (strlen($_FILES['photo']['name']) > 0) {
			$wordpress_upload_dir = wp_upload_dir();
			$i = 1;
			$upload_file = $_FILES['photo'];
			$new_file_path = $wordpress_upload_dir['path'] . '/' . $upload_file['name'];
			$new_file_mime = mime_content_type( $upload_file['tmp_name'] );
				
			while( file_exists( $new_file_path ) ) {
				$i++;
				$new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $upload_file['name'];
			}
			
			// looks like everything is OK
			if( move_uploaded_file( $upload_file['tmp_name'], $new_file_path ) ) {
				
				$upload_id = wp_insert_attachment( array(
					'guid'           => $new_file_path, 
					'post_mime_type' => $new_file_mime,
					'post_title'     => preg_replace( '/\.[^.]+$/', '', $upload_file['name'] ),
					'post_content'   => '',
					'post_status'    => 'inherit'
				), $new_file_path );
				// wp_generate_attachment_metadata() won't work if you do not include this file
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
				// Generate and save the attachment metas into the database
				wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
				// Show the uploaded file in browser
				update_post_meta( $postID, 'photo', $wordpress_upload_dir['url'] . '/' . basename( $new_file_path ) );
				update_post_meta( $postID, 'photo_filename', $wordpress_upload_dir['subdir'] .'/' . basename( $new_file_path ) );
			}
		} // If Photo
		if (strlen($_FILES['work_portfolio']['name']) > 0) {
			$wordpress_upload_dir = wp_upload_dir();
			$i = 1;
			$upload_file = $_FILES['work_portfolio'];
			$new_file_path = $wordpress_upload_dir['path'] . '/' . $upload_file['name'];
			$new_file_mime = mime_content_type( $upload_file['tmp_name'] );
				
			while( file_exists( $new_file_path ) ) {
				$i++;
				$new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $upload_file['name'];
			}
			
			// looks like everything is OK
			if( move_uploaded_file( $upload_file['tmp_name'], $new_file_path ) ) {
				
				$upload_id = wp_insert_attachment( array(
					'guid'           => $new_file_path, 
					'post_mime_type' => $new_file_mime,
					'post_title'     => preg_replace( '/\.[^.]+$/', '', $upload_file['name'] ),
					'post_content'   => '',
					'post_status'    => 'inherit'
				), $new_file_path );
				// wp_generate_attachment_metadata() won't work if you do not include this file
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
				// Generate and save the attachment metas into the database
				wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
				// Show the uploaded file in browser
				update_post_meta( $postID, 'work_portfolio', $wordpress_upload_dir['url'] . '/' . basename( $new_file_path ) );
			}
		}
		if (strlen($_FILES['motivational_letter']['name']) > 0) {
			$wordpress_upload_dir = wp_upload_dir();
			$i = 1;
			$upload_file = $_FILES['motivational_letter'];
			$new_file_path = $wordpress_upload_dir['path'] . '/' . $upload_file['name'];
			$new_file_mime = mime_content_type( $upload_file['tmp_name'] );
				
			while( file_exists( $new_file_path ) ) {
				$i++;
				$new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $upload_file['name'];
			}
			
			// looks like everything is OK
			if( move_uploaded_file( $upload_file['tmp_name'], $new_file_path ) ) {
				
				$upload_id = wp_insert_attachment( array(
					'guid'           => $new_file_path, 
					'post_mime_type' => $new_file_mime,
					'post_title'     => preg_replace( '/\.[^.]+$/', '', $upload_file['name'] ),
					'post_content'   => '',
					'post_status'    => 'inherit'
				), $new_file_path );
				// wp_generate_attachment_metadata() won't work if you do not include this file
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
				// Generate and save the attachment metas into the database
				wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
				// Show the uploaded file in browser
				update_post_meta( $postID, 'motivational_letter', $wordpress_upload_dir['url'] . '/' . basename( $new_file_path ) );
			}
		}
		if (strlen($_FILES['cvfile']['name']) > 0) {
			$wordpress_upload_dir = wp_upload_dir();
			$i = 1;
			$upload_file = $_FILES['cvfile'];
			$new_file_path = $wordpress_upload_dir['path'] . '/' . $upload_file['name'];
			$new_file_mime = mime_content_type( $upload_file['tmp_name'] );
				
			while( file_exists( $new_file_path ) ) {
				$i++;
				$new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $upload_file['name'];
			}
			
			// looks like everything is OK
			if( move_uploaded_file( $upload_file['tmp_name'], $new_file_path ) ) {
				
				$upload_id = wp_insert_attachment( array(
					'guid'           => $new_file_path, 
					'post_mime_type' => $new_file_mime,
					'post_title'     => preg_replace( '/\.[^.]+$/', '', $upload_file['name'] ),
					'post_content'   => '',
					'post_status'    => 'inherit'
				), $new_file_path );
				// wp_generate_attachment_metadata() won't work if you do not include this file
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
				// Generate and save the attachment metas into the database
				wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
				// Show the uploaded file in browser
				update_post_meta( $postID, 'cvfile', $wordpress_upload_dir['url'] . '/' . basename( $new_file_path ) );
			}
		}


		$record_time = date('F j, Y g:i a');
		setcookie('jobappslhndr_time',  $record_time, (time()+900), "/");
		if (setcookie('jobappslhndr_name',  $request_body['name'], (time()+900), "/"))
		{
			$location = $_SERVER['HTTP_REFERER'];
        	wp_safe_redirect($location);
        	exit();
		}


		

 }
 
function register_jobapps_route(){
	register_rest_route('jobapps/v1', '/save-cv', array(
		 'methods'=>'POST',
		 'callback'=>'process_jobapps_post_request'
	));
 }
 add_action('rest_api_init', 'register_jobapps_route');







function create_jobapps_cv_post($title_of_the_page,$content,$parent_id = NULL ) 
 {
	$page_id = wp_insert_post(
			array(
			'comment_status' => 'close',
			'ping_status'    => 'close',
			'post_author'    => 1,
			'post_title'     => ucwords($title_of_the_page),
			'post_name'      => strtolower(str_replace(' ', '-', trim($title_of_the_page))),
			'post_status'    => 'pending',
			'post_content'   => $content,
			'post_type'      => 'basvuru',
			'post_parent'    =>  $parent_id
			)
		);
	return $page_id;
} 


