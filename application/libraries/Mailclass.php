<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Mailclass{
	
	
	 public function __construct()
    {
       
		
		
    }
	/*
	public function index()
	{
		$CI =& get_instance();

		
		$from_email=$this->get_mail_from();
	}

    function get_mail_type()
	{
		$CI =& get_instance();
		$mailsetting=$CI->setting_model->get_mail_setting();
		if($mailsetting['mail_method']=='mail')
			return 'mail';
		else
			return 'smtp';
	}
	
	function get_mail_from()
	{
		$CI =& get_instance();
		$mailsetting=$CI->setting_model->get_mail_setting();
		if($mailsetting['mail_from']=='' || $mailsetting['mail_from']==NULL || empty($mailsetting['mail_from']))
		{
			$from_email='webmaster@gsteckno.com';
		}
		else
		{
			$from_email=$mailsetting['mail_from'];
		}
		return $from_email;
	}
	
	function get_mail_fromname()
	{
		$CI =& get_instance();
		$mailsetting=$CI->setting_model->get_mail_setting();
		if($mailsetting['mailfromname']=='' || $mailsetting['mailfromname']==NULL || empty($mailsetting['mailfromname']))
		{
			$from_name='SmsApp';
		}
		else
		{
			$from_name=$mailsetting['mailfromname'];
		}
		return $from_name;
	}
	
	function get_smtp_host()
	{
		$CI =& get_instance();
		$mailsetting=$CI->setting_model->get_mail_setting();
		if($mailsetting['mail_host']=='' || $mailsetting['mail_host']==NULL || empty($mailsetting['mail_host']))
		{
			$smtphost='mail@gsteckno.com';
		}
		else
		{
			$smtphost=$mailsetting['mail_host'];
		}
		return $smtphost;
	}
	
	function get_smtp_user()
	{
		$CI =& get_instance();
		$mailsetting=$CI->setting_model->get_mail_setting();
		if($mailsetting['mail_user']=='' || $mailsetting['mail_user']==NULL || empty($mailsetting['mail_user']))
		{
			$smtpuser='webmaster@gsteckno.com';
		}
		else
		{
			$smtpuser=$mailsetting['mail_user'];
		}
		return $smtpuser;
	}
	
	function get_smtp_pass()
	{
		$CI =& get_instance();
		$mailsetting=$CI->setting_model->get_mail_setting();
		if($mailsetting['mail_pass']=='' || $mailsetting['mail_pass']==NULL || empty($mailsetting['mail_pass']))
		{
			$smtppass='Web1010*';
		}
		else
		{
			$smtppass=$mailsetting['mail_pass'];
		}
		return $smtppass;
	}
	
	
	function php_mail($to_email,$subject,$msg)
	{
		$from_email=$this->get_mail_from();
		$from_display=$this->get_mail_fromname();
		
		$config['mailtype'] = 'html';
		$this->load->library('email',$config);
		
    	$this->email->from($from_email, $from_display);
    	$this->email->to($to_email);


    	$this->email->subject($subject);
	    $this->email->message($msg);
    		
			if($this->email->send())
    		{
				return true;
    		}
	   		else
   			{
				return false;
	   		}
	
	}*/
	
	/*function smtp_mail($smtphost,$smtpuser,$smtppass,$from_email,$from_display,$to_email,$subject,$msg)
	{
		$config = Array(  
			'smtp_host' => $smtphost,  
			'smtp_user' => $smtpuser, 
			'smtp_pass' => $smtppass,
			'mailtype' => 'html'
			);
		
		$this->load->library('email',$config);
    	$this->email->from($from_email, $from_display);
    	$this->email->to($to_email);
    	$this->email->subject($subject);
	    $this->email->message($msg);
    		
			if($this->email->send())
    		{
				return true;
    		}
	   		else
   			{
				return false;
	   		}
	}*/
	
	function smtp_mail($to_email,$subject,$msg)
	{
		/*$smtphost=$this->get_smtp_host();
		$smtpuser=$this->get_smtp_user();
		$smtppass=$this->get_smtp_pass();
		$from_email=$this->get_mail_from();
		$from_display=$this->get_mail_fromname();
		*/
		$smtphost='mail@gsteckno.com';
		$smtpuser='webmaster@gsteckno.com';
		$smtppass='Web1010*';
		$from_email='webmaster@gsteckno.com';
		$from_display='SYSADMIN';
		$config = Array(  
			'smtp_host' => $smtphost,  
			'smtp_user' => $smtpuser, 
			'smtp_pass' => $smtppass,
			'mailtype' => 'html'
			);
		$ci =& get_instance();
		$ci->load->library('email',$config);
    	$ci->email->from($from_email, $from_display);
    	$ci->email->to($to_email);
    	$ci->email->subject($subject);
	    $ci->email->message($msg);
    		
			if($ci->email->send())
    		{
				return true;
    		}
	   		else
   			{
				return false;
	   		}
	}

	function sendMail($data_mail,$data_variables,$varname)
	{
			
		    $CI =& get_instance();
	        $CI->load->model('email_templates_m'); 	
			$mailtemplate=$CI->email_templates_m->get_mail_template($varname);
			$msg = str_replace($data_variables, $data_mail, $mailtemplate['message_body']);
			
			$mail=$this->smtp_mail($data_mail['email'],$mailtemplate['subject'],$msg);
			if($mail){
				return true;
					}else{
				return false;
					}
		
	}
	
}

/* End of file Mailclass.php */