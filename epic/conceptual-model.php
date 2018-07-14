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
				<li>personalityDescription</li>
				<li>personalityType</li>
				<li>personalityName</li>
			<h3>Profile</h3>
				<li>profileId (PK)</li>
				<li>profileName</li>
				<li>profileEmail</li>
			<h3>ProfilePersonality</h3>
				<li>profilePersonalityPersonalityId (FK)</li>
				<li>profilePersonalityProfileId (FK)</li>
			<h3>Relationships</h3>
			<li>One profile can share multiple personalities: 1-to-n</li>
			<li>Multiple profiles can share multiple personalities: m-to-n</li>
			</ul>
		<img src="image/erd.svg" alt="">
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