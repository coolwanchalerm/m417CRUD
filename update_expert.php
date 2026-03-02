<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U (Update) Expert Group</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="nav-links">
    <a href="#">U (Update) Expert Group</a>
</div>

<main class="container">
    <div class="card">
        <h1>U (Update) Expert Group</h1>
        
        <?php
        include 'db.php';

        if(isset($_POST['update'])) {
            $id = ;
            $new_price = $_POST['price'];

            // --- จุดที่นักสืบต้องแก้: วิกฤต! ลืม WHERE ---
            // นักเรียนต้องรับค่า id จาก url และเขียน SQL ให้ถูกต้อง
            $sql = "UPDATE menus SET price = $new_price"; 

            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success'>แก้ไขราคาเรียบร้อย (ระวังนะ...แก้หมดตารางหรือเปล่า?)</div>";
            }
        }
        ?>

        <form method="post">
            <div class="form-group">
                <label for="id">เลข ID เมนูที่ต้องการแก้:</label>
                <input type="number" id="id" name="id" required placeholder="เช่น 1">
            </div>
            
            <div class="form-group">
                <label for="price">ราคาใหม่ (บาท):</label>
                <input type="number" id="price" name="price" required placeholder="เช่น 60">
            </div>
            
            <button type="submit" name="update">อัปเดตราคา</button>
        </form>
    </div>
</main>

</body>
</html>