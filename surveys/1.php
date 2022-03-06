<?php
// Output messages
$response = '';
// Check if the form was submitted
if (isset($_POST['rating'], $_POST['hear_about_us'], $_POST['contact_pref'], $_POST['email'], $_POST['comments'], $_POST['recommend'])) {
	// Process form data 
	// Assign POST variables
	$rating = $_POST['rating'];
	$hear_about_us = $_POST['hear_about_us'];
	$contact_pref = implode(', ', $_POST['contact_pref']);
	$email = $_POST['email'];
	$comments = $_POST['comments'];
	$recommend = $_POST['recommend'];
	// Where to send the mail? It should be your email address
	$to      = 'surveys@yourwebsite.com';
	// Mail from
	$from    = 'noreply@yourwebsite.com';
	// Mail subject
	$subject = 'A user has submitted a survey';
	// Mail headers
	$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'Return-Path: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
	// Capture the email template file as a string
	ob_start();
	include 'email-template.php';
	$email_template = ob_get_clean();
	// Try to send the mail
	if (mail($to, $subject, $email_template, $headers)) {
		// Success
		$response = '<h3>Thank You!</h3><p>With your help, we can improve our services for all our trusted members.</p>';		
	} else {
		// Fail
		$response = '<h3>Error!</h3><p>Message could not be sent! Please check your mail server settings!</a>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Survey Form</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="/assets/css/surveys.css">
	</head>
	<body>
		<form class="survey-form" method="post" action="">		
		<h1><i class="far fa-list-alt"></i>Survey Form</h1>
        <div class="steps">
	        <div class="step current"></div>
	        <div class="step"></div>
	        <div class="step"></div>
	        <div class="step"></div>
        </div>
        <div class="step-content current" data-step="1">
	<div class="fields">
		<p>How would you rate your experience with us?</p>
		<div class="rating">
			<input type="radio" name="rating" id="radio1" value="Very Unsatisfied">
			<label for="radio1">1</label>
			<input type="radio" name="rating" id="radio2" value="Unsatisfied">
			<label for="radio2">2</label>
			<input type="radio" name="rating" id="radio3" value="Neutral">
			<label for="radio3">3</label>
			<input type="radio" name="rating" id="radio4" value="Satisfied">
			<label for="radio4">4</label>
			<input type="radio" name="rating" id="radio5" value="Very Satisfied">
			<label for="radio5">5</label>
		</div>
		<div class="rating-footer">
			<span>Very Unsatisfied</span>
			<span>Very Satisfied</span>
		</div>
		<p>Where did you hear about us?</p>
		<div class="group">
			<label for="radio6">
				<input type="radio" name="hear_about_us" id="radio6" value="Search Engine">
				Search Engine
			</label>
			<label for="radio7">
				<input type="radio" name="hear_about_us" id="radio7" value="Newsletter">
				Newsletter
			</label>
			<label for="radio8">
				<input type="radio" name="hear_about_us" id="radio8" value="Advertisements">
				Advertisements
			</label>		
			<label for="radio9">
				<input type="radio" name="hear_about_us" id="radio9" value="Social Media">
				Social Media
			</label>		
		</div>		
        			
	</div>
	<div class="buttons">
		<a href="#" class="btn" data-set-step="2">Next</a>
	</div>
</div>
<!-- page 2 -->
<div class="step-content" data-step="2">
	<div class="fields">
		<p>How likely are you to recommend us?</p>
		<div class="rating">
			<input type="radio" name="recommend" id="radio10" value="Very Unlikely">
			<label for="radio10">1</label>
			<input type="radio" name="recommend" id="radio11" value="Unlikely">
			<label for="radio11">2</label>
			<input type="radio" name="recommend" id="radio12" value="Neutral">
			<label for="radio12">3</label>
			<input type="radio" name="recommend" id="radio13" value="Likely">
			<label for="radio13">4</label>
			<input type="radio" name="recommend" id="radio14" value="Very Likely">
			<label for="radio14">5</label>
		</div>
		<div class="rating-footer">
			<span>Very Unlikely</span>
			<span>Very Likely</span>
		</div>
		<p>How would you like us to respond to you?</p>
		<div class="group">
			<label for="check1">
				<input type="checkbox" name="contact_pref[]" id="check1" value="Email">
				Email
			</label>
			<label for="check2">
				<input type="checkbox" name="contact_pref[]" id="check2" value="Phone">
				Phone
			</label>
			<label for="check3">
				<input type="checkbox" name="contact_pref[]" id="check3" value="Post">
				Post
			</label>		
		</div>
	</div>
	<div class="buttons">
		<a href="#" class="btn alt" data-set-step="1">Prev</a>
		<a href="#" class="btn" data-set-step="3">Next</a>
	</div>
</div>

<!-- page 3 -->
<div class="step-content" data-step="3">
	<div class="fields">
		<label for="email">Your Email</label>
		<div class="field">
			<i class="fas fa-envelope"></i>
			<input id="email" type="email" name="email" placeholder="Your Email" required>
		</div>
		<label for="comments">Additional Comments</label>
		<div class="field">
			<textarea id="comments" name="comments" placeholder="Enter your comments ..."></textarea>
		</div>
	</div>
	<div class="buttons">
		<a href="#" class="btn alt" data-set-step="2">Prev</a>
		<input type="submit" class="btn" name="submit" value="Submit">
	</div>
</div>

<!-- page 4 -->
<div class="step-content" data-step="4">
	<div class="result"><?=$response?></div>
</div>
		</form>
    
        <script>
const setStep = step => {
	document.querySelectorAll(".step-content").forEach(element => element.style.display = "none");
	document.querySelector("[data-step='" + step + "']").style.display = "block";
	document.querySelectorAll(".steps .step").forEach((element, index) => {
		index < step-1 ? element.classList.add("complete") : element.classList.remove("complete");
		index == step-1 ? element.classList.add("current") : element.classList.remove("current");
	});
};
document.querySelectorAll("[data-set-step]").forEach(element => {
	element.onclick = event => {
		event.preventDefault();
		setStep(parseInt(element.dataset.setStep));
	};
});
<?php if (!empty($_POST)): ?>
setStep(4);
<?php endif; ?>
</script>
        
    </body>
</html>

