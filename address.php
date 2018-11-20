<?php

error_reporting();

include ('connection1.php');

if(isset($_POST['add']))

{	

	$adrs=($_POST['address']);
	$ofcadrs=($_POST['address']);

//$path = "../images" . $_FILES["slider_img"]["name"];//
		  /*$query1="UPDATE  table SET  path =  '$path',title='$title',description='$desc' WHERE  sid ='$img'";*/



$insert=mysql_query("INSERT INTO table (id,address,ofcadrs) VALUES ('','$adrs','$ofcadrs')") or die (mysql_error());

if($insert)

	{

		?>

		<script type="text/javascript">

	alert("Your data is inserted Successfully.");

	</script>

	<?php

	echo '<div  style="color:#FF0000;"></div>

						<meta http-equiv="Refresh" content="3; url=http://www.*****.com/admin/address.php">';

	}

	else

	{

		?>

		<script type="text/javascript">

	alert("Your data cannot be inserted try again.");

	</script>

		<?

		echo '<div  style="color:#FF0000;"></div>

						<meta http-equiv="Refresh" content="5; url=http://www.******.com/admin/address.php">';

        }



}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">



<head profile="http://gmpg.org/xfn/11">



<title>Address</title>



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

					<form method="POST" enctype="multipart/form-data" action="address.php">

						<tr><h2>Insert Office Adress</h2></tr>

						<tr>

							<td>

								Office Name

							</td>

							<td>

								<textarea id="address" name="ofcaddress" ></textarea>

							</td>

						</tr>
                        <tr>

							<td>

								Address

							</td>

							<td>

								<textarea id="address" name="address" ></textarea>

							</td>

						</tr>


						

									<tr>

							<td>

                            <input style="margin-top: 10px; margin-left: 308px;" type="submit" name="add"  value="Save"/>

							</td>

							<td>

							

							</td>

							

						</tr>

							</td>

							

						</tr>

					

				</table>

   </form>

   <table  style="width: 900px;">

						<tr><th width="170">Offie Name</th>
                        
                        <tr><th width="170">Adress</th>


							

							<th width="170">Edit</th>

						</tr>



<?php 		



	$query = mysql_query ("SELECT * FROM table ORDER BY id DESC ");



		$qcount=mysql_num_rows($query);



		if($qcount>0){



			while($row=mysql_fetch_array($query))   

			{   

			    $id			 = $row["id"];

			    $address		= $row["address"];
				$ofaddress		= $row["ofcaddress"];

				$address_list = '

                                            <tr>

				
						<td width="200px">'.$ofaddress.'</td>
							<td width="200px">'.$address.'</td>

								

					<td width="200px"><a class="btn" href="adress.php?id='.$id.'"></a><a class="btn2" href="address.php?delete&id='.$id.'">Delete</a></td>

					

					</tr>

					

				';

				echo "$address_list";

			}        

		}	else{

				$slider_images = "You have no Latest address data listed in your database at this time";

				}



				

					if(isset($_GET['error'])){

		echo '<div  style="color:#FF0000;">Error Occured During Inserting Data into Database...</div>';

		}

		if(isset($_GET['success'])){

		echo '<div  style="color:#00CC33;">Address Data has been Submited Successfully...</div>';

		}

		if(isset($_GET['delete'])){

			$id = $_GET['id'];

							$query3=mysql_query("delete from ***** where id=$id") or die(mysql_error());

							if($query3)

							{

								?>

                            <script type="text/javascript">

	alert("Your Post Successfully deleted.");

	</script>		



                              <?	

								}

						echo '<div  style="color:#FF0000;"></div>

						 <meta http-equiv="Refresh" content="5; url=http://www.*****.com/admin/address.php">';

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