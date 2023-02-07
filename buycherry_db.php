<?php
session_start();
include "./Connection.php";
include "./Config.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Login FIRST!!";
    header('location: login.php');
}

$T_Class = $_POST['T_Class'];
$M_EmpID = $_POST['Member_ID'];
$Member_ID = $_POST['Member_ID'];
$T_Weight = $_POST['T_Weight'];
$T_Grade = $_POST['T_Grade'];
$T_PWeight = $_POST['T_PWeight'];
$T_GWeight = $_POST['T_GWeight'];
$T_GoodMoney = $_POST['T_GoodMoney'];
$T_PoorMoney = $_POST['T_PoorMoney'];
$T_CommonFee = $_POST['T_CommonFee'];
$T_MemberSaving = $_POST['T_MemberSaving'];
$Grade_Price = $_POST['Grade_Price'];
$T_Net = $_POST['T_Net'];
$time = date("H:i");
$date = date("Y-m-d");

// $sql = "INSERT INTO t_buy('T_DATE', 'T_TIME', 'M_EmpID', 'Member_ID', 'T_Class', 'T_Weight', 'T_Grade', 'T_GWeight', 'T_PWeight', 'T_GoodMoney', 'T_PoorMoney', 'T_CommonFee', 'T_MemberSaving', 'T_Net', 'Grade_Price') VALUES ('$date','$time', $M_EmpID, $Member_ID, '$T_Class', $T_Weight, '$T_Grade', $T_GWeight, $T_PWeight, $T_GoodMoney, $T_PoorMoney, $T_CommonFee, $T_MemberSaving, $T_Net, $Grade_Price )";
// $link = $connection -> query($sql);

$sql = "INSERT INTO t_buy (T_DATE, T_TIME, M_EmpID, Member_ID, T_Class, T_Weight, T_Grade, T_GWeight, T_PWeight, T_GoodMoney, T_PoorMoney, T_CommonFee, T_MemberSaving, T_Net, Grade_Price) 
VALUES ('$date','$time', '$M_EmpID', '$Member_ID', '$T_Class', '$T_Weight', '$T_Grade', '$T_GWeight', '$T_PWeight', '$T_GoodMoney', '$T_PoorMoney', '$T_CommonFee', '$T_MemberSaving', '$T_Net', '$Grade_Price')";
$link = $connection->query($sql);

if ($link == 1) {
    header("location: ./report.php?date=$date&time=$time");
} else {
    echo "INSERT Error";
}



// foreach ($_POST as $key => $value) {
//     echo "\$$key = \$_POST['$key'];\n<br>";
// }
?>
<a href="./login.php?logout='1'"><button type="submit">Logout</button></a>