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
	
	  public function __construct()
       {
            parent::__construct();
            // Your own constructor code
			 
       }

    public function index() {
        $this->template->set('title', 'My website');
        $this->template->load('layouts/main', 'home');
    }
	
	public function build()	{
		//assign variables
		$data='';		
		$data['filecontents'] ='';
		$data['mytitle'] ='';
		$doc = new DOMDocument();		
		$arg = $this->uri->segment(2);
		$pagetitle = $this->input->post('mytitle');
		
		if($arg!=" ")		
		{		
			$page = base_url().'themes/infocus/'.$this->uri->segment(2).'.html';

			$data['filecontents'] = file_get_contents($page);
			$doc->loadHTML($data['filecontents']);
			//check  head tag avail...
			if($doc->getElementsByTagName("head")->item(0))
				{
				//check if title tag available
				if($doc->getElementsByTagName("title")->item(0) && $pagetitle)
				{
				$data['mytitle'] = $doc->getElementsByTagName("title")->item(0)->textContent;
				$writepage = 'themes/infocus/'.$this->uri->segment(2).'.html';
				$parent = $doc->getElementsByTagName("title")->item(0);
				$newchild = $doc->createTextNode($pagetitle);
				$parent->replaceChild($newchild, $parent->firstChild);
				$doc->saveHTMLFile($writepage);
				$data['mytitle'] = $pagetitle;
				}
				else if($pagetitle)
				{
					
					echo "('This html document does not have header', 'page:home.php function:build.')";
					exit();
				}
			
			}
			elseif($doc->hasChildNodes())
			{
			
			
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
