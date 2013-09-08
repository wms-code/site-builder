<?php

abstract class MY_Controller extends CI_Controller {


    
    public function __construct() {
	 // check if admin, else redirect to login
        parent::__construct();
		$this->load->library('session');		
			if (!$this->session->userdata('userloggedin'))
			{	
			 $target= base_url().'user';
			 header("Location: " . $target);				
			 exit();
			}
       
    		//SALT is used as a user encryption code in URL
    		define("SALT",$this->session->userdata('salt'));
		
			//Get the list of user projects. It is directly used in views.
			$this->db->where('user_id',$this->session->userdata('user_id'));
			$data1 = $this->db->get('projects');
			$data = array();
			foreach ($data1->result_array() as $value) {
				$data[] = $value['sitename'];
			}
				define('PROJECTS',serialize($data));
				define('USERNAME',$this->session->userdata('username'));
        }

    	

}