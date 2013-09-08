<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed'); 

class Edtior_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


public function get_projects()
{
	# code...
	$this->db->where('user_id',$this->session->userdata('user_id'));
	$this->db->where('sitename',$this->uri->segment(3));
	$path = $this->db->get('projects');
	return$path->row();	
	
}

public function base_themepath()
{
	# code...
	$path=$this->edtior_model->get_projects();
	return $path->base_themepath;
}

public function create_page($basepath)
{

	//remove extensions @ User Input
	$filename = preg_replace('@\.([^\.]+)$@', '', $this->input->post('pagename'));
	// string sanitizer for filename 
	$page =preg_replace('/[^a-zA-Z0-9-_\.]/', '',$filename);
	if (""!=$this->input->post('parent')) {
		$fileurl="themes/$basepath/".$this->input->post('parent');	
		$targeturl="userdata/".USERNAME."/".$this->uri->segment(3)."/".$page.".html";	
		if (file_exists($fileurl)) 
		{
			if( @copy( $fileurl, $targeturl ))	
			{
				$target = base_url()."edit/".SALT ."/" .$this->uri->segment(3)."/".$page.".html";
				header("Location: " . $target);
			}
			else echo "not copy";
		}else echo $fileurl."file not exits";
	}
	else { 
	//todo:create an empty page
		echo "create an empty page";
	}
	exit(0);

}

public function getfilename($furl)
{

	$this->load->helper('file');
	$extensions = array('html');		
	return get_filenames_by_extension($furl,$extensions,FALSE,TRUE);

}


public function gettitle($fileurl)
{

	if (file_exists($fileurl)) {
		$data['filecontents']= file_get_contents(base_url().$fileurl);
		if (preg_match('/<title>(.+)<\/title>/',$data['filecontents'],$matches) && isset($matches[1] ))
		{
			return $matches[1];	
		}
	}

}

public function puttitle($fileurl,$title)	
{

	$filehead= @file_get_contents($fileurl);
	if (preg_match('/<title>(.+)<\/title>/',$filehead,$matches) && isset($matches[1] ))
		{$oldtitle = '<title>'.$matches[1].'</title>';
	$newtitle='<title>'.$title.'</title>';		
	$filecontents = str_replace($oldtitle,$newtitle,$filehead);
	@file_put_contents($fileurl,$filecontents );
	return TRUE;	}
	else return FALSE;	
}

public function change_title()
{
	foreach ($this->input->post('title') as $key => $value) 			
	{
		$fileurl="userdata/".USERNAME."/".$this->uri->segment(3)."/".$key.".html";
		$title=$this->edtior_model->puttitle($fileurl,$value);
		$target = base_url()."pages/". SALT ."/" .$this->uri->segment(3);
		header("Location: " . $target);
		exit(0);
	}

}


public function page_rename()

{

	$filepath="userdata/".USERNAME."/".$this->uri->segment(3)."/";
			foreach ($this->input->post('page') as $key => $value) {
			//remove all extensions @ User Input
				$filename = preg_replace('@\.([^\.]+)$@', '', $value);
			// string sanitizer for filename 
				$newfile =preg_replace('/[^a-zA-Z0-9-_\.]/', '',$filename).".html";
				$oldfile=$this->input->post('fname').".html";
				$newurl=$filepath.$newfile;			
				$oldurl=$filepath.$oldfile;
				if (file_exists($oldurl)) {
					// if file rename successfuly
					if(@rename($oldurl,$newurl)===true) { 
					  //open include files  
						$menu=$filepath."include/menu.html";
						if (file_exists($menu)) {
							$menupage=@file_get_contents($menu);
							$filecontents = str_replace($oldfile,$newfile,$menupage);
							@file_put_contents($menu,$filecontents );
						}

						$header=$filepath."include/header.html";
						if (file_exists($header)) {
							$headerpage=@file_get_contents($header);
							$filecontents = str_replace($oldfile,$newfile,$headerpage);
							@file_put_contents($header,$filecontents );
						}


						$footer=$filepath."include/footer.html";
						if (file_exists($footer)) {
							$footerpage= @file_get_contents($footer);
							$filecontents = str_replace($oldfile,$newfile,$footerpage);
							@file_put_contents($footer,$filecontents );
						}

					}
					
				}

			}

}




}