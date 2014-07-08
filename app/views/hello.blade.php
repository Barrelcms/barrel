<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #000;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}

		a {
			padding: 15px;
			border: 1px solid #000;
			display: inline-block;
			margin-top: 10px;
			border-radius: 10px;
			-webkit-border-radius: 10px;
			-moz-border-radius: 10px;
			-o-border-radius: 10px;
			color: #000;
		}

		a:hover {
			background-color: #f5f5f5;
		}
	</style>
</head>
<body>
	<div class="welcome">
		<h1>You have arrived.</h1>
		<a href="{{ route('install') }}">Lets Get Started</a>
	</div>
</body>
</html>
