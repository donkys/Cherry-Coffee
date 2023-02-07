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
    <br>
    <center>
        <form action="buycherry_show.php" method="post">
            <table border="1" width="60%">
                <tr align="center">
                    <td>
                        <table border="0" width=670px>
                            <tr>
                                <th colspan=" 2">
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
                                            <input type="text" class="form-control" id="class" name="T_Class" placeholder="รุ่นปลูก">
                                        </div>

                                        <div class="col-auto">
                                            <label for="member" class="col-form-label"><b>รหัสสมาชิก </b></label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" class="form-control" id="member" name="Member_ID" placeholder="รหัสสมาชิก">
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row g-5 align-items-center">
                                        <div class="col-auto">
                                            <label for="weight" class="col-form-label"><b>น้ำหนักเชอรี่ที่รับซื้อ</b></label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="number" id="weight" class="form-control" name="T_Weight" step="0.01" aria-describedby="weightHelpInline">
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
                                            <select class="custom-select" id="grade" name="T_Grade">
                                                <option value="A" selected>A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-auto">
                                            <label for="weight" class="col-form-label"><b> น้ำหนักเชอรี่คุณภาพ</b></label>
                                        </div>
                                        <div class="col-auto">
                                            <label for="weight" class="col-form-label">นน.เชอรี่รับ - </label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="number" id="weight" class="form-control" aria-describedby="weightHelpInline" name="T_PWeight" placeholder="น้ำหนักเชอรี่ลอย" step="0.01">
                                        </div>
                                        <div class="col-auto">
                                            <span id="weightHelpInline" class="form-text">
                                                = นน.เชอรี่คุณภาพ
                                            </span>
                                        </div>
                                    </div>
                                    <input type="submit" hidden />
                                </td>
                            <tr style="height: 50px;"></tr>
                        </table>
                    </td>
                </tr>
            </table>
            <input type="submit" hidden />
        </form>
    </center>

    <br>
    <center>
        <a href="./index.php?logout='1'"><button class="btn btn-danger" type="submit">Logout</button></a>
        <a href="./empdata.php"><button class="btn btn-warning" type="submit">แก้ไขข้อมูล</button></a>
        <a href="./"><button class="btn btn-secondary" type="submit">กลับหน้าหลัก</button></a>
    </center>
</body>

</html>