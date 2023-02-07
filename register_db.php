<?php
session_start();
include('Connection.php');
include('Config.php');



$error = array();

if (isset($_POST['reg_admin'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $surename = mysqli_real_escape_string($connection, $_POST['surename']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password2 = mysqli_real_escape_string($connection, $_POST['password2']);

    if (empty($name) || empty($surename) || empty($username) || empty($password) || empty($password2)) {
        array_push($error, "Pleas input all require information.");
    }
    if ($password != $password2) {
        array_push($error, "Password not match");
    }

    $user_check_query = "SELECT * FROM m_admin WHERE Admin_User = '$username'";
    $query = mysqli_query($connection, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        if ($result['Admin_User'] === $username) {
            array_push($error, "Username already exists");
        }
    }

    if (count($error) == 0) {
        // $password = password_hash($_POST['password'],  PASSWORD_BCRYPT, $options);
        // $password = password_hash( $_POST['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO m_admin (Admin_Name, Admin_Surname, Admin_User, Admin_Pwd) VALUE('$name', '$surename', '$username', '$password');";
        mysqli_query($connection, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['hpassword'] = $password;
        header('location: index.php');
        
    }
    else {
        echo "Error";
    }
}

?>
<a href="./index.php?logout='1'"><button type="submit">Logout</button></a>