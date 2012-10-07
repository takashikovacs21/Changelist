<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div id="banner"><a href="https://github.com/aspirationalvigilante/Changelist">Fork me on GitHub</a></div>
		<h1>Project Bamboo Changelist Creator</h1>
		<form action="parse.php" method="post" id="form">
			<textarea rows="100" name="changelist">
			</textarea>
		</form>
		<a class="submit-button" href="#">Submit</a>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>
		jQuery(".submit-button").click(function(){
			$("form").submit();
		});
	</script>
</html>