<?php
include('connection1.php');
include('login.php');
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login  - CodePen</title>

  <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="wrap">
		<div class="avatar">
      <img src="http://cdn.ialireza.me/avatar.png">
		</div>
		<input type="text" name="uname" placeholder="username" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="password" placeholder="password" required>
		<a href="" class="forgot_link">forgot ?</a>
		<input type="submit" name="enter" id="enter">
	</div>

  <script src="js/index.js"></script>

</body>

</html>