<?php
 session_start();

 // cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$no = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM tampilan WHERE id = $no");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}


}

 if( isset($_SESSION["login"]) ) {
     header("Location: dashboard.php");
     exit;
 }
require 'functions1.php';

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM tampilan WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

            // cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

            header("Location: dashboard.php");
			exit;
		}
	}

	$error = true;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN LOGIN</title>
    <style>
		* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url('background.png')
}

.container {
    width: 100%;
    display: flex;
    max-width: 850px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.login {
    width: 400px;
}

form {
    width: 250px;
    margin: 60px auto;
}

h1 {
    margin: 20px;
    text-align: center;
    font-weight: bolder;
    text-transform: uppercase;
}

hr {
    border-top: 2px solid #ffa12c;
}

p {
    text-align: center;
    margin: 10px;
}

.right img {
    width: 450px;
    height: 100%;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
}

form label {
    display: block;
    font-size: 16px;
    font-weight: 600;
    padding: 5px;
}

input {
    width: 100%;
    margin: 2px;
    border: none;
    outline: none;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid gray;
}

button {
    border: none;
    outline: none;
    padding: 8px;
    width: 252px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
    border-radius: 5px;
    background: #ffa12c;
}

button:hover {
    background: rgba(214, 86, 64, 1);
}


@media (max-width: 880px) {
    .container {
        width: 100%;
        max-width: 750px;
        margin-left: 20px;
        margin-right: 20px;
    }

    form {
        width: 300px;
        margin: 20px auto;
    }

    .login {
        width: 400px;
        padding: 20px;
    }

    button {
        width: 100%;
    }

    .right img {
        width: 100%;
        height: 100%;
    }
}

	</style>
</head>

<body>
    <div class="container">
        <div class="login">
            <?php if( isset($error) ) : ?>
                <p style="color: red; font-style: italic;">username / password salah</p>
            <?php endif; ?>
            <form method= "post" action="">
                <h1>Login</h1>
                <hr>
                <p>SAINDATIKA | EEPIS</p>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
                <label for="remember">Remember me</label>
                <input type="checkbox" name="remember" id="remember">
                <button type="submit" name="login">Login</button>
                <p>
                    <a href="#">Forgot Password?</a>
                </p>
                <p style="text-align: center;">Belum punya akun?<span><a href="registrasi2.php" class=""> Daftar disini</a></span></p>
            </form>
        </div>
        <div class="right">
            <img src="login.png" alt="">
        </div>
    </div>
</body>

</html>