<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use app\Base;

class MALL extends Base
{
	protected $mail_smtp_host;
	protected $mail_smtp_port;
	protected $mail_smtp_user;
	protected $mail_smtp_pass;
	protected $mail_verify_type;
	protected $mail_from;
	protected $mail_from_name;

	protected $mail;

	public function __construct($web_config)
    {
		$this->mail_smtp_host = $web_config['mail_smtp_host'];
		$this->mail_smtp_port = $web_config['mail_smtp_port'];
		$this->mail_smtp_user = $web_config['mail_smtp_user'];
		$this->mail_smtp_pass = $web_config['mail_smtp_pass'];
		$this->mail_verify_type = $web_config['mail_verify_type'];
		$this->mail_from = $web_config['mail_from'];
		

		$mail = new PHPMailer(true);
		//Server settings
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = $this->mail_smtp_host;                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = $this->mail_smtp_user;                     //SMTP username
		$mail->Password   = $this->mail_smtp_pass;                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = $this->mail_smtp_port;           //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		
		//Recipients
		$mail->setFrom($this->mail_from, $this->mail_from_name);

		$this->mail = $mail;

	}
    public function send_code($address,$type)
    {
		$this->mail->addAddress($address);               //Name is optional

		//Content
		$this->mail->isHTML(true);                    //Set email format to HTML
		$this->mail->Subject = '验证码';

		$code = mt_rand(1000,9999);
		// message
		switch ($type){
			case 'register':
				$message = "<p>您的注册验证码是</p><h1>$code</h1>";
				break;  
			case 'setpwd':
				$message = "<p>您的重置验证码是</p><h1>$code</h1>";
				break;
			default:
				$message = "<p>您的验证码是</p><h1>$code</h1>";
		}

		$this->mail->Body   = $message;
		$this->mail->send();
		//写入数据库

		return true;
    }
}
