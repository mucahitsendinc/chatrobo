<?php $a=1; ?>
<!DOCTYPE html>
<html>
<head>
	<title>ChatRobo</title>
	<link rel="shortcut icon" href="assets/image/robot.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/chatrobo.css">
	<link rel="stylesheet" href="assets/vendor/fontawesome/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="assets/vendor/animate/animate.min.css">
</head>
<body>
	<div id="chatrobo" class="animate__animated">
		<img src="assets/image/robot.png" alt="Chat Robo">
	</div>
	<div id="chatrobo-opened" class="animate__animated">
		<div class="chatrobo">
			<div class="chatrobo-title" id="chatrobo-title">
				<h1 id="title-text">ChatRobo</h1>
				<div class="chatrobo-closeBtn" id="chatroboClosebtn">X</div>
				
			</div>
			
				
					
			<div class="chatrobo-messages" id="chatrobo-messages">
			</div>
			
			<div class="chatrobo-messageform ">
				<div id="chatrobo-goback" class="animate__animated">
					Son Mesajlar  <i class="fas fa-arrow-down"></i>
				</div>
				<form action="" id="chatroboForm" method="post">
					<textarea name="message" id="message" rows="2" placeholder="Merhaba ile başla..."></textarea>
					<button type="submit" value="1"><i class="fas fa-paper-plane"></i></button>
				</form>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/chatrobo.js"></script>
</body>
</html>