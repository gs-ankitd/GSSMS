<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sendSMS')){
   function sendSMS($username, $password, $genkey, $sender, $number, $message ,$delayuntil){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
      // $ci->load->database();
       
       //get data from database
       //$query = $ci->db->get_where('users',array('id'=>$id));
       
      /* if($query->num_rows() > 0){
           $result = $query->row_array();
           return $result;
       }else{
           return false;
       }*/
   
   $URL = 'http://www.bulksmsapps.com/apisms.aspx?'.'user='.$username.'&password='.$password.'&genkey='.$genkey;
	$URL .= "&sender=".$sender."&number=".$number."&message=".urlencode($message);
	if($delayuntil){
	$URL .=	"&schdate=".$delayuntil; 
	}
	$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $URL);
curl_setopt($ch,CURLOPT_POSTFIELDS, '');
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
//execute post
$result = curl_exec($ch);
  return $result;
   }
}




?>