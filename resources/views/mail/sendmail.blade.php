<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Registration Success</title>
</head>
<body>
	<div style="background-color:#f2f2f2; padding:20px;">
		<h1 style="color:#003366; font-size:36px; font-family:Arial, sans-serif;">Great!</h1>
		<p style="color:#333; font-size:18px; font-family:Arial, sans-serif;">Your Registration Is Successfully!</p>
		<p style="color:#333; font-size:18px; font-family:Arial, sans-serif;">This your account:</p>
		<ul style="color:#333; font-size:18px; font-family:Arial, sans-serif;">
			<li>Nama: {{ $details['name'] }}</li>
			<li>Phone: {{ $details['phone'] }}</li>
			<li>Street Name: {{ $details['street_name'] }}</li>
			<li>Join Event: [EVENT RAMADAN]</li>			
		</ul>
		<p style="color:#333; font-size:18px; font-family:Arial, sans-serif;">Thanks you for join this event</p>
		<p style="color:#333; font-size:18px; font-family:Arial, sans-serif;">Best,</p>
		<p style="color:#333; font-size:18px; font-family:Arial, sans-serif;">QIROM</p>
	</div>
</body>
</html>
