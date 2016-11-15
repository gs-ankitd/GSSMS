<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	 function __construct() 
    {       
         parent:: __construct();
		 $this->load->helper(array('form','url'));
		
		 // Create an instance of the user model
       $this->load->model('user_m');  
	//	 $this->output->enable_profiler(TRUE);
    }
	
	public function index()
	{
		

		$this->load->view('common/innerheader');
		$this->load->view('dashboard/dashboard_main');
		$this->load->view('common/footer.php');
	}
	
	
}
?>