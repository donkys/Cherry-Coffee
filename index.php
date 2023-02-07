<?php
session_start();
include "./Connection.php";
include "./Config.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Login FIRST!!";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION["username"]);
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@200;400;500;600;700&family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,300&family=Kanit:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300;1,400&family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,800;1,400;1,500;1,600;1,800&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <!-- CSS File -->
    <link rel="stylesheet" href="./styles.css">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/38de8073b8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/38de8073b8.css" crossorigin="anonymous">

    <title>Home</title>
</head>

<body style="font-family: 'Sarabun'; font-weight: 500; padding:150px;">
    <br>
    <br>
    <center>
        <?php if (isset($_SESSION["username"]) && isset($_SESSION['M_EmpID'])) {
            echo "<h1>สวัสดีคุณ : " . $_SESSION["M_EmpName"] . "<br> Employee ID = " . $_SESSION['M_EmpID'] . "</h1><br>";
        ?>
             <a href="./buycherry.php"><button class="btn btn-success" type="submit">ซื้อเชอรี่</button></a> 
             <a href="./empdata.php"><button class="btn btn-warning" type="submit">แก้ไขข้อมูล</button></a> 
             <a href="./index.php?logout='1'"><button class="btn btn-danger" type="submit">Logout</button></a> 
        <?php
        }
        ?>
    </center>
</body>

</html>