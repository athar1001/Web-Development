<?php
error_reporting();
include ('connection1.php');
if(isset($_REQUEST['save']))
{	
	$img_title=($_REQUEST['img_title']);
	$vid_title=($_REQUEST['vid_title']);
//$path = "../images" . $_FILES["slider_img"]["name"];//
	if ($_FILES["gallery_img"]["error"] > 0)
		  {
		  echo "Error: " . $_FILES["gallery_img"]["error"] . "<br>";
		  }
		else
		  {
		  
		  $img_file_name = $_FILES['gallery_img']['name'];
		   $type=$_FILES['gallery_img']['type'] . "<br>";
		   $size=($_FILES['gallery_img']['size'] / 1024) . " kB<br>";
		   $temploc=$_FILES['gallery_img']['tmp_name'];
		   $path="****/images".$file_name;
		  echo "Type: " .$name;
		  echo "Upload: " .$type;
		  echo "Size: " .$size;
		  move_uploaded_file($temploc,"$path");
			echo "Stored in: ".$path;
		  }
		  
		  if ($_FILES["gallery_vid"]["error"] > 0)
		  {
		  echo "Error: " . $_FILES["gallery_vid"]["error"] . "<br>";
		  }
		else
		  {
		  
		  $vid_file_name = $_FILES['gallery_vid']['name'];
		   $type=$_FILES['gallery_vid']['type'] . "<br>";
		   $size=($_FILES['gallery_vid']['size'] / 1024) . " kB<br>";
		   $temploc=$_FILES['gallery_vid']['tmp_name'];
		   $path="*****/video".$file_name;
		  echo "Type: " .$name;
		  echo "Upload: " .$type;
		  echo "Size: " .$size;
		  move_uploaded_file($temploc,"$path");
			echo "Stored in: ".$path;
		  }
		  /*$query1="UPDATE  table SET  path =  '$path',title='$title',description='$desc' WHERE  sid ='$img'";*/

$insert=mysql_query("INSERT INTO table (imgtitle,photo,vidtitle,vid) VALUES ('$img_title','$img_file_name','$vid_title', '$vid_file_name')") or die (mysql_error());
}
?>
<!DOCTYPE html >

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">

<head profile="http://gmpg.org/xfn/11">

<title>Gallery</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<meta http-equiv="imagetoolbar" content="no" />

<link rel="stylesheet" href="*****/styles/layout.css" type="text/css" />

</head>

<body id="top">

<?php

 include("*****/header.php");

?>

<!-- ####################################################################################################### -->

<div class="wrapper row4">

    <!-- ####################################################################################################### -->

   
<div id="container" class="clear" style="margin-left: 15px; width: 801px;">

    <!-- ####################################################################################################### -->


   <table>
					<form method="POST" enctype="multipart/form-data" action="agallery.php">
						<tr><h2>Insert Slider images</h2></tr>
						<tr>
							<td>
								Title
							</td>
							<td>
								<textarea id="title" name="img_title" ></textarea>
							</td>
						</tr>
						
						<tr>
							<td> upload photo:</td>
							<td>
							<input type="file" name="gallery_img" id="gallery_img" value="choose photo" />
							</td>
						</tr>
									<tr>
							<td>
							</td>
							<td>
							
							</td>
							
						</tr>
						
							<td colspan="2">
								<input class="button" style="margin-top: 10px; margin-left: 308px;" type="submit" name="slider"  value="Submit"/>
							</td>
							
						</tr>
					
				</table>
   </form>
    <table  style="width: 900px;">
						<tr>
                        <th width="170">Title</th>
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
			    $imgtitle		= $row["imgtitle"];
				$photo = $row["photo"];
				$latest_images = '
                                            <tr>
					<td width="200px">'.$imgtitle.'</td>
					
					<td width="200px">'.$photo.'</td>				
					<td width="200px"><a class="btn" href="slider.php?id='.$id.'"></a><a class="btn2" href="agallery.php?delete&id='.$id.'">Delete</a></td>
					
					</tr>
					
				';
				echo "$latest_images";
			}        
		}	else{
				$latest_images = "You have no Latest images data listed in your database at this time";
				}

				
					if(isset($_GET['error'])){
		echo '<div  style="color:#FF0000;">Error Occured During Inserting Data into Database...</div>';
		}
		if(isset($_GET['success'])){
		echo '<div  style="color:#00CC33;">gallery images Data has been Submited Successfully...</div>';
		}
		if(isset($_GET['delete'])){
			$id = $_GET['id'];
							$query3=mysql_query("delete from gallery where id=$id") or die(mysql_error());
							if($query3)
							{
								?>
                            <script type="text/javascript">
	alert("Your Post Successfully deleted.");
	</script>		

                              <?	
								}
						echo '<div  style="color:#FF0000;"></div>
						 <meta http-equiv="Refresh" content="5; url=http://www.*****.com/admin/agallery.php">';
						}
								?>



				
				</table>
   <form method="POST" enctype="multipart/form-data" action="****/agallery.php">
						<tr><h2>Upload Video</h2></tr>
						<tr>
							<td>
								Title
							</td>
							<td>
								<textarea id="video_title" name="video_title" ></textarea>
							</td>
						</tr>
						
						<tr>
							<td> upload video:</td>
							<td>
							<input type="file" name="gallery_vid" id="gallery_vid" value="choose photo" />
							</td>
						</tr>
									<tr>
							<td>
							</td>
							<td>
							
							</td>
							
						</tr>
						
							<td colspan="2">
								<input class="button" style="margin-top: 10px; margin-left: 308px;" type="submit" name="save"  value="Save"/>
							</td>
							
						</tr>
					
				</table>
   </form>  
				</table>
 <table  style="width: 900px;">
						<tr>
                        <th width="170">Title</th>
							<th width="170">photo</th>
							
							<th width="170">Edit</th>
						</tr>
                        <?php 		

	$query1 = mysql_query ("SELECT * FROM table ORDER BY id DESC ");

		$qcount1=mysql_num_rows($query1);

		if($qcount1>0){

			while($row1=mysql_fetch_array($query1))   
			{   
			    $id			 = $row1["id"];
			    $vidtitle		= $row1["vidtitle"];
				$vid = $row1["vid"];
				$latest_videos = '
                                            <tr>
					<td width="200px">'.$vidtitle.'</td>
					
					<td width="200px">'.$vid.'</td>				
					<td width="200px"><a class="btn" href="agallery.php?id='.$id.'"></a><a class="btn2" href="agallery.php?delete&id='.$id.'">Delete</a></td>
					
					</tr>
					
				';
				echo "$latest_videos";
			}        
		}	else{
				$latest_videos = "You have no Latest videos data listed in your database at this time";
				}

				
					if(isset($_GET['error'])){
		echo '<div  style="color:#FF0000;">Error Occured During Inserting Data into Database...</div>';
		}
		if(isset($_GET['success'])){
		echo '<div  style="color:#00CC33;">slider Data has been Submited Successfully...</div>';
		}
		if(isset($_GET['delete'])){
			$id = $_GET['td'];
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
						 <meta http-equiv="Refresh" content="5; url=http://www.*****.com/admin/agallery.php">';
						}
								?>



				
				</table>

     

  </div>
   

    <!-- ####################################################################################################### -->

    <div class="clear"></div>

  </div>

</div>

<!-- ####################################################################################################### -->

<?php 
	include("****/footer.php");
?>

</body>

</html>