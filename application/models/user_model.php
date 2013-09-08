<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed'); 

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    /**
     * [Get the value from user registration page, validates and call login page, if verification success. ]
     * @return [type] [description]
     */
    public function create_user()
    {
			
		$this->form_validation->set_rules('email','Email-ID','trim|required|valid_email|is_unique[user.email]|xss_clean');
		$this->form_validation->set_rules('username','User-Name','trim|required|min_length[5]|is_unique[user.username]|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]|max_length[30]|xss_clean');
		
		if($this->form_validation->run()==FALSE){
			return FALSE;
		}
		else
		{
			$data = $this->input->post();
			$data['password'] = md5(base64_encode(($this->input->post('password')."WmS")));
			$data['salt'] = md5(base64_encode($this->input->post('username')));

			if($this->db->insert('user',$data))
			{
				$this->auth($data['username'],$data['password']);
			}
			else
			{ /* log error if db insert fails */ }
		}
	}

	/**
	 * [authenticates the user by email,password and sets the session if user is valid]
	 * @param  [string] $username [valid email address of the user]
	 * @param  [string] $password [valid encrypted password]
	 * @return [boolean]        [returns true if success else return false]
	 */
	public function auth_user($username,$password)
	{

		$this->db->where('username =',$username);
		$this->db->where('password =', $password);
		$res = $this->db->get('user');
		   //$res = $this->db->query('select * from user where username = "' . $username .'" AND password = "' . $password . '"');
		if($res->num_rows()>0)
		{
			$row = $res->row();
			$userid=$row->user_id;
			$username = $row->username;
			$email = $row->email;	
			$salt = $row->salt;	
			$userloggedin = array(
				'userloggedin'=>true,
				'user_id'     => $userid,
				'salt'     => $salt,
				'username' => $username,
				'email' => $email);

			$this->session->set_userdata($userloggedin);
			return TRUE;
		}
		else
		{
			return FALSE;
		}

	}



}