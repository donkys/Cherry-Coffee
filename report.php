<?php
session_start();
include "./Connection.php";
include "./Config.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Login FIRST!!";
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

    <title>Report</title>
</head>

<body style="font-family: 'Sarabun'; font-weight: 500;">

    <?php
    $date = $_GET["date"];
    $time = $_GET["time"];
    // echo "$date, $time";
    $sql = "SELECT * FROM t_buy INNER JOIN m_employee ON t_buy.M_EmpID = m_employee.M_EmpID INNER JOIN m_member ON t_buy.M_EmpID = m_member.Member_ID WHERE T_DATE='$date' AND T_TIME = '$time';";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    $sqlGrade = "SELECT Grade_ID, Grade_Detail, Grade_Price FROM m_grade ORDER BY Grade_Detail";
    $resultGrade = mysqli_query($connection, $sqlGrade);
    // $rowGrade = mysqli_fetch_array($resultGrade);
    $price = "*ราคา ณ วันรับซื้อ ";
    while ($row2 = mysqli_fetch_array($resultGrade)) {
        $price .= $row2["Grade_Detail"] . "=" . $row2["Grade_Price"] . " ";
    }

    $sqlCountBuy  = "SELECT Count(Member_ID) AS 'Co', SUM(T_MemberSaving) AS 'Su' FROM t_buy WHERE Member_ID = '" . $row["Member_ID"] . "'";
    $resultCountBuy = mysqli_query($connection, $sqlCountBuy);
    $rowCountBuy = mysqli_fetch_assoc($resultCountBuy);

    $dateSplit = explode("-", $date);
    $timeSplit = explode(":", $time);

    ?>

    <div class="sheet">
        <h1>ต้นฉบับ</h1>
        <div class="date">
            <b><?php echo " $dateSplit[2] " . $month[(int)$dateSplit[1]] . " พ.ศ. " . ((int)$dateSplit[0] + 543); ?></b><br>
            <b>เวลา </b><?php echo $timeSplit[0] . ":" . $timeSplit[1] . " น."; ?><br>
            <b>พนักงานรับซื้อ </b><?php echo $row["M_EmpName"]; ?>
        </div>
        <div>
            <b>รหัสสมาชิก <?php echo $row["Member_ID"]; ?><br></b>
            <b>รุ่นปลูก </b><?php echo $row["T_Class"]; ?><br>
            <b>จํานวนครั้งที่รับซื้อ </b><?php echo $rowCountBuy["Co"]; ?><br>
        </div>
        <br>
        <div>
            <table cellpadding="10" border="1px">
                <b><label>เชอรี่</label></b>
                <tr>
                    <th>นน.เชอรี่ (kg)</th>
                    <th>เกรดเชอรี่</th>
                    <th>นน.เชอรี่คุณภาพ (kg)</th>
                    <th>นน.เชอรี่คุณภาพลอย (kg)</th>
                    <th>เงินรวม (บาท)</th>
                </tr>
                <tr align="center">
                    <td><?php echo $row["T_Weight"]; ?></td>
                    <td><?php echo $row["T_Grade"]; ?></td>
                    <td><?php echo $row["T_GWeight"]; ?></td>
                    <td><?php echo $row["T_PWeight"]; ?></td>
                    <td><?php echo $row["T_GoodMoney"]; ?></td>
                </tr>

            </table>
        </div>
        <br>
        <span style="margin-top: 50px"><b> รายการหัก</b></span>
        <div style="width: '210mm'; border: 1px solid;">
            <div style="padding: 10px">
                <table>
                    <tr>
                        <td width="200px"><b>กองกลางบริหาร </b></td>
                        <td><?php echo $row["T_CommonFee"]; ?> บาท<br></td>
                    </tr>
                    <tr>
                        <td><b>เงินออมสมาชิก </b></td>
                        <td><?php echo $row["T_MemberSaving"]; ?> บาท<br></td>
                    </tr>
                    <tr>
                        <td><b>เงินออมสะสมสมาชิก </b></td>
                        <td><?php echo number_format((float)$rowCountBuy["Su"], 2, '.', ''); ?> บาท<br></td>
                    </tr>
                    <tr>
                        <td><b>รวมรายรับสุทธิ </b></td>
                        <td><?php echo $row["T_Net"]; ?> บาท<br></td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <table width="100%">
            <tr>
                <td style="width:50%" align="center">
                    <?php echo $row["Member_Name"]; ?> 
                    <hr width=80%>
                    <b>สมาชิก</b>
                </td>
                <td style="width:50%" align="center">
                    <?php echo $row["M_EmpName"]; ?> 
                    <hr width=80%>
                    <b>พนักงานรับซื้อ</b>
                </td>

            </tr>
            <tr>
                <td>
                    <hr width=100% size="5">
                    <?php echo $price; ?>
                </td>
            </tr>
        </table>

        <hr width=100% style="border-top: 2px dashed black;">
        <h1>สำเนา</h1>
        <div class="date">
            <b><?php echo " $dateSplit[2] " . $month[(int)$dateSplit[1]] . " พ.ศ. " . ((int)$dateSplit[0] + 543); ?></b><br>
            <b>เวลา </b><?php echo $timeSplit[0] . ":" . $timeSplit[1] . " น."; ?><br>
            <b>พนักงานรับซื้อ </b><?php echo $row["M_EmpName"]; ?>
        </div>
        <div>
            <b>รหัสสมาชิก <?php echo $row["Member_ID"]; ?><br></b>
            <b>รุ่นปลูก </b><?php echo $row["T_Class"]; ?><br>
            <b>จํานวนครังที่รับซื้อ </b><?php echo $rowCountBuy["Co"]; ?><br>
        </div>
        <br>
        <div>
            <table cellpadding="10" border="1px">
                <b><label>เชอรี่</label></b>
                <tr>
                    <th>นน.เชอรี (kg)</th>
                    <th>เกรดเชอรี่</th>
                    <th>นน.เชอรี่คุณภาพ (kg)</th>
                    <th>นน.เชอรี่คุณภาพลอย (kg)</th>
                    <th>เงินรวม (บาท)</th>
                </tr>
                <tr align="center">
                    <td><?php echo $row["T_Weight"]; ?></td>
                    <td><?php echo $row["T_Grade"]; ?></td>
                    <td><?php echo $row["T_GWeight"]; ?></td>
                    <td><?php echo $row["T_PWeight"]; ?></td>
                    <td><?php echo $row["T_GoodMoney"]; ?></td>
                </tr>

            </table>
        </div>
        <br>
        <span style="margin-top: 50px"><b> รายการหัก</b></span>
        <div style="width: '210mm'; border: 1px solid;">
            <div style="padding: 10px">
                <table>
                    <tr>
                        <td width="200px"><b>กองกลางบริหาร </b></td>
                        <td><?php echo $row["T_CommonFee"]; ?> บาท<br></td>
                    </tr>
                    <tr>
                        <td><b>เงินออมสมาชิก </b></td>
                        <td><?php echo $row["T_MemberSaving"]; ?> บาท<br></td>
                    </tr>
                    <tr>
                        <td><b>เงินออมสะสมสมาชิก </b></td>
                        <td><?php echo number_format((float)$rowCountBuy["Su"], 2, '.', ''); ?> บาท<br></td>
                    </tr>
                    <tr>
                        <td><b>รวมรายรับสุทธิ </b></td>
                        <td><?php echo $row["T_Net"]; ?> บาท<br></td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <table width="100%">
            <tr>
                <td style="width:50%" align="center">
                    <?php echo $row["Member_Name"]; ?> 
                    <hr width=80%>
                    <b>สมาชิก</b>
                </td>
                <td style="width:50%" align="center">
                    <?php echo $row["M_EmpName"]; ?> 
                    <hr width=80%>
                    <b>พนักงานรับซื้อ</b>
                </td>
            </tr>
            <tr>
                <td>
                    <hr width=100% size="5">
                    <?php echo $price; ?>
                </td>
            </tr>
        </table>
    </div>
    <center>
        <a href="./index.php?logout='1'"><button class="btn btn-danger" type="submit">Logout</button></a>
        <a href="./"><button class="btn btn-secondary" type="submit">กลับหน้าหลัก</button></a>
    </center>
    <br><br>
</body>

</html>