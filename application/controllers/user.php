<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('user_model');
		
	}
	
	//Redirect to LOGIN page
	public function index() 
	{
		$target = base_url()."user/login";
		header("Location: ".$target);
	}
	
	//Load the user LOGIN page
	public function login() 
	{
		$this->load->view('login');
	}

	//Load the User new registration page
	public function register() {

		$this->load->view('register');
	}

	
	/**
	 * Calls when new user register and verifies the values in user_model 
	 * @return [type] [description]
	 */
	public function regsubmit() 
	{
		
		if(!$this->user_model->create_user())
		{
			$this->load->view('register');	
		}	

	}
	
	/**
	 * verifies the user login  
	 * @param  string $username [valid user email which was registered]
	 * @param  string $password [user password]
	 * @return [type]           [description]
	 */
	public function auth($username="",$password="")
	{
		//verifies whether it has been called and uses the value else takes the post value
		if(""==$username AND ""==$password)
		{
			$username=$this->input->post('username');
			$password = md5(base64_encode($this->input->post('password')."WmS"));
		}

		//authorises the user and create session in model
		if($this->user_model->auth_user($username,$password))
		{
			$target = base_url() . 'home';
			header("Location: ". $target);
		}
		else
		{
			$target= base_url().'user';
			header("Location: " . $target);
		}


	}

	/**
	 * [logout the user and redirect to home]
	 * @return [type] [description]
	 */
	public function logout()
	{      
		$target= base_url();	
		$this->session->unset_userdata('userloggedin');		
		$this->session->sess_destroy();	
		redirect($target,'refresh');		

	}

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
