<?php
// 引入 PHPMailer 核心文件
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);
    
    try {
        // B.03: Server settings (模拟 Gmail 配置)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your-email@gmail.com'; // 考试时写你的邮箱
        $mail->Password   = 'your-app-password';   // 应用专用密码
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        
        // B.04: Recipients
        $mail->setFrom('your-email@gmail.com', 'Admin');
        $mail->addAddress($_POST['email']);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Confirmation from CISC3003';
        $mail->Body    = "Hello " . $_POST['username'] . ", thank you for your message!";
        
        $mail->send();
        echo "<h1 style='text-align:center;margin-top:50px;'>Email Sent Successfully! (B.03)</h1>";
        // B.05: PRG Pattern (Post-Redirect-Get)
        // 发送成功后跳转，防止重复提交
        header("Location: send_email.php?status=success");
        exit();
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// 显示成功消息
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo "<h1>Email Sent Successfully!</h1>";
    echo "<a href='index.php'>Back</a>";
}

echo "<footer style='position:fixed; bottom:0; width:100%; text-align:center;'>
        <p>CISC3003 Web Programming: Chen Joaquin Antonio + DC226973 + 2026</p>
      </footer>";
?>