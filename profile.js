<script>
    window.onload = function() {
        const username = localStorage.getItem('username');
        const loginTime = localStorage.getItem('loginTime');
        const currentTime = new Date().getTime();
        const expiryTime = 24 * 60 * 60 * 1000;  // 24 ساعة

        if (username && loginTime) {
            if (currentTime - loginTime > expiryTime) {
                localStorage.removeItem('username');
                localStorage.removeItem('loginTime');
                alert("فترة الحساب انتهت، يرجى تسجيل الدخول مرة أخرى.");
                window.location.href = "login.html";  // التوجيه إلى صفحة تسجيل الدخول
            } else {
                document.getElementById('profile').innerText = "مرحبًا، " + username;
            }
        } else {
            window.location.href = "login.html";
        }
    };
</script>
</body>
