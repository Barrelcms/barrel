<!doctype html>
<html lang="en" ng-app="installApp">
<head>
	<meta charset="UTF-8">
	<title>Barrel Content Management</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="//use.edgefonts.net/source-sans-pro:n2,i2,n3,i3,n4,i4,n6,i6,n7,i7,n9,i9:all.js"></script>

	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.19/angular.min.js"></script>
    <script src="{{ asset('install/install.angular.js') }}"></script>

	<link rel="stylesheet" href="{{ asset('install/install.css') }}">
	<style>
		.status {
			width: 100%;
			display: block;
			float: left;
		}
	</style>
</head>
<body>
	<div class="welcome" ng-controller="InstallController">
		<h1>You have arrived.</h1>
		<form name="adminForm" ng-submit="beginInstall(adminForm.$valid)" ng-hide="installing" novalidate>
			<div class="form-control" id="tooltip-email">
				<i class="fa fa-fw fa-lg fa-user form-icon"></i>
				{{
					Form::email(
						'email',
						null,
						[
							'placeholder' => 'example@example.com',
							'ng-model' => 'user.email',
							'ng-required' => true,
							'required'
						]
					)
				}}
				<div ng-show="adminForm.email.$invalid && !adminForm.email.$pristine" class="tooltip error">
					Please enter a valid email.
				</div>
			</div>
			<div class="form-control" id="tooltip-password">
				<i class="fa fa-fw fa-lock form-icon"></i>
				{{
					Form::password(
					'password',
						[
							'placeholder' => 'password',
							'ng-model' => 'user.password',
							'ng-required' => true,
							'ng-minlength' => 6,
							'required'
						]
					)
				}}
				<div ng-show="adminForm.password.$invalid && !adminForm.password.$pristine" class="tooltip error">
					Must contain 6+ characters.
				</div>
			</div>
			<button ng-disabled="adminForm.$invalid" type="submit" class="submit">Roll the Barrel</button>
			<p class="info">Create an admin user.</p>
		</form>
		<div class="status" ng-show="installing">
			<p>@{{ installStatus }}</p>
		</div>
		<a ng-show="installed" href="{{ route('installer.complete') }}">Complete installation.</a>
	</div>
</body>
</html>
