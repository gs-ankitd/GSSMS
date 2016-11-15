<?php


class Email_Templates_m extends CI_Model {

    var $details;

	 function __construct() 
    {       
         parent:: __construct();
	}

    function get_mail_template( $varname ) {
        // Build a query to retrieve the email template's details
        // based on the received template name
       $query = $this->db->query("Select * from email_templates where template_name='$varname'");

	   return	$row = $query->row_array();    
		
	}

}
?>