<?php session_start();
 require_once "db.php";

		$query = "SELECT * FROM `users` WHERE id = '{$_GET['id']}'";
		$res = mysqli_query ($conn,$query);
		$row = mysqli_fetch_array($res);


?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/style2.css">

</head>

<body style="padding-top: 3rem;">
  <div class="butt">
  	<a href="main.php"><input type='submit' value ='Back'   class='bttn' ></a>
  
 </div>

<p><img src="public/images/<?php echo$row['photo']?>" width= "250px" ></p>

<?php if (!empty($_SESSION["id"]) && $_SESSION["id"]==$_GET["id"] || $_SESSION["id_role"]==1): ?>
    	<form name="form1" action="addPhoto.php?id=<?php echo $_GET["id"]?>" enctype="multipart/form-data" method="post">
		<input type="file" name="path" class='bttn'/> </br>
		<input type='submit' value ='Add photo'   class='bttn' >
		</form>
    <?php endif;?>
 <div class="user">
 	<?php if (empty($_SESSION["id"]) || $_SESSION["id"]!=$_GET["id"] && $_SESSION["id_role"]!=1): ?>
	 	<p>First Name: <?php echo $row['first_name']?></p>
	 	<p>Last Name: <?php echo $row['last_name']?></p>
	 	<p>Login: <?php echo $row['login']?></p>
	 	<p>Role: <?php
 			$query1 = "SELECT * FROM `roles` WHERE id ='{$row['id_role']}'";
            $roleRes =  mysqli_query ($conn,$query1);
            $roles =  mysqli_fetch_array($roleRes);


	 	 echo $roles['title']?></p>


 	<?php endif;?>

	<?php if (!empty($_SESSION["id"]) && $_SESSION["id"]==$_GET["id"] || $_SESSION["id_role"]==1): ?>
	 	 <form action="addNewUser.php" method="post">
		First Name: <input type="text" name="first_name" value="<?php echo $row['first_name']?>"><br>
		Last Name: <input type="text" name="last_name" value="<?php echo $row['last_name']?>"><br>
    Login: <input type="text" name="login" value="<?php echo $row['login']?>"><br>
        Password: <input type="password" name="password" value="<?php echo $row['password']?>"><br>
       
        <?php if ($_SESSION["id_role"]!=1): ?>
        	<select size="1" name = "id_role">
         	<option selected value=" <?php echo $row['id_role'];?> "><?php 
					$query1 = "SELECT * FROM `roles` WHERE id ='{$row['id_role']}'";
					$roleRes =  mysqli_query ($conn,$query1);
					$roles =  mysqli_fetch_array($roleRes);
					echo $roles['title'];
				?>

				</option>
          </select><br>
   		<?php endif;?>


        <?php if ($_SESSION["id_role"]==1): ?>
		 <select size="1" name = "id_role">
          <option  disabled>Select Role</option>
				<?php 
					$query1 = "SELECT `id`,`title` FROM `roles`";
					$roleRes = $conn->query($query1);
					if ($roleRes->num_rows > 0) {
					    // output data of each rowі
					        while($roles = $roleRes->fetch_assoc()) {
						       	 echo "<option ";
									if($row['id_role'] == $roles['id']) echo "selected ";
									echo "value='";
									echo $roles['id'];
									echo "'>";
									echo $roles['title'];
						        echo "</option>";					          
					            }
					        }	
				?>

   		</select><br>
   		<?php endif;?>
       <a><input type='submit' value ='Edit' formaction="edit.php?id=<?php echo $_GET["id"]?>" formmethod="post"  class='bttn' ></a>
       <a><input type='submit' value ='Delete' formaction="delete.php?id=<?php echo $_GET["id"]?>" formmethod="post"  class='bttn' ></a>
   </form>
 	<?php endif;?>


 </div>

</body>
</html>

