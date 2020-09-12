<?php
/*echo '<pre>';
print_r($_FILES);
echo '</pre>';*/

/* อาร์เรย์ของไฟล์จะประกอบด้วย
[name] = ชื่อไฟล์
[type] = ชนิดไฟล์
[tmp_name] = ที่อยู่ของไฟล์
[error] = ถ้าเป็น 0 (ไม่เกิด error) / ถ้าเป็น 1 (เกิด error)
[size] = ขนาด (byte) */

if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES['file']['tmp_name']); // ตรวจสอบว่าเป็นไฟล์รูปภาพหรือไม่

    if ($check) {
        $dir = "uploads/"; // ตั้งชื่อ path และต้องมีโฟลเดอร์ชื่อนี้ด้วย
        $fileImage = $dir . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $fileImage)) { // $fileImage จะเป็นเหมือน path ของไฟล์
            echo "ไฟล์ภาพชื่อ " . basename($_FILES['file']['name']) . "อัพโหลดสำเร็จ";
        } else {
            header("ผิดพลาด");
        }
    } else {
        echo "<script>alert('อัปโหลดไฟล์รูปเท่านั้น')</script>";
        header("Refresh:0; url=index.php"); // redirect ใช้กับ alert
    }
} else {
    header("locotion: index.php");
}



/*$path = "/test/home.php";  // สมมติ path
echo "<br>";
echo basename($path)."<br>"; // ส่งพารามิเตอร์เดียว ผลลัพะ์จะได้เป็น home.php
echo basename($path, ".php");*/ // ส่งสองพารามิเตอร์ ผลลัพธ์จะได้เป็น home
