<?php 
    #! /bin/bash
    require_once('PHPMailer/class.phpmailer.php'); //导入PHPMAILER类  
    function SendConf ($name, $email) {
    $mail = new PHPMailer(); //创建实例  
    $mail -> CharSet='utf-8'; //设置字符集  
    $mail -> SetLanguage('ch','include/PHPMailer/language/');  //设置语言类型和语言文件所在目录            
    $mail -> IsSMTP(); //使用SMTP方式发送  
    $mail -> SMTPAuth = true; //设置服务器是否需要SMTP身份验证    
    $mail -> Host = 'smtp.163.com'; //SMTP 主机地址    
    $mail -> Port = '25'; //SMTP 主机端口  
    $mail -> From = '18193673408@163.com'; //发件人EMAIL地址  
    $mail -> FromName = '杨啖'; //发件人在SMTP主机中的用户名    
    $mail -> Username = '18193673408@163.com'; //发件人的姓名    
    $mail -> Password = 'th000199511'; //发件人在SMTP主机中的密码    
    $mail -> Subject = '调剂询问+杨啖+北邮网络工程+317+原报5组+803'; //邮件主题    
    $mail -> AltBody = 'text/html'; //设置在邮件正文不支持HTML时的备用显示  
    $mail -> Body = '<h3>'.$name.'老师:</h3>
                     <h4>      抱歉</h4>
                     <p>       愚生从网研院官网爬取了所有导师的联系方式，脚本发送,超过三天未回复，(源码地址:)。愚生自动撤离您的账号。不再打扰。想必老师您已经被大家的调剂邮件狂轰乱炸，愚生实在不知道用别的好办法能引起您的注意，实属抱歉</p>
                     <p>       愚生12年本科毕业。之前在腾讯写爬虫、后来在face++（人脸识别）做后台研发，经历了一部分工程履历后，感悟到做工程,做业务的门槛不高，容易被别人替代，正是这一年的工作经历，让我决心读研深造，希望自己可以在算法上一定接触，在以后的工作中不容易被代替。</p>
                     <p>       可是今年考研成绩不理想，只有317，但是愚生仍然不想放弃本次机会，特此斗胆写程序惊扰到您，个人认为自己的工程能力强于普通的应届毕业生,所以厚着脸皮的毛遂自荐。打扰到老师，实属抱歉，如果老师能给一个机会，学生不胜感激。但如果实属强人所难，还望老师海涵。</p>
                     <p>       简历附下</p>';//邮件内容做成  
    $mail -> IsHTML(true);  //是否是HTML邮件  
    $mail -> AddAddress($email, 'yangdan'); //收件人的地址和姓名    
    $mail -> AddReplyTo('bupt-steven@foxmail.com', 'yangdan'); //收件人回复时回复给的地址和姓名  
    $mail -> AddAttachment('个人简历.pdf');//附件的路径和附件名称  
    if(!$mail -> Send()) //发送邮件    
        var_dump($mail -> ErrorInfo);  //查看发送的错误信息  
    }
    //$name = '杨啖';
    //$email = 'yangdan@mxtrip.cn';
    //SendConf($name,$email);
?> 
