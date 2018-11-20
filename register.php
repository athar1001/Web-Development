<?php
include ("connection.php");
	if(isset($_POST["submit"]))
		{
			$fname=($_POST['fname']);
			$lname=($_POST['lname']);
			$email=($_POST['email']);
			$pass=($_POST['pass']);
			$repass=($_POST['repass']);
			if($fanme==''||$lname==''||$email==''||$pass==''||$repass=='')
			{
				echo"Enter all Values";
			}
			else
			if($pass==$repass)
			{
				$query = mysql_query("INSERT INTO table (abc, def, ghi,jkl)
				VALUES ('$fname','$lname','$email','$pass')") or die (mysql_error());
				echo"Insertion Sucessfull";			
			}
			else
			echo"Unknown error";
			
		}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>