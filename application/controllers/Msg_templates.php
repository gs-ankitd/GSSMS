<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msg_templates extends CI_Controller {
	 function __construct() 
    {       
         parent:: __construct();
		 $this->load->helper(array('form','url'));
		
		 // Create an instance of the user model
       $this->load->model('templates_m');  
	//	 $this->output->enable_profiler(TRUE);
    }
	
	public function index()
	{
		
	}
	
	public function getmessage()
	{
		//$templates = array();
		
		$templates=$this->templates_m->get_templates();	

if (count($templates) > 0) {
   echo json_encode(array('success' => true, 'templates' => $templates));	
} else {
    echo json_encode(array('success' => false));
}
	}
	
	function changetemplate(){
   if (isset($_POST["template"]) && !empty($_POST["template"])) { //Checks if action value exists
               $template_id= $_POST["template"];
					$template_msg=$this->templates_m->get_template($template_id);	
					  

					if ($template_msg) {
						
						echo json_encode(array('success' => true, 'template' => $template_msg));

					}
					else{
						
						 echo json_encode(array('success' => false));
					}
}
}
	
	
}
?>