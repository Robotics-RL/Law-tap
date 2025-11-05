<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // البيانات القادمة من النموذج
    $name     = htmlspecialchars($_POST['name']);
    $phone    = htmlspecialchars($_POST['phone']);
    $email    = htmlspecialchars($_POST['email']);
    $package  = htmlspecialchars($_POST['package']);
    $method   = htmlspecialchars($_POST['method']);
    $datetime = htmlspecialchars($_POST['datetime']);
    $message  = htmlspecialchars($_POST['message']);

    // إعدادات البريد
    $to = "l.laithkhasawneh@gmail.com";
    $subject = "طلب استشارة جديدة من $name";
    
    $body = "
    <html>
    <head><title>طلب استشارة جديدة</title></head>
    <body style='font-family:Arial; background-color:#111; color:#fff; padding:20px;'>
        <h2 style='color:#d4af37;'>تفاصيل الحجز</h2>
        <p><strong>الاسم:</strong> $name</p>
        <p><strong>رقم الهاتف:</strong> $phone</p>
        <p><strong>البريد الإلكتروني:</strong> $email</p>
        <p><strong>الباقة المختارة:</strong> $package</p>
        <p><strong>طريقة اللقاء:</strong> $method</p>
        <p><strong>التاريخ والوقت:</strong> $datetime</p>
        <p><strong>ملاحظات إضافية:</strong><br>$message</p>
        <hr>
        <p style='color:#888;'>LawTap | حجز استشارة قانونية</p>
    </body>
    </html>
    ";

    // ترويسات الإيميل
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: LawTap Website <no-reply@lawtap.com>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // محاولة الإرسال
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>
            alert('✅ تم إرسال طلبك بنجاح! سيتم التواصل معك قريباً.');
            window.location.href='booking.html';
        </script>";
    } else {
        echo "<script>
            alert('⚠️ حدث خطأ أثناء إرسال الطلب، يرجى المحاولة لاحقاً.');
            window.location.href='booking.html';
        </script>";
    }

} else {
    // في حال الوصول المباشر للملف بدون POST
    http_response_code(405);
    echo "405 Method Not Allowed";
}
?>
