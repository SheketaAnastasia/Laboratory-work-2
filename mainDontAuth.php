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

</head>

<body style="padding-top: 3rem;">
    <div class="butt">

<?php
    if(empty($_SESSION["login"])){
        echo " <a><input type='submit' value ='SingIn' id='loginLink'  class='bttn' ></a>"; 
        echo "<a href= 'registr.php'  ><input type='submit' value ='SingUp'  class='bttn'></a>"; 
    } else{
        echo " <a><input type='submit' value ='{$_SESSION['login']}' class='bttn' ></a>"; 
        echo "<a href= 'out.php'  ><input type='submit' value ='SingOut'  class='bttn'></a>"; 
    }
 ?>
            
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
            echo "<form method='post' action='user.php'>";
            echo "<input type='hidden' name='id' value='{$row['id']}'/>";
            echo "<tr>";
            echo "<td><button type='submit' class='bttn'>" . $row["id"]. "</button></td>";
            echo "<td>" . $row["first_name"]. "</td>";
            echo "<td>" . $row["last_name"]."</td>";
            echo "<td>" . $row["login"]."</td>";
            echo "<td>" . $row["id_role"]."</td>";
            echo "</tr>";
            echo "</form>";
            }
        }

     ?>


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