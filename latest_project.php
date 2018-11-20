<?php
error_reporting();
include ('connection1.php');
if(isset($_REQUEST['slider']))
{	
	$title=($_REQUEST['slider_title']);
//$path = "../images" . $_FILES["slider_img"]["name"];//
	if ($_FILES["slider_img"]["error"] > 0)
		  {
		  echo "Error: " . $_FILES["slider_img"]["error"] . "<br>";
		  }
		else
		  {
		  
		  $file_name = $_FILES['slider_img']['name'];
		   $type=$_FILES['slider_img']['type'] . "<br>";
		   $size=($_FILES['slider_img']['size'] / 1024) . " kB<br>";
		   $temploc=$_FILES['slider_img']['tmp_name'];
		   $path="****/slider/".$file_name;
		  echo "Type: " .$name;
		  echo "Upload: " .$type;
		  echo "Size: " .$size;
		  move_uploaded_file($temploc,"$path");
			echo "Stored in: ".$path;
		  }
		  /*$query1="UPDATE  table SET  path =  '$path',title='$title',description='$desc' WHERE  sid ='$img'";*/

$insert=mysql_query("INSERT INTO table (title,photo) VALUES ('$title','$file_name')") or die (mysql_error());
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">

<head profile="http://gmpg.org/xfn/11">

<title>slider</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<meta http-equiv="imagetoolbar" content="no" />

<link rel="stylesheet" href="../styles/layout.css" type="text/css" />

</head>

<body id="top">

<?php

 include("header.php");

?>

<!-- ####################################################################################################### -->

<div class="wrapper row4">

  <div id="container" class="clear" style="margin-left: 15px; width: 801px;">

    <!-- ####################################################################################################### -->


   <table>
					<form method="POST" enctype="multipart/form-data" action="latest_project.php">
						<tr><h2>Insert Slider images</h2></tr>
						<tr>
							<td>
								Name
							</td>
							<td>
								<textarea id="title" name="town_name" ></textarea>
							</td>
						</tr>
                        <tr>
							<td>
								Project _Detail
							</td>
							<td>
								<textarea id="title" name="town_name" rows="10" cols="10" ></textarea>
							</td>
						</tr>
						
						<tr>
							<td> upload logo:</td>
							<td>
							<input type="file" name="logo" id="logo" value="choose photo" />
							</td>
						</tr>
                        <tr>
							<td> upload main photo:</td>
							<td>
							<input type="file" name="main_photo" id="main_photo" value="main_photo" />
							</td>
						</tr>
                        <tr>
							<td> upload photo 1:</td>
							<td>
							<input type="file" name="photo1" id="photo1" value="choose photo 1" />
							</td>
						</tr>
                         <tr>
							<td> upload photo 2:</td>
							<td>
							<input type="file" name="photo2" id="photo2" value="choose photo 1" />
							</td>
						</tr>
                         <tr>
							<td> upload photo 3:</td>
							<td>
							<input type="file" name="photo3" id="photo3" value="choose photo 1" />
							</td>
						</tr>
									<tr>
							<td>
                            <input style="margin-top: 10px; margin-left: 308px;" type="submit" name="save"  value="Save"/>
							</td>
							<td>
							
							</td>
							
						</tr>
							</td>
							
						</tr>
					
				</table>
   </form>
   <table  style="width: 900px;">
						<tr><th width="170">Title</th>
							<th width="170">photo</th>
							
							<th width="170">Edit</th>
						</tr>

<?php 		

	$query = mysql_query ("SELECT * FROM table ORDER BY id DESC ");

		$qcount=mysql_num_rows($query);

		if($qcount>0){

			while($row=mysql_fetch_array($query))   
			{   
			    $id			 = $row["id"];
			    $title		= $row["title"];
				$photo = $row["photo"];
				$slider_images = '
                                            <tr>
					<td width="200px">'.$title.'</td>
					
					<td width="200px">'.$photo.'</td>				
					<td width="200px"><a class="btn" href="slider.php?id='.$id.'"></a><a class="btn2" href="slider.php?delete&id='.$id.'">Delete</a></td>
					
					</tr>
					
				';
				echo "$slider_images";
			}        
		}	else{
				$slider_images = "You have no Latest slider data listed in your database at this time";
				}

				
					if(isset($_GET['error'])){
		echo '<div  style="color:#FF0000;">Error Occured During Inserting Data into Database...</div>';
		}
		if(isset($_GET['success'])){
		echo '<div  style="color:#00CC33;">slider Data has been Submited Successfully...</div>';
		}
		if(isset($_GET['delete'])){
			$id = $_GET['id'];
							$query3=mysql_query("delete from table where id=$id") or die(mysql_error());
							if($query3)
							{
								?>
                            <script type="text/javascript">
	alert("Your Post Successfully deleted.");
	</script>		

                              <?	
								}
						echo '<div  style="color:#FF0000;"></div>
						 <meta http-equiv="Refresh" content="5; url=http://www.*****.com/admin/slider.php">';
						}
								?>

				
				</table>
</div>

     

  </div>
   

    <!-- ####################################################################################################### -->

    <div class="clear"></div>

  </div>

</div>

<!-- ####################################################################################################### -->

<?php 
	include("footer.php");
?>

</body>

</html>