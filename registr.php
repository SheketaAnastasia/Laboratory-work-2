<?php session_start();?>

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


</head>
<body style="padding-top: 3rem;">
<a style="position:absolute; top:50px; right:200px; " ><input type="submit" value ="SingIn" id="loginLink"   class="bttn" ></a>
<div class="container">
   <form action="addNewUser.php" method="post">
		First Name: <input type="text" name="first_name"><br>
		Last Name: <input type="text" name="last_name"><br>
    Login: <input type="text" name="login"><br>
        Password: <input type="password" name="password"><br>
		 <select size="1">
          <option selected disabled>Select Role</option>
          <option>User</option>
          <option>Admin</option>
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
