<?php
require_once('class.phpmailer.php');
require_once("class.smtp.php"); 
$mail  = new PHPMailer(); 

$mailto="info@humanbrain.cn";//收件人信箱
$mailsubject="客户咨询";
$mailfrom=$_POST["name"];
$mailbody="尊敬的华睿慧脑，"."<br>"."&nbsp;&nbsp;&nbsp;&nbsp;"."以下是客户的个人信息和留言，请及时解答回复。"."<br>";
$mailbody=$mailbody."&nbsp;&nbsp;&nbsp;&nbsp;"."Name=".$_POST["name"]."<br>";
$mailbody=$mailbody."&nbsp;&nbsp;&nbsp;&nbsp;"."Institution=".$_POST["institution"]."<br>";
$mailbody=$mailbody."&nbsp;&nbsp;&nbsp;&nbsp;"."Email=".$_POST["email"]."<br>";
$mailbody=$mailbody."&nbsp;&nbsp;&nbsp;&nbsp;"."Message=".$_POST["message"]."<br>";
$mailbody=$mailbody."<br>"."<br>"."&nbsp;&nbsp;&nbsp;&nbsp;"."祝好！"."<br>";

$mail->CharSet    ="UTF-8";                 //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置为 UTF-8
$mail->IsSMTP();                            // 设定使用SMTP服务
$mail->SMTPAuth   = true;                   // 启用 SMTP 验证功能
$mail->SMTPSecure = "ssl";                  // SMTP 安全协议
$mail->Host       = "smtp.exmail.qq.com";       // SMTP 服务器
$mail->Port       = 465;                    // SMTP服务器的端口号
$mail->Username   = "info@humanbrain.cn";  // SMTP服务器用户名
$mail->Password   = "Huarui1234";        // SMTP服务器密码
$mail->SetFrom('info@humanbrain.cn', $mailfrom);    // 设置发件人地址和名称
$mail->AddReplyTo("haobo_kaoyan@163.com",$mailfrom); 
                                            // 设置邮件回复人地址和名称
$mail->Subject    = '客户咨询';                     // 设置邮件标题
$mail->AltBody    = "为了查看该邮件，请切换到支持 HTML 的邮件客户端"; 
                                            // 可选项，向下兼容考虑
$mail->MsgHTML($mailbody);                         // 设置邮件内容
$mail->AddAddress($mailto, "华睿慧脑");
//$mail->AddAttachment("images/phpmailer.gif"); // 附件 
if(!$mail->Send()) {
    echo "发送失败：" . $mail->ErrorInfo;
} else {
    echo "恭喜，邮件发送成功！";
}exit();
?>