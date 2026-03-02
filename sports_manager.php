<?php
// --- PART 1: Database Connection ---
$host = "localhost";
$user = "root";
$pass = "root";
$db   = "sakonraj_sports";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) { die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error()); }

// --- PART 2: Controller (Logic) ---

// 1. ภารกิจ Expert C: เพิ่มข้อมูล (Create)
if (isset($_POST['add_item'])) {
    $name = $_POST['item_name'];
    $cat  = $_POST['category'];
    $qty  = $_POST['amount'];
    
    // จุดนี้นักเรียนต้องเขียน SQL ให้ถูกต้อง
    $sql = "INSERT INTO equipment (item_name, category, amount) VALUES ()";
    mysqli_query($conn, $sql);
    header("Location: sports_manager.php"); // Refresh หน้า
}

// 2. ภารกิจ Expert D: ลบข้อมูล (Delete)
// นักเรียนต้องรับค่า id จาก url และเขียน SQL ให้ถูกต้อง
if (isset($_GET['delete_id'])) {
    //$id 
    $sql = "DELETE FROM equipment where id = $id";
    mysqli_query($conn, $sql);
    header("Location: sports_manager.php");
}

// 3. ภารกิจ Expert U: อัปเดตจำนวน (Update) - แบบง่าย
// นักเรียนต้องรับค่า id และ new_qty จาก form และเขียน SQL ให้ถูกต้อง
if (isset($_POST['update_qty'])) {
    $id = 
    $new_qty =
    $sql = "UPDATE equipment SET amount = ";
    mysqli_query($conn, $sql);
    header("Location: sports_manager.php?update=success");
}

// 4. ภารกิจ Expert R: ดึงข้อมูลมาแสดง (Read)
// นักเรียนต้องเขียน SQL ให้ถูกต้อง
$sql_read = "SELECT * FROM equipment ORDER BY id DESC";
$result = mysqli_query($conn, $sql_read);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Sakolraj Sports Equipment System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Sarabun', sans-serif; }
        .card { border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .header-brand { background: #800000; color: white; padding: 20px; border-radius: 0 0 20px 20px; }
    </style>
</head>
<body>

<div class="container py-4">
    <div class="header-brand text-center mb-4">
        <h2>⚽ ระบบจัดการอุปกรณ์กีฬา</h2>
        <p>โรงเรียนสกลราชวิทยานุกูล</p>
    </div>

    <?php if (isset($_GET['update']) && $_GET['update'] == 'success'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        ✅ <strong>สำเร็จ!</strong> อัปเดตจำนวนอุปกรณ์เรียบร้อยแล้ว
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card p-4">
                <h5 class="mb-3">➕ เพิ่มอุปกรณ์ใหม่</h5>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">ชื่ออุปกรณ์</label>
                        <input type="text" name="item_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">หมวดหมู่</label>
                        <select name="category" class="form-select">
                            <option value="ฟุตบอล">ฟุตบอล</option>
                            <option value="บาสเกตบอล">บาสเกตบอล</option>
                            <option value="แบดมินตัน">แบดมินตัน</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">จำนวน</label>
                        <input type="number" name="amount" class="form-control" required>
                    </div>
                    <button type="submit" name="add_item" class="btn btn-primary w-100">บันทึกข้อมูล</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card p-4">
                <h5 class="mb-3">📋 รายการอุปกรณ์ในคลัง</h5>
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>ชื่ออุปกรณ์</th>
                            <th>หมวดหมู่</th>
                            <th>จำนวน</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><strong><?php echo $row['item_name']; ?></strong></td>
                            <td><span class="badge bg-info text-dark"><?php echo $row['category']; ?></span></td>
                            <td>
                                <form method="POST" class="d-flex align-items-center gap-1">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="number" name="new_qty" value="<?php echo $row['amount']; ?>" class="form-control form-control-sm" style="width: 70px;">
                                    <button type="submit" name="update_qty" class="btn btn-sm btn-outline-success">แก้ไขจำนวน</button>
                                </form>
                            </td>
                            <td>
                                <a href="?delete_id=<?php echo $row['id']; ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('ยืนยันการลบข้อมูล?')">ลบ</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<footer class="text-center mt-5 text-muted">
    <small>© 2026 Sakolrajwittayanukul School </small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>