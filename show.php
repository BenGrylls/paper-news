<?php
// เชื่อมต่อกับฐานข้อมูล MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "news_data"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อผิดพลาด: " . $conn->connect_error);
}

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT * FROM news_form WHERE id = 1"; // เลือกแถวที่ต้องการดึงข้อมูล
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // เก็บข้อมูลเป็นอาเรย์
    $row = $result->fetch_assoc();
} else {
    echo "ไม่มีข้อมูล";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap" rel="stylesheet">
    <title>ทบ.463-007</title>
    <style>
        .num_new{
            margin-top: 120px;
            margin-left: 625px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* สำหรับเจ้าหน้าที่ศูนย์ข่าว */
        .com_admin{
            position: absolute;
            top: 178px;
            width: 780px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            line-height: 28px;
            color:blue;
        }
        /* ความเร่งด่วน-ผู้รับปฏิบัติ */
        .speed_pra{
            position: absolute;
            top: 327px;
            margin-left: 145px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* ความเร่งด่วน-ผู้รับทราบ */
        .speed_kno{
            position: absolute;
            top: 327px;
            margin-left: 370px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* หมู่/วัน-เวลา */
        .dat_new{
            position: absolute;
            top: 300px;
            margin-left: 470px;
            padding-right: 95px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* คำแนะนำ */
        .com_wri{
            position: absolute;
            top: 327px;
            margin-left: 660px;
            padding-right: 50px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* หมู่/คำ */
        .num_word{
            position: absolute;
            top: 363px;
            margin-left: 550px;
            padding-right: 150px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* ประเภทเอกสาร */
        .secret{
            position: absolute;
            top: 397px;
            margin-left: 550px;
            padding-right: 150px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* ที่ของผู้ให้ข่าว */
        .add_wri{
            position: absolute;
            top: 431px;
            margin-left: 550px;
            padding-right: 150px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* จาก */
        .form_wri{
            position: absolute;
            top: 363px;
            margin-left: 35px;
            padding-right: 350px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* ผู้รับปฏิบัต */
        .nam_pra{
            position: absolute;
            top: 405px;
            margin-left: 100px;
            padding-right: 280px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* ผู้รับทราบ */
        .nam_kno{
            position: absolute;
            top: 434px;
            margin-left: 100px;
            padding-right: 280px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* เนื้อข่าว */
        .new_con{
            position: absolute;
            top: 464px;
            margin-left: 1px;
            width: 765px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            line-height: 28px;
            color:blue;
        }
        /* หน้ากระดาษที่ */
        .num_page{
            position: absolute;
            top: 780px;
            margin-left: 22px;
            padding-right: 10px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* จำนวนหน้ากระดาษ */
        .all_page{
            position: absolute;
            top: 780px;
            margin-left: 55px;
            padding-right: 15px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* อ้างถึงข่าว */
        .ref_new{    
            position: absolute;
            top: 775px;
            margin-left: 108px;
            padding-right: 115px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* จัดประเภทเอกสาร */
        .ref{
            position: absolute;
            top: 825px;
            margin-left: 125px;
            font-family: "Sarabun", sans-serif;
            font-size: 25px;
        }
        /* ไม่ประเภทเอกสาร */
        .non_ref{
            position: absolute;
            top: 825px;
            margin-left: 210px;
            font-family: "Sarabun", sans-serif;
            font-size: 25px;
        }
        /* ชื่อผู้เขียนข่าว */
        .nam_print{
            position: absolute;
            top: 835px;
            margin-left: 290px;
            padding-right: 100px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* หน่วย */
        .nam_unit{
            position: absolute;
            top: 800px;
            margin-left: 450px;
            padding-right: 100px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* โทร */
        .call_unit{
            position: absolute;
            top: 800px;
            margin-left: 665px;
            padding-right: 100px;
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* วันที่/เวลา รับข่าว */
        .dat_rec{
            position: absolute;
            top: 950px;
            margin-left: 70px;
            padding-right: 100px;
            transform: rotate(-60deg);
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* ระบบเครื่องสื่อสาร รับข่าว */
        .tool_sys_rec{
            position: absolute;
            top: 985px;
            margin-left: 155px;
            padding-right: 70px;
            transform: rotate(-90deg);
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* เครื่องสื่อสาร รับข่าว */
        .nam_tool_rec{
            position: absolute;
            top: 985px;
            margin-left: 185px;
            padding-right: 70px;
            transform: rotate(-90deg);
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* ชื่อผู้รับข่าว */
        .nam_rec{
            position: absolute;
            top: 1010px;
            margin-left: 220px;
            transform: rotate(-90deg);
            font-family: "Sarabun", sans-serif;
            font-size: 14px;
            color:blue;

        }
        /* วันที่/เวลา ส่งข่าว */
        .dat_trans{
            position: absolute;
            top: 950px;
            margin-left: 355px;
            padding-right: 100px;
            transform: rotate(-60deg);
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* ระบบเครื่องสื่อสาร ส่งข่าว */
        .tool_sys_trans{
            position: absolute;
            top: 985px;
            margin-left: 442px;
            padding-right: 70px;
            transform: rotate(-90deg);
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* เครื่องสื่อสาร ส่งข่าว */
        .nam_tool_trans{
            position: absolute;
            top: 985px;
            margin-left: 472px;
            padding-right: 70px;
            transform: rotate(-90deg);
            font-family: "Sarabun", sans-serif;
            font-size: 16px;
            color:blue;
        }
        /* ชื่อผู้ส่งข่าว */
        .nam_trans{
            position: absolute;
            top: 1010px;
            margin-left: 510px;
            transform: rotate(-90deg);
            font-family: "Sarabun", sans-serif;
            font-size: 14px;
            color:blue;
        }
        /* ชื่อ นายทหารอนุมัติข่าว */
        .nam_wri{
            position: absolute;
            top: 1020px;
            margin-left: 623px;
            padding-right: 7px;
            font-family: "Sarabun", sans-serif;
            font-size: 10px;
            color:blue;
        }



        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            background-color: #ba68c8;
        }

        .a4-page {
            width: 210mm;
            height: 297mm;
            background-image: url('background-image.jpg') ;
            background-size: cover;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding-left: 6mm;
            padding-right: 2mm;
            
            box-sizing: border-box;
        }

        @media print {
            @page {
                size: A4;
                margin: 0;
            }

            body {
                background-color: white;
                background-size: cover;
                margin: 0;
                padding: 0;
            }

            
            .a4-page {
                box-shadow: none;
                margin: 0;
                page-break-after: always;
                
            }
            
        }
    </style>
</head>
<body>
    <div class="a4-page">
        <!-- ส่วนต่างๆ แทนด้วยข้อมูลจากฐานข้อมูล -->
        <div class="num_new">
            <?php echo $row['num_new']; ?>
        </div>
        <div class="com_admin">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $row['com_admin']; ?>
        </div>
        <div class="speed_pra">
            <?php echo $row['speed_pra']; ?>
        </div>
        <div class="speed_kno">
            <?php echo $row['speed_kno']; ?>
        </div>
        <div class="dat_new">
        <?php
            $date=date_create($row['dat_new']);
            $buddhistYear = date('Y') + 543;

            // แปลงเดือนเป็นภาษาไทย
            $thaiMonthName = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
            $month =$thaiMonthName[date('m')-1];

            echo date_format($date, "dHi{$month}{$buddhistYear}");
        ?>
        </div>
        <div class="com_wri">
            <?php echo $row['com_wri']; ?>
        </div>
        <div class="form_wri">
            <?php echo $row['form_wri']; ?>
        </div>
        <div class="num_word">
            <?php echo $row['num_word']; ?>
        </div>
        <div class="nam_pra">
            <?php echo $row['nam_pra']; ?>
        </div>
        <div class="secret">
            <?php echo $row['secret']; ?>
        </div>
        <div class="nam_kno">
            <?php echo $row['nam_kno']; ?>
        </div>
        <div class="add_wri">
            <?php echo $row['add_wri']; ?>
        </div>
        <div class="new_con">
            <?php echo $row['new_con']; ?>
        </div>
        <div class="num_page">
            <?php echo $row['num_page']; ?>
        </div>
        <div class="all_page">
            <?php echo $row['all_page']; ?>
        </div>
        <div class="ref_new">
            <?php echo $row['ref_new']; ?>
        </div>
        <div class="ref">
            <?php echo ($row['ref']) =="1"? '<font color="blue">&#10004;</font>' : ''; ?>
        </div>
        <div class="non_ref">
            <?php echo ($row['ref']) =="0"? '<font color="blue">&#10004;</font>' : ''; ?>
        </div>
        <div class="nam_print">
            <?php echo $row['nam_print']; ?>
        </div>
        <div class="nam_unit">
            <?php echo $row['nam_unit']; ?>
        </div>
        <div class="call_unit">
            <?php echo $row['call_unit']; ?>
        </div>
        <div class="dat_rec">
        <?php
            $date=date_create($row['dat_rec']);
            $buddhistYear = date('Y') + 543;

            // แปลงเดือนเป็นภาษาไทย
            $thaiMonthName = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
            $month =$thaiMonthName[date('m')-1];

            echo date_format($date, "dHi{$month}{$buddhistYear}");
        ?>
        </div>
        <div class="tool_sys_rec">
            <?php echo $row['tool_sys_rec']; ?>
        </div>
        <div class="nam_tool_rec">
            <?php echo $row['nam_tool_rec']; ?>
        </div>
        <div class="nam_rec">
            <?php echo $row['nam_rec']; ?>
        </div>
        <div class="dat_trans">
        <?php
            $date=date_create($row['dat_trans']);
            $buddhistYear = date('Y') + 543;

            // แปลงเดือนเป็นภาษาไทย
            $thaiMonthName = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
            $month =$thaiMonthName[date('m')-1];

            echo date_format($date, "dHi{$month}{$buddhistYear}");
        ?>
        </div>
        <div class="tool_sys_trans">
            <?php echo $row['tool_sys_trans']; ?>
        </div>
        <div class="nam_tool_trans">
            <?php echo $row['nam_tool_trans']; ?>
        </div>
        <div class="nam_trans">
            <?php echo $row['nam_trans']; ?>
        </div>
        <div class="nam_wri">
            <?php echo $row['nam_wri']; ?>
        </div>
    </div>
</body>
</html>
