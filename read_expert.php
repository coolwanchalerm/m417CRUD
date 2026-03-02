<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R (Read) Expert Group</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="nav-links">
    <a href="#">R (Read) Expert Group</a>
</div>

<main class="container">
    <div class="card">
        <h1>R (Read) Expert Group</h1>
        
        <?php
        include 'db.php';

        // --- จุดที่นักสืบต้องแก้ 1: ชื่อตารางผิด ---
        $sql = "SELECT * FROM menu_list"; 
        $result = mysqli_query($conn, $sql);

        // --- จุดที่นักสืบต้องแก้ 2: แสดงผลแค่แถวเดียว (ลืม while loop) ---
        $row = mysqli_fetch_assoc($result);
        echo "<div class='menu-item'>";
        echo "<span class='menu-name'>เมนู: " . $row["name"] . "</span>";
        echo "<span class='menu-price'>" . number_format($row["price"]) . " บาท</span>";
        echo "</div>";
        ?>
    </div>
</main>

</body>
</html>