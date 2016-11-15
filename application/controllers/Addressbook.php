<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addressbook extends CI_Controller {
	 function __construct() 
    {       
         parent:: __construct();
		 $this->load->helper(array('form','url'));
		
		 // Create an instance of the user model
       $this->load->model('addressbook_m');  
	//	 $this->output->enable_profiler(TRUE);
    }
	
	public function index()
	{
		

		$this->load->view('common/innerheader');
		$this->load->view('sms/addressbook');
		$this->load->view('common/footer.php');
	}
	function loadAddNewContactPage() 
    {       
       $this->load->view('sms/add_new_contact');  
	}
	function loadContactListPage() 
    {       
       $this->load->view('sms/list_contacts');  
	}
	
	function loadCreateGroupPage() 
    {       
       $this->load->view('sms/create_group');  
	}
	
	public function listContacts()
	{
		$contacts=$this->addressbook_m->getContactlist();	
		echo $contacts;
	}
	public function getContactById()
	{
		$contacts=$this->addressbook_m->getContactById($this->input->get('id'));	
		return $contacts;
	}
	
	public function getGroupById()
	{
		$contactsgrp=$this->addressbook_m->getGroupById($this->input->get('id'));	
		return $contactsgrp;
	}
	
	public function addNewContact()
	{
		$full_name = $this->input->get('full_name');
		$email = $this->input->get('email');
		$phone = $this->input->get('phone');
		$address = $this->input->get('address');
		$newContact=$this->addressbook_m->addNewContact($full_name,$email,$phone,$address);	

			if ($newContact) {
			   exit(json_encode(array('success' => true, 'msg' => 'Saved!')));	
			} else {
			   echo json_encode(array(
			    'success' => false, 
			    'msg'     => 'Error has occurred while entering the contacts into DB', 
			    'validationError' => $validationError
			));
			}
	}
	
	public function updateContact()
	{
		$id = $this->input->get('id');
			
		$full_name = $this->input->get('full_name');
		$email = $this->input->get('email');
		$phone = $this->input->get('phone');
		
		$updatedContact=$this->addressbook_m->updateContact($id,$full_name,$email,$phone);	

			if ($updatedContact) {
			   exit(json_encode(array('success' => true, 'msg' => 'Saved!')));	
			} else {
			   echo json_encode(array(
			    'success' => false, 
			    'msg'     => 'Error has occurred while entering the contacts into DB', 
			    'validationError' => $validationError
			));
			}
	}
	
	public function updateGroup()
	{
		$id = $this->input->get('id');
			
		$grp_name = $this->input->get('group_name');
		$users = $this->input->get('users');
		
		
		$updatedGrp=$this->addressbook_m->updateGroup($id,$grp_name,$users);	
//echo $updatedGrp;
			if ($updatedGrp) {
			   exit(json_encode(array('success' => true, 'msg' => 'Saved!')));	
			} else {
			   echo json_encode(array(
			    'success' => false, 
			    'msg'     => 'Error has occurred while entering the contacts into DB' 
			    //'validationError' => $validationError
			));
			}
	}
	
	public function addNewGroup()
	{
		
		
		$group_name = $this->input->get('group_name');
		$users = $this->input->get('users');
		$newContact=$this->addressbook_m->addNewGroup($group_name,$users);	

			if ($newContact) {
			   exit(json_encode(array('success' => true, 'msg' => 'Saved!')));	
			} else {
			   echo json_encode(array(
			    'success' => false, 
			    'msg'     => 'Error has occurred while entering the contacts into DB', 
			    'validationError' => $validationError
			));
			}
	}
	
	public function createNewGroup()
	{
		$full_name = $this->input->get('full_name');
		$email = $this->input->get('email');
		$phone = $this->input->get('phone');
		$address = $this->input->get('address');
		$newContact=$this->addressbook_m->addNewContact($full_name,$email,$phone,$address);	

			if ($newContact) {
			   exit(json_encode(array('success' => true, 'msg' => 'Saved!')));	
			} else {
			   echo json_encode(array(
			    'success' => false, 
			    'msg'     => 'Error has occurred while entering the contacts into DB', 
			    'validationError' => $validationError
			));
			}
	}
	
	public function deleteContact()
	{
		
		$deletedContact=$this->addressbook_m->deleteContact($this->input->get('id'));
		if ($deletedContact) {
    		echo json_encode(array('success' => true));
		} else {
  			echo json_encode(array('success' => false, 'msg' => 'Error has occurred while removing the contacts from DB'));
		}	
	}

	public function deleteGroup()
	{
		
		$deletedGroup=$this->addressbook_m->deleteGroup($this->input->get('id'));
		if ($deletedGroup) {
    		echo json_encode(array('success' => true));
		} else {
  			echo json_encode(array('success' => false, 'msg' => 'Error has occurred while removing the contacts from DB'));
		}	
	}




	
	
	
	
}
?>