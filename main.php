<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round|Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="assets/js/function.js"></script>
<style type="text/css">
   body{
background: linear-gradient(90deg, rgba(252,252,255,0.9335084375547094) 0%, rgba(255,255,56,1) 58%);
   }
</style>

</head>

<body style="padding-top: 3rem;">
    <div class="butt">


<?php if (empty($_SESSION["login"])): ?>
    <a><input type='submit' value ='SingIn' id='loginLink'  class='bttn' ></a>
    <a href= 'registr.php'  ><input type='submit' value ='SingUp'  class='bttn'></a>
<?php endif;?>

<?php if (!empty($_SESSION["login"])): ?>
    <a href="user.php?id=<?php echo $_SESSION["id"]?>"><input type='submit' value ="<?php echo$_SESSION['login']?>" class="bttn" ></a>
    <a href= 'out.php'  ><input type='submit' value ='SingOut'  class='bttn'></a>
<?php endif;?>     
 </div>

  

 <div class="tableData">
   <table>
     <caption><b>Table users</b></caption>
     <tr><th>#</th><th>First Name</th><th>Last Name</th><th>Login</th><th>Role</th></tr>
     <?php 
        require_once "db.php";

        $sql = "SELECT  `id`, `first_name`, `last_name`, `login`, `id_role` FROM `users`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
    // output data of each rowі
        while($row = $result->fetch_assoc()) {
            $query1 = "SELECT * FROM `roles` WHERE id ='{$row['id_role']}'";
            $roleRes =  mysqli_query ($conn,$query1);
            $roles =  mysqli_fetch_array($roleRes);
            echo "<tr>";
            echo "<td><a href='user.php?id=" . $row["id"]. "'>" . $row["id"]. "</a></td>";
            echo "<td>" . $row["first_name"]. "</td>";
            echo "<td>" . $row["last_name"]."</td>";
            echo "<td>" . $row["login"]."</td>";
            echo "<td>" .$roles['title']."</td>";

            echo "</tr>";
          
            }

        }
     ?>
     <?php if ($_SESSION["id_role"]==1): ?>
     <tr style="border: 1px solid white;">
    <td style="border: 0px solid #fff;"></td>
      <td style="border: 0px solid #fff;"></td>
       <td style="border: 0px solid #fff;"></td>
        <td style="border: 0px solid #fff;"></td>
        <td  style="border: 0px solid #fff;">  <a href="registr.php"><input type='submit' value ='Add User' class='bttn' ></a></td>
     </tr>
     <?php endif;?>
   </table>
 </div>
 
<div class="test"></div>
<div class="overlay" style="display: none;">
    <div class="login-wrapper">
        <div class="login-content" id="loginTarget">
            <a class="close">x</a>
            <h3>Sign in</h3>
            <form method="post" action="auth.php">
                <label for="login">
                    Login:
                    <input type="text" name="login" id="login" placeholder="Login" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,20}$" required />
                </label>
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="не менее 6 символов" pattern="(?=^.{6,}$).*$" required />
                </label>
                <button type="submit">Sign in</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>