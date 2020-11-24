<?php session_start();
 require_once "db.php";
?>

<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="assets/js/function.js"></script>
<style type="text/css">
  body{
    background: radial-gradient(circle, rgba(249,96,163,1) 0%, rgba(9,123,224,1) 100%);
  }
</style>

</head>
<body style="padding-top: 3rem;">
      <div class="butt">
        <a  href="main.php"><input type='submit' value ='Back'   class='bttn' ></a>
        <?php if ($_SESSION["id_role"]!=1): ?>
            <a ><input type="submit" value ="SingIn" id="loginLink"   class="bttn" ></a>
        <?php endif;?>

      </div>

<div class="container">
   <form action="addNewUser.php" method="post">
		First Name: <input type="text" name="first_name" placeholder= "только a-z, A-Z" pattern="^[A-Za-zА-Яа-яЁё]{1,20}$" required/><br>
		Last Name: <input type="text" name="last_name" placeholder= "только a-z, A-Z " pattern="^[A-Za-zА-Яа-яЁё]{1,20}$" required/><br>
    Login: <input type="text" name="login" placeholder= "не менее 6 символов от 0до9, a-z, A-Z " pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,20}$" required/><br>
        Password: <input type="password" name="password" placeholder= "не менее 6 символов"  pattern="(?=^.{6,}$).*$" required/><br>
		 <select size="1" name = "id_role">
          <option selected disabled>Select Role</option>
          <?php 
          $query1 = "SELECT `id`,`title` FROM `roles`";
          $roleRes = $conn->query($query1);
          if ($roleRes->num_rows > 0) {
              // output data of each rowі
                  while($roles = $roleRes->fetch_assoc()) {
                  echo "<option ";
                  echo "value='";
                  echo $roles['id'];
                  echo "'>";
                  echo $roles['title'];
                    echo "</option>";                   
                      }
                  } 
        ?>
      </select><br>
       <input type="submit" class="bttn">
   </form>
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
