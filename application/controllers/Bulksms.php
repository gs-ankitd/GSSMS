<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bulksms extends CI_Controller {
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
		$this->load->view('sms/bulksms');
		$this->load->view('common/footer.php');
	}
	
	public function sendbulksms()
	{
		
		$session_org= $this->session->userdata('organisation');
      
      $smslogindata=$this->user_m->get_sms_login($session_org);
      
      
      $batchno=$this->smsmaster_m->get_batch($smslogindata->text_username);
		
		//Configure
		//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
		$config['upload_path'] = 'application/views/uploads/';
		
    // set the filter image types
		$config['allowed_types'] = 'xlsx|csv';
		
		//load the upload library
		$this->load->library('upload', $config);
    
      $this->upload->initialize($config);
    
      $this->upload->set_allowed_types('*');

		$data['upload_data'] = '';
    
		//if not successful, set the error message
		if (!$this->upload->do_upload('userfile')) {
			$data = array('msg' => $this->upload->display_errors());

		} else { //else, set the success message
			$data = array('msg' => "Upload success!");
      
      $data['upload_data'] = $this->upload->data();

		}
		$path = $data['upload_data']['full_path'];
		$extension= $data['upload_data']['file_ext'];
		$filename= $data['upload_data']['raw_name'];

      $this->smsmaster_m->insert_batch($smslogindata->text_username,$filename,$batchno);
		
		//if(strcmp($extension,".csv") >= 0){
		if($extension==".csv"){
		$this->load->library('csvreader');
      $result =   $this->csvreader->parse_file($path);//path to csv file

      $csvData =  $result;
        
		
		  foreach($csvData as $field=>$value){
		  	$name=$value['Name'];
			$number=$value['Phone'];
		  	
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
											
      $savedetails=$this->smsmaster_m->insert($smslogindata->text_username, $name,trim($number),$msg,$delayuntil,$status_msg,$reason,$batchno,$type='Bulk');
		  	
		  	
		  	
		  	
		  	
		  	}
		  	}
		elseif($extension==".xlsx"){
		$this->load->library('excel');
 
		//read file from path
		$objPHPExcel = PHPExcel_IOFactory::load($path);
 
		//get only the Cell Collection
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

		//extract to a PHP readable array format
		foreach ($cell_collection as $cell) {
  	   $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
      $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
      $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
 
    	//header will/should be in row 1 only. of course this can be modified to suit your need.
      if ($row == 1) {
        $header[$row][$column] = $data_value;
    	} else {
        $arr_data[$row][$column] = $data_value;
    	}
		}
 		//ob_end_clean();
		//send the data in an array format
		$data['header'] = $header;
		$datavalues = $arr_data;
			
		foreach($datavalues as $field=>$value){
			
			$name=$value['A'];
			$number=$value['B'];
		  	
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
											
      $savedetails=$this->smsmaster_m->insert($smslogindata->text_username, $name,trim($number),$msg,$delayuntil,$status_msg,$reason,$batchno,$type='Bulk');
			
			}
		}
	}
	
	
}
?>