<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
            echo  "<script>
            alert('Signup unsuccessful');
           </script>";
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="register-styles.css">
    </head>
    <body>
        <form method="post" action="register.php">
            <h1>Sign Up</h1>
            <div class="textBoxdiv">
                <input type="text" placeholder="Username" name="user_name" required>
            </div>
            <div class="textBoxdiv">
                <input type="password" placeholder="password" name="password" required>
            </div>
            <input type="submit" value="Sign Up" class="loginBtn" name="signup_Btn">
            <div class="signup">
                Already have an account?
                <br>
                <a href="login.php">Login</a>
            </div>
        </form>
    </body>
</html>

