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
	
	function fetchUrl($uri) {
    $handle = curl_init();

    curl_setopt($handle, CURLOPT_URL, $uri);
    curl_setopt($handle, CURLOPT_POST, false);
    curl_setopt($handle, CURLOPT_BINARYTRANSFER, false);
    curl_setopt($handle, CURLOPT_HEADER, true);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 10);

    $response = curl_exec($handle);
    $hlength  = curl_getinfo($handle, CURLINFO_HEADER_SIZE);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    $body     = substr($response, $hlength);

    // If HTTP response is not 200, throw exception
    if ($httpCode != 200) {
        throw new Exception($httpCode);
    }

    return $body;
	}
	public function build()	{
		if($this->input->post('myedit'))
		{
		echo "done";
		}
		else
		{
			//assign variables
			$data='';		
			$data['filecontents'] ='';
			$data['mytitle'] ='';
			$doc = new DOMDocument();		
			$arg = $this->uri->segment(2);
			$pagetitle = $this->input->post('mytitle');		
			try 
			{
			$page = base_url().'themes/infocus/'.$this->uri->segment(2).'.html';
			$writepage = 'themes/infocus/'.$this->uri->segment(2).'.html';
			libxml_use_internal_errors(true);
			$pageload=$this->fetchUrl($page);
			$doc->loadHTML($pageload);
			$data['filecontents']=htmlspecialchars($pageload); 
			libxml_clear_errors();
				//check page name is Avil..
				if($arg!="")		
				{	
					//check if title tag available
					if($doc->getElementsByTagName("title")->item(0))
					{
					//get page title
					$data['mytitle'] = $doc->getElementsByTagName("title")->item(0)->textContent;	
						if($pagetitle!="")
						{
						$parent = $doc->getElementsByTagName("title")->item(0);
						$newchild = $doc->createTextNode($pagetitle);
						$parent->replaceChild($newchild, $parent->firstChild);
						$doc->saveHTMLFile($writepage);
						$data['mytitle']=$pagetitle;					
						}
					
					}	
					else if($doc->getElementsByTagName("head")->item(0))
					{
							if($pagetitle!="")
							{
							$head = $doc->getElementsByTagName("head")->item(0);	
							$title = $doc->createElement('title');
							$title = $head->appendChild($title);
							$text = $doc->createTextNode($pagetitle);
							$text = $title->appendChild($text);
							$doc->saveHTMLFile($writepage);
							$data['mytitle']=$pagetitle;				
							}
							
					}		
					else
					{
					//No head tag
					$data['filecontents']="no header file";
					}
						
				
				}
			}
			catch (Exception $e) {
			error_log('Fetch URL failed: ' . $e->getMessage() . ' for ' . $page);
			}		
			$this->template->set('title','Website builder');
			$this->template->load('layouts/main','build',$data);
		}
		
	}	
	public function savefile()
	{
	echo "oooooooooooook";

	}

	public function titlechange()
	{

	 $this->template->set('title','Change Title');
	 $this->template->load('layouts/main','titlechange');
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
