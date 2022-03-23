<?php

add_action('admin_menu', 'add_jobapps_basvuru_submenu_page');

function add_jobapps_basvuru_submenu_page(){
	add_submenu_page(
					'edit.php?post_type=basvuru', //$parent_slug
					'İş Başvuruları Yönetim Paneli',  //$page_title
					'Yönetim Paneli',        //$menu_title
					'manage_options',           //$capability
					'yonetim_paneli',//$menu_slug
					'jobapps_basvuru_subpage_callback'//$function
	);
}

function jobapps_basvuru_subpage_callback() 
// Submenu Page Callback
	{
			echo' <div style="padding-right:20px;"> <h2> İş Başvuruları Yönetim Paneli </h2> <p>İş başvurularını bu ekrandan PDF e dönüştürerek indirebilirsiniz. Silmek için "Tüm İş Başvuruları" ekranını kullanın.</p>';

			if(isset($_GET['status']) == "pdf_generated" ) {
				$response_pdf_generated = '<div class="notice notice-success is-dismissible" style="margin:0;margin-top:10px;margin-bottom:10px;"><p>PDF Dosyası Oluşturuldu!</p></div>';
				echo $response_pdf_generated;
			} ?>

			<table class="wp-list-table widefat fixed striped table-view-list posts">
				<thead>
					<tr>
						<th>İsim</th>
						<th>Eposta</th>
						<th>Telefon</th>
						<th>Resim</th>
						<th>Motivasyon Yazısı</th>
						<th>Portfolyo</th>
						<th>PDF Oluştur</th>
						<th>Oluşturulmuş PDF</th>
					</tr>
				</thead>
				<tbody>
					<?php $loop = new WP_Query( array( 'post_type' => 'basvuru' ) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<tr>
						<td><?php echo get_post_meta( get_the_ID(), 'name', true ); ?></td>
						<td><?php echo get_post_meta( get_the_ID(), 'email', true ); ?></td>
						<td><?php echo get_post_meta( get_the_ID(), 'phone', true ); ?></td>
						
						<td>
							<?php if( strlen(get_post_meta( get_the_ID(), 'photo', true )) > 0 ) { ?>
								<img src="<?php echo get_post_meta( get_the_ID(), 'photo', true ); ?>" height="64" width="64" />
							<?php } else { ?>
								<img height="64" width="64" src="<?php echo plugin_dir_url(__FILE__ ) . '/image/no-profile.svg'; ?>" alt="">
							<?php } ?>
						</td>

						<td>
							<?php if( strlen(get_post_meta( get_the_ID(), 'motivational_letter', true )) > 0 ) { 
									echo  '<a class="button button-secondary button-large" href="'. get_post_meta( get_the_ID(), 'motivational_letter', true ) . '">İndir</a>';
								}else {
									echo 'Dosya Yok';
								}; ?>
						</td>

						<td>
							<?php if( strlen(get_post_meta( get_the_ID(), 'work_portfolio', true )) > 0 ) { 
									echo  '<a class="button button-secondary button-large" href="'. get_post_meta( get_the_ID(), 'work_portfolio', true ) . '">İndir</a>';
								}else {
									echo 'Dosya Yok';
								}; ?>

						</td>


						<?php if( strlen(get_post_meta( get_the_ID(), 'cv_pdf', true )) > 0 ) { ?>
							<td><a class="button button-primary button-large" href="<?php get_admin_url();?>edit.php?post_type=basvuru&page=yonetim_paneli&post=<?php echo get_the_ID(); ?>">Tekrar Oluştur</a> </td>
							<td><a class="button button-secondary button-large" href="<?php echo get_home_url() .'/wp-content/plugins/job-app-page-slhndr/pdf_outputs/'. get_post_meta( get_the_ID(), 'cv_pdf', true ); ?>">İndir</a></td>
						<?php } else { ?>
							<td><a class="button button-primary button-large" href="<?php get_admin_url();?>edit.php?post_type=basvuru&page=yonetim_paneli&post=<?php echo get_the_ID(); ?>">PDF Oluştur</a> </td>
							<td>Dosya Yok</td>
						<?php } ?>
					</tr>

					<?php endwhile; ?>

				</tbody>
				<tfoot>
					<tr>
						<th>İsim</th>
						<th>Eposta</th>
						<th>Telefon</th>
						<th>Resim</th>
						<th>Motivasyon Yazısı</th>
						<th>Portfolyo</th>
						<th>PDF Oluştur</th>
						<th>Oluşturulmuş PDF</th>
					</tr>
				</tfoot>
			</table>

		</div>






		<?php 

		// IF GET POST 
			if(isset($_GET['post'])) {

				$post_single =  get_post($_GET['post']);
				$post_single_meta_name = get_post_meta( $post_single->ID, 'name', true );
				$post_single_meta_email = get_post_meta( $post_single->ID, 'email', true );
				$post_single_meta_phone = get_post_meta( $post_single->ID, 'phone', true );
				$post_single_meta_photo = get_post_meta( $post_single->ID, 'photo_filename', true );
				$post_single_meta_nationality = get_post_meta( $post_single->ID, 'nationality', true );
				$post_single_meta_address = get_post_meta( $post_single->ID, 'address', true );
				$post_single_meta_tr_working_auth = get_post_meta( $post_single->ID, 'tr_working_auth', true );
				$post_single_meta_remote_work = get_post_meta( $post_single->ID, 'remote_work', true );
				$post_single_meta_which_location = get_post_meta( $post_single->ID, 'which_location', true );
				$post_single_meta_experience_period = get_post_meta( $post_single->ID, 'experience_period', true );
				$post_single_meta_english_level = get_post_meta( $post_single->ID, 'english_level', true );
				$post_single_meta_sketchup = get_post_meta( $post_single->ID, 'sketchup', true );
				$post_single_meta_autocad = get_post_meta( $post_single->ID, 'autocad', true );
				$post_single_meta_lumion= get_post_meta( $post_single->ID, 'lumion', true );
				$post_single_meta_adobe = get_post_meta( $post_single->ID, 'adobe', true );
				$post_single_meta_rhino = get_post_meta( $post_single->ID, 'rhino', true );
				$post_single_meta_revit = get_post_meta( $post_single->ID, 'revit', true );
				$post_single_meta_why_want_work_eea = get_post_meta( $post_single->ID, 'why_want_work_eea', true );
				$post_single_meta_working_option_remotely = get_post_meta( $post_single->ID, 'working_option_remotely', true );
				$post_single_meta_linkedin = get_post_meta( $post_single->ID, 'linkedin', true );
				$post_single_meta_links = get_post_meta( $post_single->ID, 'links', true );


				$html_output =  
					// Define Pdf Content Html Output
						'
						<style>
						table {
							border-spacing: 10px;

						}
						table > tr > td {
							margin-bottom: 10px;
							padding-bottom: 15px;
							
						}
						
						</style>
						<br><br><br><br><br><br><br><br><br>
						<table style="width:100%;float:left;">

							<tr>
								<td>What is your name?</td>
								<td>'. $post_single_meta_name . '</td>
							</tr>

							<tr>
								<td>What is your email address?</td>
								<td>'. $post_single_meta_email . '</td>
							</tr>

							<tr>
								<td>What is your phone number?</td>
								<td>'. $post_single_meta_phone . '</td>
							</tr>

							<tr>
								<td>What is your address?</td>
								<td>'. $post_single_meta_address . '</td>
							</tr>

							<tr>
								<td>What is your nationality?</td>
								<td>'. $post_single_meta_nationality . '</td>
							</tr>
						
							<tr>
								<td>Are you authorized to work in Turkey?</td>
								<td>'. $post_single_meta_tr_working_auth . '</td>
							</tr>
						
							<tr>
								<td>Are you open to working remotely?</td>
								<td>'. $post_single_meta_remote_work . '</td>
							</tr>
							
							<tr>
								<td>Which location do you prefer to be based in?</td>
								<td>'. $post_single_meta_which_location . '</td>
							</tr>
							
							
						
							<tr>
								<td>How many years of experience do you have?</td>
								<td>'. $post_single_meta_experience_period . '</td>
							</tr>
						
							<tr>
								<td>How proficient are you in English? Where did you learn English?</td>
								<td>'. $post_single_meta_english_level . '</td>
							</tr>
						
							<tr>
								<td>How proficient are you in the following programs? (Assuming that you know MS Office and Outlook competently)</td>
								<td>
								SketchUp :'. $post_single_meta_sketchup . ' <br>
								AutoCAD :'. $post_single_meta_autocad . ' <br>
								Lumion :'. $post_single_meta_lumion . ' <br>
								Adobe :'. $post_single_meta_adobe . ' <br>
								Rhino :'. $post_single_meta_rhino . ' <br>
								Revit :'. $post_single_meta_revit . ' 
								</td>

							</tr>
						
								<tr>
									<td>Why do you want to work with EAA?</td>
									<td>'. $post_single_meta_why_want_work_eea . '</td>
								</tr>
							
								<tr>
									<td>Do you have relevant working experience? List your experience.</td>
									<td>'. $post_single_meta_working_option_remotely . '</td>
								</tr>
						
								<tr>
									<td>LinkedIN Profile</td>
									<td>'. $post_single_meta_linkedin . '</td>
								</tr>
							
								<tr>
									<td>Links</td>
									<td>'. $post_single_meta_links . '</td>
								</tr>
							</table>';
					// Define Pdf Content Html Output


				require plugin_dir_path( JOBAPPSLHNDR_FILE ) . 'inc/tcpdf/tcpdf.php';

				// create new PDF document
				$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
				$pdf->SetCreator('Salih ÖNDER');
				$pdf->SetAuthor('Salih ÖNDER');
				$pdf->SetTitle($post_single->name);
				$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
				$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
				$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
				$pdf->SetMargins(20, 20, 20);
				$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
				$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
				$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
				$pdf->AddPage();
				$pdf->Image('../wp-content/uploads'. $post_single_meta_photo, '', '', 40, 40, '', '', 'T', false, 400, '', false, false, 1, false, false, false);
				$html = $html_output;
				$pdf->writeHTML($html, true, false, true, false, '');
				$pdf->lastPage();
				$output_name = sanitize_title($post_single->post_title . $post_single->post_date) .'.pdf';
				update_post_meta( $post_single->ID, 'cv_pdf', $output_name );
				$pdf->Output(plugin_dir_path( JOBAPPSLHNDR_FILE ) .'pdf_outputs/'. $output_name , 'F');
				ob_end_clean();
				$redirect_url = admin_url('edit.php?post_type=basvuru&page=yonetim_paneli&status=pdf_generated');
				wp_redirect($redirect_url);
				exit();
				
			}
		// IF GET POST 

	} 
// Submenu Page Callback
