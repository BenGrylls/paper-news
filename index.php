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

// ตรวจสอบว่ามีการส่งคำค้นหาหรือไม่
$search_value = "";
if (isset($_GET['search'])) {
    $search_value = $_GET['search'];
}

// คำสั่ง SQL สำหรับดึงข้อมูลที่ค้นหา
$sql = "SELECT num_new, dat_new, new_con FROM news_form";
if (!empty($search_value)) {
    $sql .= " WHERE num_new LIKE '%$search_value%'"; // ค้นหาโดยใช้ LIKE สำหรับค้นหาใกล้เคียง
}

$sql .= " ORDER BY dat_new DESC LIMIT 3"; // แสดง 3 รายการล่าสุด
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงผลข่าว</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- ส่วนที่แสดงข้อมูลจะอยู่ที่นี่ -->

        <!-- ปุ่มไปที่ write.php -->
        <a href="write.php" class="btn btn-success mb-4">เขียนข่าวใหม่</a>

        <!-- ฟอร์มค้นหา -->
        <form method="GET" action="show.php" class="form-inline mb-4">
            <div class="form-group mx-sm-3 mb-2">
                <label for="search" class="sr-only">ค้นหาตามหมายเลขข่าว</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="ค้นหาหมายเลขข่าว" value="<?php echo htmlspecialchars($search_value); ?>">
            </div>
            <button type="submit" class="btn btn-primary mb-2">ค้นหา</button>
        </form>

        <!-- แสดงรายการอ้างอิง -->
        <h3>รายการอ้างอิงล่าสุด</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ที่</th>
                    <th>หมู่/วัน-เวลา</th>
                    <th>เนื้อข่าว</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // แสดงข้อมูลที่ค้นหาได้
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['num_new'] . "</td>";
                        echo "<td>" . $row['dat_new'] . "</td>";
                        echo "<td>" . $row['new_con'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>ไม่พบรายการที่ค้นหา</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// ปิดการเชื่อมต่อ
$conn->close();
?>
