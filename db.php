<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sakonraj_canteen";

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("<div class='alert alert-error'>Connection failed: " . mysqli_connect_error() . "</div>");
} else {
    // ซ่อนข้อความ success เพื่อไม่ให้รกหน้า UI ทุกหน้า หรือจะเอาไว้ดู status ก่อนก็ได้
    // echo "<div class='alert alert-success' style='margin: 10px;'>Connected successfully</div>";
}
?>