<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Conceptual Model</title>
		<link href="style.css" rel="stylesheet">
	</head>
	<body>
		<h1>Conceptual Model</h1>
		<ul>
			<h3>Personality</h3>
				<li>personalityId (PK)</li>
				<li>personalityType</li>
				<li>personalityName</li>
			<h3>Profile</h3>
				<li>profileId (PK)</li>
				<li>profileName</li>
				<li>profileEmail</li>
			<h3>ProfilePersonality</h3>
				<li>profilePersonalityPersonalityId</li>
				<li>profilePersonalityProfileId</li>
			</ul>
		<a href="./index.php" alt="link to index.php">Back</a>
	</body>
</html>
<!--
ul>li*3
		<ul>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		-->