<?php
include('Connection.php');
include('Config.php');
// include('error.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div class="header">
        <h3>Register</h3>
    </div>

    <form action="register_db.php" method="post">
        <input type="text" name="name" placeholder="Name" maxlength="50" required><br>
        <input type="text" name="surename" placeholder="Surename" maxlength="50" required><br>
        <input type="text" name="username" placeholder="username" maxlength="50" required><br>
        <input type="password" name="password" placeholder="password" maxlength="50" required><br>
        <input type="password" name="password2" placeholder="password again" maxlength="50" required><br>
        <input type="submit" name="reg_admin" value="สมัคร">
    </form>


</body>

</html>