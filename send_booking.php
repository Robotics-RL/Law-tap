<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $to = "l.laithkhasawneh@gmail.com";
  $subject = "طلب حجز جديد من موقع LawTap";

  $name = htmlspecialchars($_POST["name"]);
  $phone = htmlspecialchars($_POST["phone"]);
  $email = htmlspecialchars($_POST["email"]);
  $package = htmlspecialchars($_POST["package"]);
  $meeting_method = htmlspecialchars($_POST["meeting_method"]); // ✅ أُضيفت هنا
  $datetime = htmlspecialchars($_POST["datetime"]);
  $message = htmlspecialchars($_POST["message"]);

  $body = "
  🔔 تم إرسال طلب حجز جديد من الموقع:
  ----------------------------
  👤 الاسم الكامل: $name
  📞 الهاتف: $phone
  ✉️ البريد الإلكتروني: $email
  💼 الباقة المختارة: $package
  💬 طريقة اللقاء: $meeting_method
  📅 التاريخ والوقت المفضل: $datetime
  📝 ملاحظات إضافية:
  $message
  ----------------------------
  ";

  $headers = "From: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  if (mail($to, $subject, $body, $headers)) {
    echo "✅ تم إرسال طلبك بنجاح، سيتم التواصل معك قريبًا.";
  } else {
    echo "❌ حدث خطأ أثناء الإرسال. حاول مرة أخرى لاحقًا.";
  }
}
?>
