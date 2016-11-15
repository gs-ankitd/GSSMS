<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Singlesms extends CI_Controller {
	 function __construct() 
    {       
         parent:: __construct();
		 $this->load->helper(array('form','url','sendsms'));
		
		 // Create an instance of the user model
       $this->load->model('user_m'); 
       $this->load->model('smsmaster_m');  
	//	 $this->output->enable_profiler(TRUE);
    }
	
	public function index()
	{
		

		$this->load->view('common/innerheader');
		$this->load->view('sms/singlesms');
		$this->load->view('common/footer.php');
	}
	
	public function sendsinglesms()
	{
      $session_org= $this->session->userdata('organisation');
      
      $smslogindata=$this->user_m->get_sms_login($session_org);
      
      $name=$_POST['name'];
      $number=$_POST['recipient_no'];
		$msg=$_POST['message'];
		$delayuntil=null;
		//echo $smslogindata->text_username;
		$status = sendSMS($smslogindata->text_username, $smslogindata->text_password,$smslogindata->gen_key,$smslogindata->sender_id,trim($number),$msg,$delayuntil);
		ob_get_clean(); 
       $pos = strpos($status, 'MessageId');
      
      									if ($pos === false)
											{
											$option1="Failed";
											$status_msg="Failed";
											$reason=$status;
										//	echo "<pre>Messages Sending failed.";
											$this->session->set_flashdata('success', 'Message sending failed!');
											}
											else
											{
											$option1='Success';
											$status_msg="Sent";
											$reason='Success';
										//	echo "<pre>Message was Successfully Send ";
										   $this->session->set_flashdata('success', 'Message send successfully!');
											}
											
      $savedetails=$this->smsmaster_m->insert($smslogindata->text_username, $name,trim($number),$msg,$delayuntil,$status_msg,$reason,$batch=null,$type='Single'); 
      
       redirect('Singlesms', 'refresh'); 
	}
	
	
}
?>