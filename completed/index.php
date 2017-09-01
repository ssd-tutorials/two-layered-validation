<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Two layered form validation</title>
	<meta name="description" content="Two layered form validation" />
	<meta name="keywords" content="Two layered form validation" />
	<link href="/css/core.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<div id="wrapper">

	<div id="form-wrapper">
	
		<form action="" method="post">
		
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<th><label for="first_name">First name: *</label></th>
					<td class="first_name">
						<input type="text" name="first_name" id="first_name"
							title="Please provide your first name"
							class="field required" value="" />
					</td>
				</tr>
				<tr>
					<th><label for="email">Email: *</label></th>
					<td class="email">
						<input type="email" name="email" id="email"
							title="Please provide your valid email address"
							class="field required valid-email" value="" />
					</td>
				</tr>
				<tr>
					<th><label for="password">Password: *</label></th>
					<td class="password">
						<input type="password" name="password" id="password"
							title="Please choose your password (min 6 characters)"
							class="field required valid-password" value="" />
					</td>
				</tr>
				<tr>
					<th><label for="age">Age: *</label></th>
					<td class="age">
						<select name="age" id="age" class="field select required"
							title="Please select your age">
							<option value="">Select one</option>
							<option value="1">16 - 21</option>
							<option value="2">22 - 35</option>
							<option value="3">36 - 45</option>
							<option value="4">46 - 55</option>
							<option value="5">56 +</option>
						</select>
					</td>
				</tr>
				<tr>
					<th><label for="gender">Gender: *</label></th>
					<td class="gender">
						<div>
							<input type="radio" name="gender" id="gender_1"
								class="required" value="1"
								title="Please select one option" />
							<label for="gender_1">Male</label>
							<input type="radio" name="gender" id="gender_2"
							 value="2" />
							<label for="gender_2">Female</label>
						</div>
					</td>
				</tr>
				<tr>
					<th>&nbsp;</th>
					<td>
						<span class="terms"></span>
						<div>
							<input type="checkbox" name="terms" id="terms"
								class="required" value="1"
								title="Please indicate that you agree with our terms and conditions" />
							<label for="terms">I agree to the terms and conditions</label>
						</div>
					</td>
				</tr>
				<tr>
					<th>&nbsp;</th>
					<td>
						<input type="submit" class="submit" value="Submit" />
					</td>
				</tr>
			</table>
		
		</form>
	
	</div>

</div>



<script src="/js/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="/js/core.js" type="text/javascript"></script>
</body>
</html>


