<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_m extends CI_Model {


    var $details;
	 function __construct() 
    {       
         parent:: __construct();
	}

    function validate_user( $uname, $password ) {
        // Build a query to retrieve the user's details
        // based on the received username and password
        $this->db->from('sms_user_details');
        $this->db->where('username',$uname );
        $this->db->where( 'password', $password);
		  $this->db->where( 'Activation', NULL);
        $login = $this->db->get()->result();

        // The results of the query are stored in $login.
        // If a value exists, then the user account exists and is validated
        if ( is_array($login) && count($login) == 1 ) {
            // Set the users details into the $details property of this class
            $this->details = $login[0];
            // Call set_session to set the user's session vars via CodeIgniter
            
            $this->set_session();

            return true;
        }else{

        return false;
		}

		}

    function set_session() {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.
        
        $this->session->set_userdata( array(
                'id'=>$this->details->id,
				    'username'=>$this->details->username,
                'name'=> $this->details->name,
                'email'=>$this->details->email,
                'organisation'=>$this->details->organisation,
                'isLoggedIn'=>true
            )
        );
     
    }

    function  create_new_user( $data ) {
      return $this->db->insert('sms_user_details',$data);
    }

    public function update_tagline( $user_id, $tagline ) {
      $data = array('tagline'=>$tagline);
      $result = $this->db->update('user', $data, array('id'=>$user_id));
      return $result;
    }

    private function getAvatar() {
      $avatar_names = array();

      foreach(glob('assets/img/avatars/*.png') as $avatar_filename){
        $avatar_filename =   str_replace("assets/img/avatars/","",$avatar_filename);
        array_push($avatar_names, str_replace(".png","",$avatar_filename));
      }

      return $avatar_names[array_rand($avatar_names)];
    }
	
	function check_email_availablity()
	{
    $email = trim($this->input->post('email'));
	$email = strtolower($email);	
	
	$query = $this->db->query('SELECT * FROM sms_user_details where email="'.$email.'"');
	
	if($query->num_rows() > 0)
	return false;
	else
	return true;
	}
	
	function check_username_availablity()
	{
    $username = trim($this->input->post('username'));
	$username = strtolower($username);	
	
	$query = $this->db->query('SELECT * FROM sms_user_details where username="'.$username.'"');
	
	if($query->num_rows() > 0)
	return false;
	else
	return true;
	}
	
	function activate_user($email,$key){
		
        $user = $this->db->query('SELECT * FROM `sms_user_details` where email="'.$email.'" AND Activation="'.$key.'"');
		
        // The results of the query are stored in $login.
        // If a value exists, then the user account exists and is validated
        if (count($user) == '1' ) {
			$this->db->where('email', $email);
			$this->db->where('Activation', $key);
			$this->db->update('sms_user_details', array('Activation' => NULL)); 
		    return true;
        }else{
			return false;
		}

		
	}
	
	function get_sms_login($org){
		
        $sms_login = $this->db->query('SELECT * FROM `Sms_Login` where organisation="'.$org.'"');
		
        // The results of the query are stored in $login.
        // If a value exists, then the user account exists and is validated
        if (count($sms_login) == '1' ) {
		    return $sms_login->row();
        }else{
			return false;
		}

		
	}
	
	public function getusername($userid) {
		
		$contacts = $this->db->query('SELECT * FROM `contacts` where id="'.$userid.'"')->row();
		
      return $contacts->full_name;
    }
	
	public function getgroups($username) {
		
		$contacts = $this->db->query('SELECT * FROM `user_group` where username="'.$username.'"')->result();
		
			/*foreach($result as $row)
			{
	print_r($row);
			$contacts= (
        'id' => $row['id'], 
        'group_name' => $row['group_name']
   		 );
			}	*/
		
      return $contacts;
    }
	
	 public function getgroupusers($groupid) {
		
		$groupusers = $this->db->query("Select c.phone,ug.group_id,ug.user_id as uid from contacts c LEFT JOIN user_group_list ug on ug.user_id=c.id where group_id='".$groupid."'")->result();
		
		
			foreach($groupusers as $row)
			{
	//print_r($row);
			 $usercontacts[] =  array(
			 'phone'=>$row->phone,
			 'userid'=>$row->uid
			 );
			 
			 
			}	
		/*$contacts=implode(",",$usercontacts);
		$contactids=implode(",",$usercontactids);*/
		
      return $usercontacts;
    }
}
?>