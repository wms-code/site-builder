<?php
/**
 * Codeigniter Bootstrap
 * -------------------------------------------------------------------
 * Developed and maintained by Stijn Geselle <stijn.geselle@gmail.com>
 * -------------------------------------------------------------------
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    public function index() {
        $this->template->set('title', 'My website');
        $this->template->load('layouts/main', 'home');
    }
	
	public function build()	{
		$arg = $this->uri->segment(2);
		$data['filecontents'] = "";
		$doc = new DOMDocument();
		$pagetitle = $this->input->post('mytitle');
		
		if($arg!="")
		{
			$page = base_url().'themes/infocus/'.$this->uri->segment(2).'.html';
			$data['filecontents'] = file_get_contents($page,FILE_USE_INCLUDE_PATH);
			$doc->loadHTML($data['filecontents']);
			$data['mytitle'] = $doc->getElementsByTagName("title")->item(0)->textContent;
						
			if($pagetitle)
			{
				$writepage = 'themes/infocus/'.$this->uri->segment(2).'.html';
				$parent = $doc->getElementsByTagName("title")->item(0);
				$newchild = $doc->createTextNode($pagetitle);
				$parent->replaceChild($newchild, $parent->firstChild);
				$doc->saveHTMLFile($writepage);
				$data['mytitle'] = $pagetitle;
			}		
		
		}
		
		$this->template->set('title','Website builder');
		$this->template->load('layouts/main','build',$data);
	}
	
	public function titlechange()
	{
	
	 $this->template->set('title','Change Title');
	 $this->template->load('layouts/main','titlechange');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
