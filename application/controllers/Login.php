<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
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
		

		$this->load->view('common/header');
		$this->load->view('login_module/login');
	}
	
	function login_user() {
      

        // Grab the email and password from the form POST
         $uname = $this->input->post('username');
         $pass  = $this->input->post('password');
        
	    //Ensure values exist for email and pass, and validate the user's credentials
       // if( $pass && $uname && $this->user_m->validate_user($uname,$pass)) 
        if( $pass && $uname && $this->user_m->validate_user($uname,$pass)) {
			
            // If the user is valid, redirect to the main view
             redirect('Dashboard'); 
        } else {
			
            // Otherwise show the login screen with an error message.
           echo "false";
        }
    }
	
	public function register()
	{
		$this->load->view('common/header');
		$this->load->view('login_module/register');
	}
	
	public function saveuser()
	{

		$hash = md5( rand(0,1000) );
        // Grab the form fields from the form POST
		 $data = array(
		'name' => $this->input->post('name'),
		'username' => $this->input->post('username'),
        'password'  => $this->input->post('password'),
        'email' => $this->input->post('email'),
        'organisation'  => $this->input->post('organisation'),
		'Activation' => $hash
		);
		
		if ($this->user_m->create_new_user($data))
            {
				 $data_mail=array(
				 'username'=>$data['username'],
				 'email'=>$data['email'],
				 'url'=>site_url().'/login/activate_user/'.$data['email'].'/'.$data['Activation']
				);
				
				$data_variables=array(
				 'username'=>'*user_login*',
				 'email'=>'*user_email*',
				 'url'=>'*user_url*'
				);
				 $this->mailclass->sendMail($data_mail,$data_variables,'User Registration');
				 echo "true";
			} else {
			
				echo "false";
			}
		
	}
	
	function check_email_availablity()
	{
   $email 	= $_REQUEST['email'];
	$get_result = $this->user_m->check_email_availablity($email);
	
	if(!$get_result )
	echo 1;
	else
	echo 0;
	}
	
	function check_username_availablity()
	{
	$username 	= $_REQUEST['username'];	
	$get_result = $this->user_m->check_username_availablity($username);
	
	if(!$get_result )
	echo 1;
	else
	echo 0;
	}
	
	function activate_user($email,$key){
		//urldecode($email);
		if($this->user_m->activate_user(urldecode($email),$key)){
		$this->session->set_flashdata('Success', 'Your Account is activated now.Please login');
        $this->load->view('common/header');
		$this->load->view('login_module/login');
		}else{
		$this->session->set_flashdata('Error', 'Your Account could not be activated.Please contact the service provider.');
        $this->load->view('common/header');
		$this->load->view('login_module/login');
		}
	}
}
?>