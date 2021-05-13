<!DOCTYPE html>
<html>
<head>
	<title>ChatRobo</title>
	
	<link rel="stylesheet" href="assets/css/chatrobo.css">
	<link rel="stylesheet" href="assets/vendor/fontawesome/css/fontawesome-all.min.css">
</head>
<body>
	<div id="chatrobo">
		<img src="assets/image/robot.png" alt="Chat Robo">
	</div>
	<div id="chatrobo-opened">
		<div class="chatrobo">
			<div class="chatrobo-title">
				<h1>ChatRobo</h1>
				<div class="chatrobo-closeBtn">X</div>
			</div>
			<div class="chatrobo-messages">
				
				<ul>
					<li class="chatrobo-baloon send">
						<div class="sender-title">
							<a href="https://github.com/mucahitsendinc/chatrobo">ChatRobo</a>
						</div>
						<p>asdasd</p>
					</li>
					<li class="chatrobo-baloon sender">b</li>
				</ul>
			</div>
			<div class="chatrobo-messageform">
				<form action="">
					<textarea name="message" id="message" rows="2" placeholder="Mesaj..."></textarea>
					<button type="submit" value="1"><i class="fas fa-paper-plane"></i></button>
				</form>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/chatrobo.js"></script>
</body>
</html>