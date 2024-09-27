<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "news_data";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่ามีการส่งข้อมูลผ่านฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $num_new = $_POST['num_new'];
    $com_admin = $_POST['com_admin'];
    $speed_pra = $_POST['speed_pra'];
    $speed_kno = $_POST['speed_kno'];
    $dat_new = $_POST['dat_new'];
    $com_wri = $_POST['com_wri'];
    $form_wri = $_POST['form_wri'];
    $num_word = $_POST['num_word'];
    $nam_pra = $_POST['nam_pra'];
    $secret = $_POST['secret'];
    $nam_kno = $_POST['nam_kno'];
    $add_wri = $_POST['add_wri'];
    $new_con = $_POST['new_con'];
    $num_page = $_POST['num_page'];
    $all_page = $_POST['all_page'];
    $ref_new = $_POST['ref_new'];
    $ref = $_POST['ref'];
    $nam_print = $_POST['nam_print'];
    $nam_unit = $_POST['nam_unit'];
    $call_unit = $_POST['call_unit'];
    $dat_rec = $_POST['dat_rec'];
    $tool_sys_rec = $_POST['tool_sys_rec'];
    $nam_rec = $_POST['nam_rec'];
    $dat_trans = $_POST['dat_trans'];
    $tool_sys_trans = $_POST['tool_sys_trans'];
    $nam_trans = $_POST['nam_trans'];
    $nam_wri = $_POST['nam_wri'];

    // สร้างคำสั่ง SQL เพื่อบันทึกข้อมูลลงในตาราง
    $sql = "INSERT INTO news_form (num_new, com_admin, speed_pra, speed_kno, dat_new, com_wri, form_wri, num_word, nam_pra, secret, nam_kno, add_wri, new_con, num_page, all_page, ref_new, ref, nam_print, nam_unit, call_unit, dat_rec, tool_sys_rec, nam_rec, dat_trans, tool_sys_trans, nam_trans, nam_wri)
    VALUES ('$num_new', '$com_admin', '$speed_pra', '$speed_kno', '$dat_new', '$com_wri', '$form_wri', '$num_word', '$nam_pra', '$secret', '$nam_kno', '$add_wri', '$new_con', '$num_page', '$all_page', '$ref_new', '$ref', '$nam_print', '$nam_unit', '$call_unit', '$dat_rec', '$tool_sys_rec', '$nam_rec', '$dat_trans', '$tool_sys_trans', '$nam_trans', '$nam_wri')";

    // ตรวจสอบผลลัพธ์การบันทึกข้อมูล
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>บันทึกข้อมูลสำเร็จ!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// ปิดการเชื่อมต่อ
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มข่าว</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">กรอกข้อมูลข่าว</h2>
        <form action="index.php" method="POST">
            <div class="form-group" style="float: right;">
                <label for="num_new">ที่:</label>
                <input type="text" class="form-control" id="num_new" name="num_new" required>
            </div>
            <br><br><br>
            <div class="form-group">
                <label for="com_admin">สำหรับเจ้าหน้าที่ศูนย์ข่าว:</label>
                <input type="text" class="form-control" id="com_admin" name="com_admin">
            </div>

                <div class="form-group"style="float: left;">
                <label for="speed_pra">ความเร่งด่วน-ผู้รับปฏิบัติ:</label>
                <select id="speed_pra" name="speed_pra"required>
                <option value="-">ปกติ</option>
                    <option value="ด่วน"selected>ด่วน</option>
                    <option value="ด่วนมาก">ด่วนมาก</option>
                    <option value="ด่วนที่สุด">ด่วนที่สุด</option>
                </select>
            </div>
            
            <div class="form-group" style="float:left; " >
                <label for="speed_kno">&nbsp;&nbsp;&nbsp;ความเร่งด่วน-ผู้รับทราบ:</label>
                <select id="speed_kno" name="speed_kno"required>
                    <option value="-">ปกติ</option>
                    <option value="ด่วน"selected>ด่วน</option>
                    <option value="ด่วนมาก">ด่วนมาก</option>
                    <option value="ด่วนที่สุด">ด่วนที่สุด</option>
                </select>
            </div>
            <div class="form-group" style="float:left;">
                <label for="dat_new">&nbsp;&nbsp;&nbsp;หมู่/วัน-เวลา:</label>
                <input type="datetime-local" id="dat_new" name="dat_new"required>
            </div>
            <div class="form-group" style="float:right; ">
                <label for="com_wri">คำแนะนำ:</label>
                <input type="text" class="form-control" id="com_wri" name="com_wri">
            </div>
            <br><br><br><br>
            <div class="form-group" style="float:left; ">
                <label for="form_wri">จาก:</label>
                <input type="text" class="form-control" id="form_wri" name="form_wri" required>
            </div>
            <div class="form-group"  style="float:right;">
                <label for="num_word">หมู่/คำ:</label>
                <input type="text" class="form-control" id="num_word" name="num_word" required>
            </div>
            <br><br><br><br>
            <div class="form-group" style="float: left;" >
                <label for="nam_pra">ถึง ผู้รับปฏิบัติ:</label>
                <input type="text" class="form-control" id="nam_pra" name="nam_pra" required>
            </div>
            <div class="form-group"style="float: right;">
                <label for="secret">ประเภทเอกสาร:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="secret" name="secret">
                    <option value="-">ปกติ</option>
                    <option value="ลับ"selected>ลับ</option>
                    <option value="ลับมาก">ลับมาก</option>
                    <option value="ลับที่สุด">ลับที่สุด</option>
                </select>
            </div>
            <br><br><br><br>
            <div class="form-group" style="float: left;">
                <label for="nam_kno">ผู้รับทราบ:</label>
                <input type="text" class="form-control" id="nam_kno" name="nam_kno" required>
            </div>
            <div class="form-group" style="float: right;">
                <label for="add_wri">ที่ของผู้ให้ข่าว:</label>
                <input type="text" class="form-control" id="add_wri" name="add_wri" required>
            </div>
            <br><br><br><br>
            <div class="form-group">
                <label for="new_con">เนื้อข่าว:</label>
                <textarea class="form-control" id="new_con" name="new_con" rows="3" required></textarea>
            </div>
            <div class="form-group"style="float: left;">
                <label for="num_page">หน้ากระดาษที่:</label>
                <input type="text" class="form-control" id="num_page" name="num_page" required>
            </div>
            <div class="form-group"style="float: left;">
                <label for="all_page">จำนวนหน้ากระดาษ:</label>
                <input type="text" class="form-control" id="all_page" name="all_page" required>
            </div>
            <!-- ตัวเลือกจัดประเภทเอกสาร -->
            <div class="form-group"style="float: right;">
            <fieldset>
                    <legend>จัดประเภทเอกสาร</legend>
                    <div>
                        <input type="radio" id="ref" name="ref" value="1" checked />
                        <label for="ref">จัด</label>
                    </div>

                    <div>
                    <input type="radio" id="ref" name="ref" value="0" />
                    <label for="ref">ไม่</label>
                    </div>
            </fieldset>
            </div>
            <div class="form-group"style="float: right; ">
                <label for="ref_new">อ้างถึงข่าว:</label>
                <input type="text" class="form-control" id="ref_new" name="ref_new">
            </div>
            <br><br><br><br>
            <div class="form-group"style="float: left;">
                <label for="nam_print">ชื่อผู้เขียนข่าว:</label>
                <input type="text" class="form-control" id="nam_print" name="nam_print" required>
            </div>
            <div class="form-group"style="float: left;">
                <label for="nam_unit">หน่วย:</label>
                <input type="text" class="form-control" id="nam_unit" name="nam_unit" required>
            </div>
            <div class="form-group"style="float: left;">
                <label for="call_unit">โทร:</label>
                <input type="text" class="form-control" id="call_unit" name="call_unit" required>
            </div> <br>
            <br><br><br><br>
            <h2 class="mb-4">รับข่าว</h2>
            <div class="form-group"style="float: left;">
                <label for="dat_rec">รับข่าวเมื่อ วันที่/เวลา:</label>
                <input type="datetime-local" id="dat_rec" name="dat_rec">
            </div>
            <div class="form-group"style="float: left;">
                <label for="tool_sys_rec">&nbsp;&nbsp;&nbsp;ระบบเครื่องสื่อสาร:</label>
                <select id="tool_sys_rec" name="tool_sys_rec">
                   <option selected >- เครื่องมือ -</option>
                    <optgroup label="วิทยุ AM">
                        <option value="วิทยุ AM PRC/VRC-610">PRC/VRC-610</option>
                        <option value="วิทยุ AM AN/GRC-106">AN/GRC-106</option>
                        <option value="วิทยุ AM AN/GRC-122">AN/GRC-122</option>
                        <option value="วิทยุ AM PRC-1099">PRC-1099</option>
                        <option value="วิทยุ AM PRC-2000">PRC-2000</option>
                        <option value="วิทยุ AM RACAL SYNCAL TRA">RACAL SYNCAL TRA </option>
                        <option value="วิทยุ AM TR-7000">TR-7000</option>
                        <option value="วิทยุ AM HF-2000">HF-2000</option>
                        <option value="วิทยุ AM HF-6000">HF-6000</option>
                    </optgroup>
                    <optgroup label="วิทยุ FM">
                        <option value="วิทยุ FM PNR-500">PNR-500</option>
                        <option value="วิทยุ FM PRC-624">PRC-624</option>
                        <option value="วิทยุ FM PRC-710">PRC-710</option>
                        <option value="วิทยุ FM AN/PRC-77">AN/PRC-77</option>
                        <option value="วิทยุ FM AN/VRC-12">AN/VRC-12</option>
                        <option value="วิทยุ FM RACAL UK/VRQ301">RACAL UK/VRQ301 </option>
                        <option value="วิทยุ FM CNR-900">CNR-900</option>
                        <option value="วิทยุ FM CNR-900T">CNR-900T</option>
                        <option value="วิทยุ FM SINCGARS">SINCGARS</option>
                    </optgroup>
                    <option value="โทรศัพท์">โทรศัพท์</option>
                    <option value="โทรพิมพ์">โทรพิมพ์</option>
                    <option value="ระบบ AMC">ระบบ AMC</option>
                </select>
            </div>

            <div class="form-group"style="float: left;">
                <label for="nam_rec">ชื่อพนักงาน รับข่าว:</label>
                <input type="text" class="form-control" id="nam_rec" name="nam_rec">
            </div><br>
            <br><br><br>
            <h2 class="mb-4">ส่งข่าว</h2>
                <div class="form-group"style="float: left;">
                <label for="dat_trans">ส่งเสร็จ วันที่/เวลา:</label>
                <input type="datetime-local" id="dat_trans" name="dat_trans">
            </div>
            <div class="form-group"style="float: left;">
                <label for="tool_sys_trans">&nbsp;&nbsp;&nbsp;ระบบเครื่องสื่อสาร:</label>
                <select id="tool_sys_trans" name="tool_sys_trans">
                <option selected >- เครื่องมือ -</option>
                    <optgroup label="วิทยุ AM">
                        <option value="วิทยุ AM PRC/VRC-610">PRC/VRC-610</option>
                        <option value="วิทยุ AM AN/GRC-106">AN/GRC-106</option>
                        <option value="วิทยุ AM AN/GRC-122">AN/GRC-122</option>
                        <option value="วิทยุ AM PRC-1099">PRC-1099</option>
                        <option value="วิทยุ AM PRC-2000">PRC-2000</option>
                        <option value="วิทยุ AM RACAL SYNCAL TRA">RACAL SYNCAL TRA </option>
                        <option value="วิทยุ AM TR-7000">TR-7000</option>
                        <option value="วิทยุ AM HF-2000">HF-2000</option>
                        <option value="วิทยุ AM HF-6000">HF-6000</option>
                    </optgroup>
                    <optgroup label="วิทยุ FM">
                        <option value="วิทยุ FM PNR-500">PNR-500</option>
                        <option value="วิทยุ FM PRC-624">PRC-624</option>
                        <option value="วิทยุ FM PRC-710">PRC-710</option>
                        <option value="วิทยุ FM AN/PRC-77">AN/PRC-77</option>
                        <option value="วิทยุ FM AN/VRC-12">AN/VRC-12</option>
                        <option value="วิทยุ FM RACAL UK/VRQ301">RACAL UK/VRQ301 </option>
                        <option value="วิทยุ FM CNR-900">CNR-900</option>
                        <option value="วิทยุ FM CNR-900T">CNR-900T</option>
                        <option value="วิทยุ FM SINCGARS">SINCGARS</option>
                    </optgroup>
                    <option value="โทรศัพท์">โทรศัพท์</option>
                    <option value="โทรพิมพ์">โทรพิมพ์</option>
                    <option value="ระบบ AMC">ระบบ AMC</option>
                </select>
            </div>
            <div class="form-group"style="float: left;">
                <label for="nam_trans">ชื่อพนักงาน ส่งข่าว:</label>
                <input type="text" class="form-control" id="nam_trans" name="nam_trans">
            </div>
            <br><br><br><br>
            <div class="form-group">
                <label for="nam_wri">นายทหารอนุมัติข่าว:</label>
                <input type="text" class="form-control" id="nam_wri" name="nam_wri">
            </div>
            <button type="submit" class="btn btn-primary">Print</button>
        </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
