<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C (Create) Expert Group</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="nav-links">
    <a href="#">C (Create) Expert Group</a>
</div>

<main class="container">
    <div class="card">
        <h1>เพิ่มเมนูอาหาร</h1>
        
        <?php
        include 'db.php';

        if(isset($_POST['submit'])) {
            $menu_name = $_POST['menu_name'];
            $price = $_POST['price'];

            // --- จุดที่นักสืบต้องแก้: SQL Error ---
            //นักเรียนต้องเขียน SQL ให้ถูกต้อง
            $sql = "INSERT INTO menus (name, price) VALUES ()"; 
            
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success'>เพิ่มเมนูสำเร็จ!</div>";
            } else {
                echo "<div class='alert alert-error'>Error: " . mysqli_error($conn) . "</div>";
            }
        }
        ?>

        <form method="post">
            <div class="form-group">
                <label for="menu_name">ชื่อเมนู:</label>
                <input type="text" id="menu_name" name="menu_name" required placeholder="เช่น ผัดกะเพรา">
            </div>
            
            <div class="form-group">
                <label for="price">ราคา (บาท):</label>
                <input type="number" id="price" name="price" required placeholder="เช่น 50">
            </div>
            
            <button type="submit" name="submit">บันทึกเมนู</button>
        </form>
    </div>
</main>

</body>
</html>