<?php
include('connection.php');
if(isset($_POST['register'])){
$user_name = mysqli_real_escape_string($conn ,$_POST['name']);

$user_email = mysqli_real_escape_string($conn ,$_POST['email']);

$user_password = mysqli_real_escape_string($conn ,$_POST['password']);

$pass = password_hash($user_password,PASSWORD_BCRYPT);

$email_check = "SELECT * from info where email = '{$user_email}'";

$email_verify = mysqli_query($conn, $email_check);

if(mysqli_num_rows($email_verify)> 0){
?>
<script> alert('email already exist')</script>;
<?php
}
else{
   $query = "INSERT INTO `info` (`name`, `email`, `password`) VALUES ('$user_name', '$user_email', '$pass')";
   $res = mysqli_query($conn ,$query);

}
header("location:http://localhost/assingment/welcome.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Assignment PHP & SQL</title>
   <link rel="stylesheet" href="style.css">
   <script src="index.js" defer></script>
</head>
<body>
<div class="form-structor">
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="signup">
		<h2 class="form-title" id="signup"><span></span>Sign up</h2>
		<div class="form-holder">
			<input type="text" name="name" class="input" placeholder="Name" />
			<input type="email" name="email" class="input" placeholder="Email" />
			<input type="password" name="password" class="input" placeholder="Password" />
		</div>
		<button class="submit-btn" name="register">Sign up</button>
	</div>
   </form>
</div>
</body>
</html>