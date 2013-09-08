<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed'); 

class Home extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

        // Your own constructor code
		$this->load->model('edtior_model');
		
	}


	public function index()
	{
		$this->template->set('title', 'My website');
		$this->template->load('layouts/main', 'home');
	}
	

	public function menu()
	{

		$this->template->set('title', 'My website');
		$this->template->load('layouts/main', 'menu');
	}


	public function addpage()
	{
		
		if ($this->uri->segment(3)) {
			//Getting the original theme from the DB based on user project.
			$basepath = $this->edtior_model->base_themepath();
		if ($this->input->post('pagename')) 
		{
			 $this->edtior_model->create_page($basepath);			
		}
		$data['files']=$this->edtior_model->getfilename("themes/".$basepath);
		//$this->template->set('title', 'My website',$data);
		$this->load->view('addpage',$data);
		}
		else
		{ 
			echo "error: you must seleect a project after you can add new file <br>";
			echo "<h3>Click the Projects   on the Top Menu.  Open your project Files. after try open new file <br> Note :You Must Choose A Project First </h3>";
		}
	}


	public function pages()
	{
		// Change Title
		if ($this->input->post('title')) 
		{
			$this->edtior_model->change_title();
		}
		//page Rename
		if ($this->input->post('page')) {
		
			$this->edtior_model->page_rename();
			$target = base_url()."pages/". SALT ."/" .$this->uri->segment(3);
			header("Location: " . $target);
			exit(0);
		}

		//Get file name & Date & Page Title as a Array
		if ($this->uri->segment(3)) {
			$data['furl']=$this->uri->segment(3);
			$filename=$this->edtior_model->getfilename("userdata/".USERNAME."/".$data['furl']);
			if($filename === false){
			show_404(); //Pages url  invaild !
		}
		foreach ($filename as  $value) {
			$cdate=get_file_info("userdata/".USERNAME."/".$data['furl']."/$value");			
			$fdate=date ("d/m/Y H:i",$cdate['date']);			
			$fileurl="userdata/".USERNAME."/".$data['furl']."/$value";
			$title=$this->edtior_model->gettitle($fileurl);
			$filename=str_replace(".html","", $value);
			$data['list'][]=array("fdate"=>"$fdate","filename"=>"$filename","title"=>"$title");
		}

		$this->template->set('title', 'My website');
		$this->template->load('layouts/main', 'pages',$data);
	}
}
/**
 * del page 
 * @return [redirect ] [redirect to current project folder]
 */
public function	delpage()
{
	$fileurl='userdata/'.USERNAME."/".$this->uri->segment(3).'/'.$this->uri->segment(4);
	if (file_exists($fileurl)) {
		unlink($fileurl);
		$target = base_url()."pages/".SALT."/".$this->uri->segment(3);
		header("Location: " . $target);
		exit(0);
	}
	else
	{
		// report a bug  file not found
	}

}




public function	edit()
{
	$this->load->library('edtior');
	$data['mytitle'] = "";
	$data['themepath']=$themepath='userdata/'.USERNAME."/".$this->uri->segment(3).'/';
	$filename = $this->uri->segment(4,'index.html');
	$fileurl = $themepath.$filename;
	$data['filecontents']='';
	if($this->input->post('myedit'))
	{
		$content=$this->input->post('myedit');
		if($this->edtior->savepages($content,$fileurl,$themepath))
		{
				
		$target = base_url()."edit/".SALT."/".$this->uri->segment(3)."/".$this->uri->segment(4);
		header("Location: " . $target);
		exit(0);
		}		
		
	}
	

	//note : file_get_contents   must be html htmlspecialchars
	if (file_exists($fileurl) && ""!=$this->uri->segment(3)) {
		$data['filecontents']= htmlspecialchars(file_get_contents(base_url().$fileurl));
		if (preg_match('/<title>(.+)<\/title>/',$data['filecontents'],$matches) && isset($matches[1] ))
			$data['mytitle'] = $matches[1];	

		$files=$this->edtior_model->getfilename('userdata/'.USERNAME."/".$this->uri->segment(3));
		//Split an array into 5 value an array	
		$data['files']=array_chunk($files, 5);		
	}
	
	$this->template->set('title','Website builder');
	$this->template->load('layouts/editpage','edit',$data);
}


	public function browsethemes()
	{
		$this->load->helper('directory');		
	if($this->input->post('sitename'))
		{
			//$host = parse_url($this->input->post('sitename'), PHP_URL_HOST);
			$host= $this->input->post('sitename');
			$host = trim($host, '/');

			// If scheme not included, prepend it
			if (!preg_match('#^http(s)?://#', $host)) {
				$host = 'http://' . $host;
			}
			$urlParts = parse_url($host);
			// remove www
			$host = preg_replace('/^www\./', '', $urlParts['host']);

			$host = str_replace('', '-', $host); // Replaces all spaces with hyphens.
			$sitename = preg_replace('/[^A-Za-z0-9\-\.]/', '', $host);
			
			if(""==$sitename)
			{
				$target = base_url() . "browsethemes";
				header("Location: ". $target);
				exit(0);
			}
			//Verify user directory exists if not create .
			$username = $this->session->userdata('username');
			$userpath = "userdata/" . $username;
			if(!is_dir($userpath))mkdir("userdata/".$username, 0775, true);
			$userpath = $userpath ."/" . $sitename;
			
			$theme_path = "themes/" . $this->input->post('theme_path');

			if(file_exists($theme_path) )
			{
				if(!file_exists($userpath))
				{
					directory_copy($theme_path,$userpath);
					$heads = file_get_contents($theme_path."/include/head.html");
					$heads = str_replace($theme_path, $userpath, $heads);
					file_put_contents($userpath."/include/head.html", $heads);
					$data['user_id'] = $this->session->userdata('user_id');
					$data['sitename'] = $sitename;
					$data['sitedescription'] = $this->input->post('description');
					$data['base_themepath'] = $this->input->post('theme_path');
					//TODO: need to create or update base_path in html  
					if($this->db->insert('projects',$data))
					{
						$target = base_url()."pages/".SALT."/$sitename";
						header("Location: ".$target);
						exit(0);
					}
				}
				else
				{
					//TODO: If project already present WARN user !!
				}
				
			}
			
		}
		$this->template->set('title', 'My website');
		$this->template->load('layouts/main', 'themes');
		
	}




}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
