<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Barrel Content Management</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="//use.edgefonts.net/source-sans-pro:n2,i2,n3,i3,n4,i4,n6,i6,n7,i7,n9,i9:all.js"></script>
	<style>

		body {
			margin:0;
			font-family: source-sans-pro, sans-serif;
			text-align:center;
			color: #000;
			font-size: 14px;
			font-weight: 200;
		}

		.welcome {
			width: 650px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -325px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			font-weight: 200;
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

		input[type="text"], input[type="password"] {
			font-family: inherit;
			padding: 10px;
			width: 190px;
			padding-left: 50px;
			background-color: #eee;
			border: none;
			outline: none;
			border-radius: 2px;
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			-o-border-radius: 2px;
			color: #000;
			font-size: 14px;
		}

		::-webkit-input-placeholder { font-family: inherit; font-weight: 200; }
		::-moz-placeholder { font-family: inherit; font-weight: 200; }
		:-ms-input-placeholder { font-family: inherit; font-weight: 200; }
		input:-moz-placeholder { font-family: inherit; font-weight: 200; }

		input[type="submit"] {
			padding: 10px;
			font-family: inherit;
			background-color: #5ba4e5;
			border: none;
			color: #fff;
			text-transform: uppercase;
			padding-left: 20px;
			padding-right: 20px;
			border-radius: 2px;
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			-o-border-radius: 2px;
			font-size: 14px;
			font-weight: 200;
		}

		input[type="submit"]:hover {
			background-color: #3498db;
		}

		i.fa {
			color: #ccc;
			padding: 15px;
			position: absolute;
			font-size: 16px;
		}

		p.info {
			float: left;
			margin-top: 0;
		}

		@media screen and (max-width: 720px) {
			.welcome {
				max-width: 100%;
				top: 50%;
				left: 0;
				margin-left: 0;
			}

			i.fa {
				display: none;
			}

			p.info {
				display: none;
			}

			input[type="text"], input[type="password"] {
				padding-left: 10px;
				width: 240px;
			}
		}
	</style>
</head>
<body>
	<div class="welcome">
		<h1>You have arrived.</h1>
		{{ Form::open(['route' => 'install', 'method' => 'post']) }}
			<i class="fa fa-fw fa-lg fa-user"></i>
			{{ Form::text('email', null, ['placeholder' => 'example@example.com']) }}
			<i class="fa fa-fw fa-lock"></i>
			{{ Form::password('password', ['placeholder' => 'password']) }}
			{{ Form::submit('Roll the Barrel') }}
		{{ Form::close() }}
		<p class="info">Create an admin user.</p>
	</div>
</body>
</html>
