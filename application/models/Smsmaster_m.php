<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Smsmaster_m extends CI_Model {


	 function __construct() 
    {       
         parent:: __construct();
	}

    function insert($username,$name,$number,$msg,$delayuntil,$status,$reason,$batch,$type) {
       if($delayuntil){
       $timestamp=$delayuntil;
       }else{
       $timestamp=date("Y-m-d H:i:s"); 
       }
       $data = array(
   					'username' =>$username,
   					'recipient' => $name,
					   'mobile_no' => $number,
   					'timestamp' => $timestamp,
   					'message' => $msg,
						'status' => $status,
						'reason' => $reason,
						'batch_no' => $batch,
						'type' =>  $type
					    
						 );  
		$this->db->insert('sms_master', $data); 	

		}
		
		function get_batch($Username) {
			
	    $this->db->from('batch_master');
       $this->db->where('username',$Username );
       $numrows = $this->db->get()->num_rows();			
		
		 $batchno=$numrows+1;	
		 return $batchno;
		}
		
		
		function insert_batch($Username,$filename,$batch_no) {
			
	    $data = array(
   					'username' =>$Username,
   					'filename' => $filename,
					   'batch_no' => $batch_no,
   					'timestamp' => date('Y-m-d H:i:s')
					    
						 );  
		$this->db->insert('batch_master', $data); 
		}

    
	
}
?>