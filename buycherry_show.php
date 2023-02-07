<?php
session_start();
include "./Connection.php";
include "./Config.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Login FIRST!!";
    header('location: login.php');
}


$T_Class = $_POST['T_Class']; //รุ่นปลูก
$Member_ID = $_POST['Member_ID']; //รหัสสมาชิก
$T_Weight = $_POST['T_Weight']; //น้ำหนักเชอรี่ที่รับซื้อ
$T_Grade = $_POST['T_Grade']; //เกรดเชอรี่ 
$T_PWeight = $_POST['T_PWeight']; //น้ำหนักเชอรี่คุณภาพ


$user_check_query = "SELECT * FROM m_grade WHERE Grade_Detail = '$T_Grade'";
$query = mysqli_query($connection, $user_check_query);
$result = mysqli_fetch_assoc($query);

$T_GWeight = ($T_Weight - $T_PWeight);
$Grade_Price = $result["Grade_Price"];
$T_GoodMoney = $T_GWeight * $Grade_Price;
$T_PoorMoney = $T_PWeight * 10;
$T_CommonFee = $T_Weight * 1.0;
$T_MemberSaving = $T_Weight * 0.5;
$T_Net = ($T_GoodMoney + $T_PoorMoney) - ($T_CommonFee + $T_MemberSaving);


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
    <title>Buy Cherry</title>
</head>

<body style="font-family: 'Sarabun'; font-weight: 500;">
    <center>
        <form action="buycherry_db.php" method="post">
            <input type="hidden" name="T_Class" value="<?php echo $T_Class; ?>">
            <input type="hidden" name="Grade_Price" value="<?php echo $Grade_Price; ?>">
            <input type="hidden" name="Member_ID" value="<?php echo $Member_ID; ?>">
            <input type="hidden" name="T_Weight" value="<?php echo $T_Weight; ?>">
            <input type="hidden" name="T_Grade" value="<?php echo $T_Grade; ?>">
            <input type="hidden" name="T_PWeight" value="<?php echo $T_PWeight; ?>">
            <input type="hidden" name="T_GWeight" value="<?php echo $T_GWeight; ?>">

            <br>
            <center>
                <form action="buycherry_show.php" method="post">
                    <table border="1" width="60%">
                        <tr align="center">
                            <td>
                                <table border="0" width=670px>
                                    <tr>
                                        <th colspan="2">
                                            <center>
                                                <label class="lb" style='font-size: 30px; right: 0px; border-radius: 30px;'>
                                                    Cherry Coffee
                                                </label>
                                            </center>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td width=50%>
                                            <div class="row g-4 align-items-center">
                                                <div class="col-auto">
                                                    <label for="class" class="col-form-label"><b>รุ่นปลูก </b></label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" class="form-control" value="<?php echo $T_Class; ?>" id="class" name="T_Class" placeholder="รุ่นปลูก" disabled>
                                                </div>

                                                <div class="col-auto">
                                                    <label for="member" class="col-form-label"><b>รหัสสมาชิก </b></label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" class="form-control" id="member" value="<?php echo $Member_ID; ?>" name="Member_ID" placeholder="รหัสสมาชิก" disabled>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row g-5 align-items-center">
                                                <div class="col-auto">
                                                    <label for="weight" class="col-form-label"><b>น้ำหนักเชอรี่ที่รับซื้อ</b></label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="number" id="weight" class="form-control" name="T_Weight" value="<?php echo $T_Weight; ?>" step="0.01" aria-describedby="weightHelpInline" disabled>
                                                </div>
                                                <div class="col-auto">
                                                    <span id="weightHelpInline" class="form-text">
                                                        กิโลกรัม.
                                                    </span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row g-3 align-items-center">
                                                <div class="col-auto">
                                                    <label for="grade" class="col-form-label"><b>เกรดเชอรี่</b></label>
                                                </div>
                                                <div class="col-auto">
                                                    <select class="custom-select" id="grade" name="T_Grade" disabled>
                                                        <option value="<?php echo $T_Grade; ?>" selected><?php echo $T_Grade; ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row g-5 align-items-center">
                                                <div class="col-auto">
                                                    <label for="weight" class="col-form-label"><b> น้ำหนักเชอรี่คุณภาพ</b></label>
                                                </div>
                                                <div class="col-auto">
                                                    <label for="weight" class="col-form-label"><?php echo $T_Weight; ?> - </label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="number" id="weight" class="form-control" aria-describedby="weightHelpInline" name="T_PWeight" value="<?php echo $T_PWeight; ?>" placeholder="น้ำหนักเชอรี่ลอย" step="0.01" disabled>
                                                </div>
                                                <div class="col-auto">
                                                    <span id="weightHelpInline" class="form-text">
                                                        = <?php echo $T_GWeight; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    <tr style="height: 50px;"></tr>
                                </table>
                            </td>
                        </tr>
                        <tr align="center">
                            <td>
                                <table border="0" width=30%>
                                    <tr>
                                        <th>
                                            <center>
                                                <h1>การเงิน</h1>
                                            </center>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table border="0" width=100%>
                                                <tr>
                                                    <td>
                                                        <font size="4"><b> เงินเชอรี่คุณภาพ</b>
                                                            <input type="hidden" name="T_GoodMoney" value="<?php echo ($T_GoodMoney); ?>">

                                                        </font>
                                                    </td>
                                                    <td>
                                                        <label><?php echo ($T_GoodMoney); ?> บาท</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <font size="4"><b> เงินเชอรี่ลอย</b>
                                                            <input type="hidden" name="T_PoorMoney" value="<?php echo $T_PoorMoney; ?>">
                                                        </font>
                                                    </td>
                                                    <td>
                                                        <label><?php echo $T_PoorMoney; ?> บาท</label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr height=20px>

                                    </tr>
                                    <tr>
                                        <td>
                                            <table width=100%>
                                                <tr>
                                                    <td>
                                                        <font size="4"><b> หักค่าบริการกองกลาง</b>
                                                            <input type="hidden" name="T_CommonFee" value="<?php echo $T_CommonFee; ?>">
                                                        </font>
                                                    </td>
                                                    <td>
                                                        <label><?php echo $T_CommonFee; ?> บาท</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <font size="4"><b> หักเงินออมสามชิก</b>
                                                            <input type="hidden" name="T_MemberSaving" value="<?php echo $T_MemberSaving; ?>">
                                                        </font>
                                                    </td>
                                                    <td>
                                                        <label><?php echo $T_MemberSaving; ?> บาท</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <font size="4"><b> รวมรายรับสุทธิ</b>
                                                            <input type="hidden" name="T_Net" value="<?php echo $T_Net; ?>">

                                                        </font>
                                                    </td>
                                                    <td>
                                                        <label><?php echo $T_Net; ?> บาท</label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr height="20px"></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <a href="./login.php?logout='1'" class="btn btn-danger">Logout</a>
                    <a href="./" class="btn btn-secondary">กลับหน้าหลัก</a>
                    <button class="btn btn-success" type="submit">ยืนยัน</button>
                </form>
                <!-- <a href="./buycherry.php"><button type="reset">ยกเลิก</button></a> -->
            </center>

            <br>
            <center>

            </center>
</body>

</html>