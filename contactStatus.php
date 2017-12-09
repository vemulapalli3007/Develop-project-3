<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="ISO-8859-1">
<title>Professional and Technical Background</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/contact.css" type="text/css">
<script src="js/jquery.min.js"></script>
<script src="js/contact.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="body">
	<header class="mainHeader">
		<img src="images/logo.jpg">
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="profile.html">Profile</a></li>
				<li><a href="resume.html">Resume</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</nav>
	</header>
    <div class="form_container">
        <?php
               $Message=$_GET["Message"];
        ?>
        <h2><center><?php echo $Message;?></center></h2>
    </div>
</body>
