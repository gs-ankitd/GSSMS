<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Addressbook_m extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getContactlist() {
		$this -> db -> from('contacts');
		$this -> db -> order_by("id", "DESC");
		$result = $this -> db -> get() -> result();

		foreach ($result as $row) {

			$contacts[] = array('id' => $row -> id, 'full_name' => $row -> full_name, 'email' => $row -> email, 'phone' => $row -> phone, 'address' => $row -> address);
		}
		$contactsgroup = array();
		$query = $this -> db -> query("SELECT ug.group_id,g.group_name, GROUP_CONCAT(u.full_name ORDER BY u.id ASC SEPARATOR ',') AS users
  FROM user_group_list ug
  LEFT JOIN contacts u on u.id=ug.user_id
  LEFT JOIN user_group g on g.id=ug.group_id
  GROUP BY ug.group_id");

		foreach ($query->result() as $row) {
			$contactsgroup[] = array('group_id' => $row -> group_id, 'group_name' => $row -> group_name, 'users' => $row -> users);

		}

		if (count($contacts) > 0) {
			if (count($contactsgroup) > 0) {

				echo json_encode(array('success' => true, 'contacts' => $contacts, 'groups' => true, 'contactsgroup' => $contactsgroup));
			} else {
				echo json_encode(array('success' => true, 'contacts' => $contacts));
			}
		} else {
			echo json_encode(array('success' => false));
		}

	}

	function addNewContact($full_name, $email, $phone, $address) {
		$data = array('full_name' => $full_name, 'email' => $email, 'phone' => $phone, 'address' => $address);
		return $this -> db -> insert('contacts', $data);
	}

	function updateContact($id, $full_name, $email, $phone, $address) {
		$data = array('full_name' => $full_name, 'email' => $email, 'phone' => $phone, 'address' => $address);
		$this -> db -> where('id', $id);
		$this -> db -> update('contacts', $data);
		return $this -> db -> affected_rows();
	}
	
	function updateGroup($grp_id,$grp_name,$users) {
		$insert_id = 0;
		
		$data = array('group_name' => $grp_name);
		$this -> db -> where('id', $grp_id);
		$this -> db -> update('user_group', $data);
		$insert_id =+ $this -> db -> affected_rows();
		
		$this->db->where('group_id',$grp_id);
		$query=$this->db->get('user_group_list')->result();
		$oldData = array();
		foreach($query as $row){
			$oldData[] = $row->user_id;
		}
		if(!in_array($users,$oldData))
			{
				//echo "<br>grp id".$grp_id."<br>";
				
				
				$result=array_diff($oldData,$users);
				//print_r($result);
				foreach($result as $userid){
					$this -> db -> where('user_id', $userid);
					$this -> db -> where('group_id', $grp_id);
					$this -> db -> delete('user_group_list');
					$insert_id =+ $this->db->affected_rows(); 
					} 
				
			}
		//var_dump($oldData);
		
		
		for($i=0;$i<count($users);$i++){
			$newUsers = $users[$i];
			if(!in_array($newUsers,$oldData))
			{
				//echo "<br>not in array".$ObjAttrbtPrevileges_Id;
				$data = array(
							
							'user_id' => $newUsers,
							'group_id'  => $grp_id 
							
						
							
						);
				$this->db->insert('user_group_list', $data);
				$insert_id =+ $this->db->insert_id();
			}
			
		} 
		return $insert_id;

	}

	function getContactById($id) {
		$this -> db -> select('*');
		$this -> db -> from('contacts');
		$this -> db -> where('id', $id);
		$query = $this -> db -> get() -> result();
		if (count($query) > 0) {

			echo json_encode(array('success' => true, 'contacts' => $query));
		} else {
			echo json_encode(array('success' => false));
		}
	}

	function getGroupById($id) {
		$contactsgroup = array();
		$query = $this -> db -> query("SELECT ug.group_id,g.group_name, GROUP_CONCAT(u.id ORDER BY u.id ASC SEPARATOR ',') AS user_ids
  FROM user_group_list ug
  LEFT JOIN contacts u on u.id=ug.user_id
  LEFT JOIN user_group g on g.id=ug.group_id
  WHERE ug.group_id=" . $id . "
  GROUP BY ug.group_id");

		foreach ($query->result() as $row) {
			$contactsgroup[] = array('group_id' => $row -> group_id, 'group_name' => $row -> group_name, 'user_ids' => $row -> user_ids);

		}

		if (count($contactsgroup) > 0) {

			echo json_encode(array('success' => true, 'groups' => true, 'contactsgroup' => $contactsgroup));
		} else {
			echo json_encode(array('success' => false));
		}

	}

	function addNewGroup($group_name, $users) {

		$this -> db -> insert('user_group', array('group_name' => $group_name));
		$group_id = $this -> db -> insert_id();
		if ($group_id > 0) {

			foreach ($users as $user) {
				$data = array('user_id' => $user, 'group_id' => $group_id);
				$this -> db -> insert('user_group_list', $data);
			}
			return true;
		}
		return false;

	}

	function get_templates() {

		$this -> db -> from('message_templates');
		$this -> db -> order_by("id", "asc");
		$result = $this -> db -> get() -> result();
		//	print_r($result);

		foreach ($result as $row) {

			$templates[] = array('id' => $row -> id, 'template_name' => $row -> name, 'template_msg' => $row -> message);
		}
		return $templates;

	}
	

	function deleteContact($contact_id) {

		$this -> db -> where('user_id', $contact_id);
		$res = $this -> db -> delete('user_group_list');
		if ($res) {
			$this -> db -> where('id', $contact_id);
			$row = $this -> db -> delete('contacts');

			return $row;
		}
	}

	function deleteGroup($id) {

		$this -> db -> where('group_id', $id);
		$row = $this -> db -> delete('user_group_list');

		if ($row) {
			$this -> db -> where('id', $id);
			return $row = $this -> db -> delete('user_group');
		}

	}

}
?>