<?php 
require 'functions1.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
		header("Location: login.php");
	} else {
		echo mysqli_error($conn);
	}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN REGISTRASI</title>
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
                <h1>Registrasi</h1>
                <hr>
                <p>SAINDATIKA | EEPIS</p>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" placeholder="Re-password">
                <button type="submit" name="register">Register</button>
                <p style="text-align: center;">Sudah punya akun?<span><a href="login.php" class=""> Masuk disini</a></span></p>
            </form>
        </div>
        <div class="right">
            <img src="registrasi.png" alt="">
        </div>
    </div>
</body>

</html>