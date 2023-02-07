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

    <title>Employee's buy Data</title>
</head>

<body style="font-family: 'Sarabun'; font-weight: 500; padding: 100px">
    <center>
        <h1>ข้อมูลพนักงานสำหรับทำรายการสั่งซื้อเชอรี่</h1>
        <?php
        session_start();
        include "./Connection.php";
        include "./Config.php";


        if (!isset($_SESSION['username'])) {
            $_SESSION['msg'] = "Login FIRST!!";
            header('location: login.php');
        }

        $M_EmpID = $_SESSION['M_EmpID'];

        if (isset($_POST['update'])) {
            $M_EmpName = $_POST['M_EmpName'];
            $M_EmpSurname = $_POST['M_EmpSurname'];
            $M_EmpSex = $_POST['M_EmpSex'];
            $M_EmpBod = $_POST['M_EmpBod'];
            $M_EmpAddress = $_POST['M_EmpAddress'];
            $M_EmpTel = $_POST['M_EmpTel'];
            $M_EmpEmail = $_POST['M_EmpEmail'];
            $M_EmpUpdate = date("Y-m-d");

            $sql2 = "UPDATE m_employee SET  M_EmpName='$M_EmpName', M_EmpSurname='$M_EmpSurname', M_EmpSex='$M_EmpSex', M_EmpBod='$M_EmpBod', M_EmpAddress='$M_EmpAddress', M_EmpTel='$M_EmpTel', M_EmpEmail='$M_EmpEmail', M_EmpUpdate='$M_EmpUpdate' WHERE M_EmpID ='$M_EmpID'";
            $link = $connection->query($sql2);
            if ($link == 1) {
                echo "<center><font color=Green> Update Success! การแก้ไขสำเร็จ </font></center><br>";
                echo "<center><font color=Gray>แก้ไข ID: $M_EmpID สำเร็จ</font></center>";
                $_SESSION['M_EmpName'] = $M_EmpName;
            } else {
                echo "<center><font color=red> Update Fail! การแก้ไขล้มเหลว </font></center><br>";
            }
        }
        ?>

        <center>
            <?php
            $sql = "SELECT M_EmpID, M_EmpUser, M_EmpPwd, M_EmpName, M_EmpSurname, M_EmpSex, M_EmpBod, M_EmpAddress, M_EmpTel, M_EmpEmail, M_EmpUpdate FROM m_employee WHERE M_EmpID = '$M_EmpID'";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);

            $M_EmpName = $row['M_EmpName'];
            $M_EmpSurname = $row['M_EmpSurname'];
            $M_EmpSex = $row['M_EmpSex'];
            $M_EmpBod = $row['M_EmpBod'];
            $M_EmpAddress = $row['M_EmpAddress'];
            $M_EmpTel = $row['M_EmpTel'];
            $M_EmpEmail = $row['M_EmpEmail'];
            $M_EmpUpdate = date("Y-m-d");



            echo "<h3>แก้ไขข้อมูลของ : " . $row['M_EmpName'] . "</h3><br>";

            ?>
        </center>
        <form action="./empdata.php" method="post">
            <table align='center' cellpadding=8px width=40%>
                <tr>
                    <td width="100px">ชื่อ</td>
                    <td>
                        <?php
                        echo "<input class='form-control' type='text' name='M_EmpName' value='$M_EmpName'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>นามสกุล</td>
                    <td>
                        <?php
                        echo "<input class='form-control' type='text' name='M_EmpSurname' value='$M_EmpSurname'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>เพศ</td>
                    <td>
                        <select class="custom-select" id="grade" name="M_EmpSex">
                            <option value="M" <?= $M_EmpSex == 'M' ? ' selected="selected"' : ''; ?>>M</option>
                            <option value="F" <?= $M_EmpSex == 'F' ? ' selected="selected"' : ''; ?>>F</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>วันเกิด</td>
                    <td>
                        <?php
                        echo "<input class='form-control' type='date' name='M_EmpBod' value='$M_EmpBod'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>เบอร์โทร</td>
                    <td>
                        <?php
                        echo "<input class='form-control' type='text' name='M_EmpTel' value='$M_EmpTel'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>
                        <?php
                        echo "<input class='form-control' type='text' name='M_EmpEmail' value='$M_EmpEmail'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>ที่อยู่</td>
                    <td>
                        <?php
                        echo "<textarea class='form-control' type='text' name='M_EmpAddress' rows='2'>$M_EmpAddress</textarea>";
                        ?>
                    </td>
                </tr>



                <td align="center" colspan="2"> <br>
                    <input type="submit" class="btn btn-info" value="ตกลง" name="update">
                    <a class="btn btn-secondary" href="./">กลับหน้าหลัก</a>
                </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>