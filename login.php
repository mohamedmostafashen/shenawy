<?php
// بيانات المستخدمين (يمكنك استبدال هذا بمصفوفة من قاعدة البيانات)
$users = [
    'mohamedmostafaabas' => '01014708433', // باقة الثلاث شهور
    'mohamedmostafaabas2' => '01014708434', // باقة الشهر 1
];

// الحصول على البيانات المدخلة من النموذج
$username = $_POST['username'] ?? ''; // باستخدام ?? لتجنب الأخطاء في حال عدم وجود القيمة
$password = $_POST['password'] ?? '';

// التحقق من صحة بيانات الدخول
if (isset($username) && isset($password)) {
    if (array_key_exists($username, $users) && $users[$username] == $password) {
        // تحديد صفحة الكورس بناءً على اسم المستخدم
        if ($username == 'mohamedmostafaabas') {
            header('Location: باقة3شهور.html'); // الصفحة الخاصة بكورس باقة الثلاث شهور
            exit;
        } elseif ($username == 'mohamedmostafaabas2') {
            header('Location: باقةشهر1.html'); // الصفحة الخاصة بكورس باقة الشهر 1
            exit;
        }
    } else {
        $error_message = "بيانات الدخول غير صحيحة.";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>تسجيل الدخول - محمد مصطفى</title>
</head>
<body>
    <header>
        <a href="index.html" class="logo">محمد مصطفى</a>
        <nav class="navigation"></nav>
        <button id="theme-toggle" class="theme-toggle">
            <i class="fas fa-moon"></i>
        </button>
    </header>

    <!-- قسم تسجيل الدخول -->
    <main>
        <section class="login-container">
            <h2>تسجيل الدخول</h2>
            <?php if (isset($error_message)) { echo '<p style="color: red;">' . $error_message . '</p>'; } ?>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">اسم المستخدم</label>
                    <input type="text" id="username" name="username" placeholder="أدخل اسم المستخدم" required>
                </div>
                <div class="form-group">
                    <label for="password">كلمة المرور</label>
                    <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" required>
                </div>
                <button type="submit" class="main-btn">دخول</button>
            </form>
            <div class="login-footer">
                <p>ليس لديك حساب؟ <a href="signup.html">إنشاء حساب جديد</a></p>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p class="footer-title">
            تم تطوير الموقع بواسطة
            <span><a href="https://www.facebook.com/profile.php?id=100090831465254">محمد مصطفى (الشناوي)</a></span>
            جميع الحقوق محفوظة لمحمد مصطفى 2025
        </p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
    </footer>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            const icon = themeToggle.querySelector('i');
            icon.classList.toggle('fa-moon');
            icon.classList.toggle('fa-sun');
        });
    </script>
</body>
</html>
