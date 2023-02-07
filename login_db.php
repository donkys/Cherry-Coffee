<?php
session_start();
include "./Connection.php";
include "./Config.php";


$error = array();
if (isset($_POST['login_admin'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);


    if (empty($username)) {
        array_push($error, "Required username");
    }

    if (empty($password)) {
        array_push($error, "Required username");
    }

    if (count($error) == 0) {
        $query = "SELECT M_EmpID, M_EmpUser, M_EmpName FROM m_employee WHERE M_EmpUser = '$username' AND M_EmpPwd = '$password'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['M_EmpID'] = $row['M_EmpID'];
            $_SESSION['M_EmpName'] = $row['M_EmpName'];
            echo "<br>$username";

            header("location: index.php");
        } else {
            array_push($error, "Wrong username or password.");
            $_SESSION['error'] = "Wrong username or password.";
            echo "fail";
            header("location: login.php");
        }
    }
}
