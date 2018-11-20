<?php
include('connection1.php');
	$email=$_POST['email'];
	$query=mysql_query("select * from table where pass='$email'") or die (mysql_error());
	if($query)
	{
		$res=mysql_fetch_array($query);
		$pass=$res['pass'];
		echo $pass;
		?>
        <?php
	echo '<div  style="color:#FF0000;"></div>
						<meta http-equiv="Refresh" content="3; url=http://www.*****.com/loginindex.php">';
	}
	else
	{
		?>
		<script type="text/javascript">
	alert("Your email id is not correct try again.");
	</script>
		<?
		echo '<div  style="color:#FF0000;"></div>
						<meta http-equiv="Refresh" content="3; url=http://www.******.com/signup.php">';
        }

        

	
?>
<!DOCTYPE html>
<html>
<head>
<title>Forget password</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color:#5F8EC2;">
<div id="main">
<div id="login">
<h2>Login Form</h2>
<form action="" method="post" style="height: 199px;margin-top: 37px;">
<label>Your password is :</label><br>
<p><?php echo $pass; ?></p><br>
<input name="submit" type="submit" value=" Get password ">

</form>
<a href="signup.php" style="margin-left: 101px;color:#FFF;">Sign Up</a><br><br>
<a href="index.php" style="color:#FFF;">Go Back to Main Page</a>

</div>
</div>
</body>
</html>