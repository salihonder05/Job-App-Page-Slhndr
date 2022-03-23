<?php

// EN APPLICATION FORM
function jobappslhndr_frontend_shortcode_en() 
{ 
	if (isset($_COOKIE['jobappslhndr_time'])) {
		$response = '<h2 style="border-left:4px solid green;padding-left:6px;">Your job application has been registered,'. $_COOKIE['jobappslhndr_name'] .' </h2>';
		return $response;
	}
	else {

	$url = home_url();
	return '

		<style type="text/css">
		.jobappslhndr_form {
			width: 100%;
			min-height: 500px;
			height: auto;
		}

		.jobappslhndr_form input {
			padding: 8px 10px;
			outline: none;
		}

		</style>

		<form method="post" action="'.$url.'/wp-json/jobapps/v1/save-cv" enctype="multipart/form-data"
			class="jobappslhndr_form">
			<br>
			<h4>Personal Informations</h4>
			<hr>


			<input name="name" type="text" placeholder="Full Name" class="jas_input">
			<input name="email" type="email" placeholder="Email Address" class="jas_input">
			<input name="phone" type="phone" placeholder="Phone Number" class="jas_input"> <br>
			<label for="photo">Photo:</label>
			<input name="photo" type="file" id="photo" accept="image/png, image/jpeg">
			<br><br><br>
			<h4>Questions</h4>
			<hr>


			<input name="nationality" type="text" placeholder="What is your nationality?" class="jas_input">
			<input name="address" type="text" placeholder="Where do you live?" class="jas_input">
			<input name="tr_working_auth" type="text" placeholder="Are you authorized to work in Turkey?" class="jas_input">
			<input name="remote_work" type="text" placeholder="Are you open to working remotely?" class="jas_input">
			
			
			<select name="which_location" required="true" type="text" placeholder="Which location do you prefer to be based in?"
				class="jas_input">
				<option selected disabled value="Which location do you prefer to be based in?">Which location do you prefer to be based in?</option>
				<option value="London Based">London Based</option>
				<option value="İstanbul Based">İstanbul Based</option>
			</select>
			
			

			<select name="experience_period" required="true" type="text" placeholder="How many years of experience do you have?"
				class="jas_input">
				<option selected disabled value="How many years of experience do you have?">How many years of experience do you
					have?</option>
				<option value="0-3 Years">0-3 Years</option>
				<option value="3-7 Years">3-7 Years</option>
				<option value="7+ Years">7+Years</option>
			</select>
			<textarea name="working_option_remotely" id="working_option_remotely" cols="30" rows="10" class="jas_textarea"
				placeholder="Do you have relevant working experience? List your experience."></textarea>
				
			<textarea name="english_level" id="english_level" cols="30" rows="10" class="jas_textarea"
				placeholder="How proficient are you in English? Where did you learn English?"></textarea>


			<h6>How proficient are you in the following programs? (Assuming that you know MS Office and Outlook competently)
			</h6>

			<select name="sketchup" id="sketchup">
				<option selected disabled>Sketch Up</option>
				<option value="Expert">Expert</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Beginner">Beginner</option>
				<option value="No experience">No experience</option>
			</select>

			<select name="autocad" id="autocad">
				<option selected disabled>AutoCAD</option>
				<option value="Expert">Expert</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Beginner">Beginner</option>
				<option value="No experience">No experience</option>
			</select>

			<select name="lumion" id="lumion">
				<option selected disabled>Lumion</option>
				<option value="Expert">Expert</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Beginner">Beginner</option>
				<option value="No experience">No experience</option>
			</select>

			<select name="adobe" id="adobe">
				<option selected disabled>Adobe Creative Suits</option>
				<option value="Expert">Expert</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Beginner">Beginner</option>
				<option value="No experience">No experience</option>
			</select>

			<select name="rhino" id="rhino">
				<option selected disabled>Rhino</option>
				<option value="Expert">Expert</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Beginner">Beginner</option>
				<option value="No experience">No experience</option>
			</select>

			<select name="revit" id="revit">
				<option selected disabled>Revit</option>
				<option value="Expert">Expert</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Beginner">Beginner</option>
				<option value="No experience">No experience</option>
			</select>
			<br>


			<textarea name="why_want_work_eea" id="why_want_work_eea" cols="30" rows="10" class="jas_textarea"
				placeholder="Why do you want to work with EAA?"></textarea>
			
			<h4>Attachments</h4>
			<hr>


			<input name="linkedin" type="text" placeholder="LinkedIn" class="jas_input"><br>
			<label for="cvfile">CV:</label>
			<input name="cvfile" type="file" id="cvfile" placeholder="CV File"><br>
			<label for="motivational_letter">Motivational Letter:</label>
			<input name="motivational_letter" type="file" id="motivational_letter" placeholder="Motivational Letter"><br>
			<label for="work_portfolio">Work Portfolio:</label>
			<input name="work_portfolio" type="file" id="work_portfolio" placeholder="Work Portfolio">



			<textarea name="links" id="links" cols="30" rows="10" class="jas_textarea" placeholder="Links
		LinkedIN URL
		Portolio URL
		Other Website"></textarea>


			<br>
			<button type="submit">Send Your CV</button>

		</form>
	';
	}

}

add_shortcode('get_jobapps_form_en', 'jobappslhndr_frontend_shortcode_en');








// TR APPLICATION FORM
function jobappslhndr_frontend_shortcode_tr() 
{ 
	if (isset($_COOKIE['jobappslhndr_time'])) {
		$response = ' <h2 style="border-left:4px solid green;padding-left:6px;">İş başvurunuz kaydedildi,'. $_COOKIE['jobappslhndr_name'] .' </h2> ';
		return $response;
	}
	else {
		$url = home_url();
		return '

			<style type="text/css">
			.jobappslhndr_form {
				width: 100%;
				min-height: 500px;
				height: auto;
			}

			.jobappslhndr_form input {
				padding: 8px 10px;
				outline: none;
			}

			</style>

			<form method="post" action="'.$url.'/wp-json/jobapps/v1/save-cv" enctype="multipart/form-data"
				class="jobappslhndr_form">
				<br>
				<h4>Kişisel Bilgiler</h4>
				<hr>


				<input name="name" type="text" placeholder="İsim Soyisim" class="jas_input">
				<input name="email" type="email" placeholder="Email" class="jas_input">
				<input name="phone" type="phone" placeholder="Telefon" class="jas_input"> <br>
				<label for="photo">Fotoğraf:</label>
				<input name="photo" type="file" id="photo" accept="image/png, image/jpeg">
				<br><br><br>
				<h4>Sorular</h4>
				<hr>


				<input name="nationality" type="text" placeholder="Uyruğunuz Nedir?" class="jas_input">
				<input name="address" type="text" placeholder="Nerede Yaşıyorsunuz?" class="jas_input">
				<input name="tr_working_auth" type="text" placeholder="Türkiye\'de çalışma izniniz var mı?" class="jas_input">
				<input name="remote_work" type="text" placeholder="Uzaktan çalışma söz konusu olursa, İstanbul\'da ve remote çalışmayı mı tercih edersiniz?" class="jas_input">

				<select name="experience_period" required="true" type="text" placeholder="Deneyim Süreniz?"
					class="jas_input">
					<option selected disabled value="Kaç yıllık tecrüben var?">Kaç yıllık tecrüben var??</option>
					<option value="0-3 Years">0-3 Yıl</option>
					<option value="3-7 Years">3-7 Yıl</option>
					<option value="7+ Years">7\'den Fazla</option>
				</select>
				<textarea name="english_level" id="english_level" cols="30" rows="10" class="jas_textarea"
					placeholder="İngilizce seviyesi ve nerede öğrenildiği"></textarea>


				<h6>Aşağıdaki programlarda yetkinlik seviyesi (MS Office ve Outlook profesyonel seviyede kullanıldığı varsayılarak)
				</h6>

				<select name="sketchup" id="sketchup">
					<option selected disabled>Sketch Up</option>
					<option value="Uzman">Uzman</option>
					<option value="Orta Düzey">Orta Düzey</option>
					<option value="Başlangıç Düzeyi">Başlangıç Düzeyi</option>
					<option value="No experience">No experience</option>
				</select>

				<select name="autocad" id="autocad">
					<option selected disabled>AutoCAD</option>
					<option value="Uzman">Uzman</option>
					<option value="Orta Düzey">Orta Düzey</option>
					<option value="Başlangıç Düzeyi">Başlangıç Düzeyi</option>
					<option value="Tecrübem Yok">Tecrübem Yok</option>
				</select>

				<select name="lumion" id="lumion">
					<option selected disabled>Lumion</option>
					<option value="Uzman">Uzman</option>
					<option value="Orta Düzey">Orta Düzey</option>
					<option value="Başlangıç Düzeyi">Başlangıç Düzeyi</option>
					<option value="Tecrübem Yok">Tecrübem Yok</option>
				</select>

				<select name="adobe" id="adobe">
					<option selected disabled>Adobe Creative Suits</option>
					<option value="Uzman">Uzman</option>
					<option value="Orta Düzey">Orta Düzey</option>
					<option value="Başlangıç Düzeyi">Başlangıç Düzeyi</option>
					<option value="Tecrübem Yok">Tecrübem Yok</option>
				</select>

				<select name="rhino" id="rhino">
					<option selected disabled>Rhino</option>
					<option value="Uzman">Uzman</option>
					<option value="Orta Düzey">Orta Düzey</option>
					<option value="Başlangıç Düzeyi">Başlangıç Düzeyi</option>
					<option value="Tecrübem Yok">Tecrübem Yok</option>
				</select>

				<select name="revit" id="revit">
					<option selected disabled>Revit</option>
					<option value="Uzman">Uzman</option>
					<option value="Orta Düzey">Orta Düzey</option>
					<option value="Başlangıç Düzeyi">Başlangıç Düzeyi</option>
					<option value="Tecrübem Yok">Tecrübem Yok</option>
				</select>
				<br>


				<textarea name="why_want_work_eea" id="why_want_work_eea" cols="30" rows="10" class="jas_textarea"
					placeholder="Neden bizlerle /EAA\'da çalışmak istiyorsun?"></textarea>
				<textarea name="working_option_remotely" id="working_option_remotely" cols="30" rows="10" class="jas_textarea"
					placeholder="Uzaktan çalışma söz konusu olursa, İstanbul\'da ve remote çalışmayı mı tercih edersiniz"></textarea>
				<h4>Attachments</h4>
				<hr>


				<input name="linkedin" type="text" placeholder="LinkedIn" class="jas_input"><br>
				<label for="cvfile">CV:</label>
				<input name="cvfile" type="file" id="cvfile" placeholder="CV"><br>
				<label for="motivational_letter">Motivasyon Mektubu:</label>
				<input name="motivational_letter" type="file" id="motivational_letter" placeholder="Motivasyon Mektubu"><br>
				<label for="work_portfolio">Portfolyo:</label>
				<input name="work_portfolio" type="file" id="work_portfolio" placeholder="Portfolyo">



				<textarea name="links" id="links" cols="30" rows="10" class="jas_textarea" placeholder="Linkleriniz
			LinkedIN URL
			Portolio URL
			Other Website"></textarea>


				<br>
				<button type="submit">CV\'yi Gönder</button>

			</form>
		';

	}
}
add_shortcode('get_jobapps_form_tr', 'jobappslhndr_frontend_shortcode_tr');
