<?php
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
	public function	layout()
	{
	$page= file_get_contents("themes/infocus/layout.html");
	echo $page;
	}
	public function	save()
	{
	
	file_put_contents('themes/infocus/test.html',$_POST['content']);
	}
	public function build()	{
		
		if($this->input->post('myedit'))
		{
		$udata= str_replace('contenteditable="false"',"",$this->input->post('myedit'));
		$url="themes/".$this->uri->segment(2)."/".$this->uri->segment(3).".html";
		file_put_contents($url,$udata);
		$target= base_url()."build/".$this->uri->segment(2)."/".$this->uri->segment(3);
        header("Location: " . $target);
		}
		else
		{
			//assign variables
			$data='';		
			$data['filecontents'] ='';
			$data['mytitle'] ='';
			$doc = new DOMDocument();		
			$arg = $this->uri->segment(3);
			$pagetitle = $this->input->post('mytitle');		
			try 
			{
			$page = 'themes/'.$this->uri->segment(2)."/".$this->uri->segment(3).'.html';
			$writepage = 'themes/'.$this->uri->segment(2)."/".$this->uri->segment(3).'.html';
			$configpage = 'themes/'.$this->uri->segment(2).'/config.json';
			
			if (file_exists($page)) {
			libxml_use_internal_errors(true);
			$pageload= file_get_contents($page);
			
			if(file_exists($configpage))
			{
				$configdata = file_get_contents($configpage);
				$configarray = json_decode($configdata);
				foreach($configarray->lockclass as $cvalue)
				{
				  $rclass =  'class="'. $cvalue . '"';
				  $pageload = str_replace($rclass,"$rclass contenteditable='false'",$pageload);
				}
			}
			
			
			$doc->loadHTML($pageload);
			$data['filecontents'] = $configarray;
			$data['filecontents']=htmlspecialchars($pageload); 			
			libxml_clear_errors();
			}
			
				//check page name is Avil..
				if($arg!="")		
				{	
					//check if title tag available
					if($doc->getElementsByTagName("title")->item(0)->textContent)
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

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
