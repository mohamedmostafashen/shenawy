<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];

    // تحقق من صحة المدخلات (تشفير أو حماية)
    if (!empty($card_number) && !empty($expiry_date) && !empty($cvv)) {
        // هنا يمكنك إرسال البيانات إلى مزود خدمة الدفع
        echo "<h2>تمت معالجة الدفع بنجاح!</h2>";
    } else {
        echo "<h2>حدث خطأ أثناء معالجة الدفع. الرجاء المحاولة مرة أخرى.</h2>";
    }
} else {
    echo "<h2>طلب غير صالح!</h2>";
}
?>
