<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลบเมนูอาหาร | ระบบจัดการเมนู</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="nav-links">
    <a href="#">D (Delete) Expert Group</a>
</div>

<main class="container">
    <div class="card">
        <h1>D (Delete) Expert Group</h1>
        <form method="post">
            <div class="form-group">
                <label for="id">เลข ID เมนูที่ต้องการลบ:</label>
                <input type="number" id="id" name="id" required placeholder="เช่น 1">
            </div>
            <button type="submit" name="delete">ลบเมนู</button>
        </form>
        <?php
        include 'db.php';

        
        // ระวัง Warning ในกรณีที่ไม่ได้ส่ง id มา
        // นักเรียนต้องรับค่า id จาก url และเขียน SQL ให้ถูกต้อง
        if (isset($_POST['delete'])) {
            $id = 
            

            // --- จุดที่นักสืบต้องแก้: การใช้เครื่องหมายคำพูดและการเชื่อมตัวแปร ---
            $sql = "DELETE FROM menus WHERE id = $id"; 

            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success'>ลบข้อมูลสำเร็จ</div>";
            } else {
                echo "<div class='alert alert-error'>คดีแดง! ลบไม่ได้เพราะ: " . mysqli_error($conn) . "</div>";
            }
        }
        ?>
    </div>
</main>

</body>
</html>