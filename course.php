<?php
session_start();
include 'db_connection.php';

// التحقق من تسجيل الدخول
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$userId = $_SESSION['user_id'];
$courseId = $_SESSION['course_id'];

// جلب تفاصيل الكورس
$query = "SELECT * FROM courses WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $courseId);
$stmt->execute();
$result = $stmt->get_result();
$course = $result->fetch_assoc();

if (!$course) {
    echo "الكورس غير موجود.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الكورس</title>
</head>

<body>
    <h1><?php echo $course['name']; ?></h1>
    <p><?php echo $course['description']; ?></p>
</body>

</html>
