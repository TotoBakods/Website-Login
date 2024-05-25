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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
            echo  "<script>
            alert('Log-in unsuccessful');
           </script>";
		}else
		{
            echo  "<script>
            alert('Log-in unsuccessful');
           </script>";
		}
	}

?>

<!DOCTYPE html>
<html>
    <head>
<title>Login</title>
<link rel="stylesheet" href="login-styles.css">
    </head>
    <body>
        <form method="post">
            <h1>Login</h1>
        <div class="textBoxdiv">
            <input id="text" type="text" placeholder="username" name="user_name" required>
        </div>
        <div class="textBoxdiv">
            <input id="text" type="password" placeholder="password" name="password"required>
        </div>
        <input id="button" type="submit" value="Login" class="loginBtn" name="login_Btn">
        <div class="signup">
            Don't have an account ?
            </br>
            <a href="register.php">Sign up</a>
        </div>
    </form>
</body>
</html>
