<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Lenellgames Contact Form'; 
		$to = 'tmp33@paeusch.com'; 
		$subject = 'Message from Contact Form ';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! We will be in touch soon!</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <title>Lenell Games - We Build AWESOME Mobile Games</title>
    <meta name="description" content="Lenell Games builds small mobile games that are simple to play, but hard to master. Our games are super fun, addictive and impossible to put down.">
    <meta name="keywords" content="Free, Android, Games, Lenell, Mobile, iOS">
    <meta name="author" content="lenellgames.de">
      <meta charset="utf-8" />
      
      <link rel="icon" href="images/logo.png" type="image/png" />
      <link rel="apple-touch-icon" sizes="60x60" href="images/apple-touch-icon-60.png">
      <link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120.png">
      <link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76.png">
      <link rel="apple-touch-icon-precomposed" sizes="152x152" href="images/apple-touch-icon-152.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
      <link rel="stylesheet" href="assets/css/main.css" />
      <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ie9.css" />
      <![endif]-->
      <!--[if lte IE 8]>
      <link rel="stylesheet" href="assets/css/ie8.css" />
      <![endif]-->
   </head>
   <body>
      <!-- Page Wrapper -->
      <div id="page-wrapper">
         <!-- Header -->
         <header id="header" class="alt">
            <h1><a href="/">Lenell Games - we build AWESOME mobile games</a></h1>
            <nav>
               <a href="#menu">Menu</a>
            </nav>
         </header>
         <!-- Menu -->
         <nav id="menu">
            <div class="inner">
               <h2>Menu</h2>
               <ul class="links">
                  <li><a href="/">Home</a></li>
                  <li><a href="privacy.html">Privacy Policy</a></li>
                  <li><a href="imprint.html">Imprint</a></li>
                  <li><a href="#contact">Contact</a></li>
               </ul>
               <a href="#" class="close">Close</a>
            </div>
         </nav>
         <!-- Banner -->
         <section id="banner">
            <div class="inner">
               <div class="logo"><a href="#" class="image"><img src="images/logo.png" alt="lenellgames logo" /></a></div>
               <h2>Welcome</h2>
               <p>We are proud to present you our first Android game: <a href="#lonely-wampo" class="scrl">Lonely Wampo</a></p>
            </div>
         </section>
         <!-- Wrapper -->
         <section id="wrapper">
            <!-- One -->
            <section id="one" class="wrapper spotlight style1">
               <div class="inner" id="lonely-wampo">
                  <a href="#lonely-wampo" class="image scrl"><img src="images/scene.png" alt="It's an endless arcade game where you have to dodge the falling lava rocks to survive as long as possible." /></a>
                  <div class="content">
                     <h2 class="major">Lonely Wampo</h2>
                     <p>Ready for a new casual and addicting game? Lonely Wampo is perfect to beat your own highscore and improve your skills to reach a new record. Lonely Wampo fits for every age and every situation since each session lasts just a couple of minutes.</p>

               <p><a href="https://play.google.com/store/apps/details?id=de.lenellgames.lonelywampo"  style="border-bottom:none !important"><img src="images/google-play.png" alt="Download"/></a></p>
<p><a href="https://www.amazon.de/Lenell-Games-Lonely-Wampo/dp/B018CTDSWC"  style="border-bottom:none !important"><img src="images/amazon-app-store.png" alt="Download"/></a></p>

                  </div>
               </div>
            </section>
         </section>
         <!-- Footer -->
         <section id="footer">
            <div class="inner">
               <h2 id="contact" class="major">Get in touch</h2>
               <p>Send us a message in the contact form below.</p>
<form class="form-horizontal" role="form" method="post" action="#contact">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
				</form> 
            </div>
         </section>

<p><img src="//analytics.lenell.de/piwik.php?idsite=2" style="border:0;" alt="tracker" /></p>
      </div>
      <!-- Scripts -->
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.scrollex.min.js"></script>
      <script src="assets/js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="assets/js/main.js"></script>
   </body>
</html>
