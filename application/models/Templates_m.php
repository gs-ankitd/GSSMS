<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Templates_m extends CI_Model {


	 function __construct() 
    {       
         parent:: __construct();
	}

    function get_templates() {
    	
    	
    		$this->db->from('message_templates');
        	$this->db->order_by("id", "asc");
         $result = $this->db->get()->result();
		//	print_r($result);
			
			foreach($result as $row)
			{
	
	$templates[]= array(
        'id' => $row->id, 
        'template_name' => $row->name, 
        'template_msg' => $row->message
   								 );
			}	
 return $templates;

		}
		
		
		function get_template($template_id){
			
			$this->db->from('message_templates');
        	$this->db->where('id',$template_id );
         $template_result = $this->db->get()->result();
					
					foreach($template_result as $row)
					{
						$template_msg= $row->message;
					   
					}  

					return $template_msg;
}
		
		

    
	
}
?>