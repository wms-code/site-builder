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
	public function	edit()
	{
		$data['mytitle'] = "";
		$themepath='themes/'.$this->uri->segment(2).'/';
		$filename = $this->uri->segment(3) . ".html";
		$fileurl = $themepath.$filename;
				
		if($this->input->post('myedit'))
		{
			$content=$this->input->post('myedit');
			$headtmp = @stristr($content,"<!-- DO NOT EDIT HEH -->",TRUE);
			if($headtmp &&  stristr($headtmp,"<!-- DO NOT EDIT HSH -->") )
			{
				$head = stristr($headtmp,"<!-- DO NOT EDIT HSH -->") . "\n<!-- DO NOT EDIT HEH -->";
				file_put_contents($themepath.'include/head.html',$head);
			}
			$footertmp = @stristr($content,"<!-- DO NOT EDIT FEH -->",TRUE);
			if($footertmp &&  stristr($footertmp,"<!-- DO NOT EDIT FSH -->") )
			{
				$footer = stristr($footertmp,"<!-- DO NOT EDIT FSH -->") . "\n<!-- DO NOT EDIT FEH -->";
				file_put_contents($themepath.'include/footer.html',$footer);
			}
			$bodytmp = @stristr($content,"<!-- DO NOT EDIT FSH -->",TRUE);
			if($bodytmp &&  stristr($bodytmp,"<!-- DO NOT EDIT MEH -->") )
			{
				$userbody = stristr($bodytmp,"<!-- DO NOT EDIT MEH -->");
				$body = str_replace("<!-- DO NOT EDIT MEH -->",'<?php include("include/menu.html") ?>',$userbody);
				$body .= '<?php include("include/footer.html") ?> ' . "\n</body>\n</html>";
				$filebody= @file_get_contents($fileurl);
				$topbody = stristr($filebody,'<?php include("include/menu.html") ?>',TRUE);
				$body = $topbody . $body;
				file_put_contents($fileurl,$body);
			}
			$target = base_url()."edit/".$this->uri->segment(2)."/".$this->uri->segment(3);
			header("Location: " . $target);
			exit(0);
		}
		if($this->input->post('mytitle'))
		{	
			$filehead= @file_get_contents($fileurl);
			if (preg_match('/<title>(.+)<\/title>/',$filehead,$matches) && isset($matches[1] ))
			$oldtitle = '<title>'.$matches[1].'</title>';
			$newtitle='<title>'.$this->input->post('mytitle').'</title>';		
			$filecontents = str_replace($oldtitle,$newtitle,$filehead);
			@file_put_contents($fileurl,$filecontents );
			$target= base_url()."edit/".$this->uri->segment(2)."/".$this->uri->segment(3);
			header("Location: " . $target);
		}
	
		$data['filecontents']= @file_get_contents(base_url().$fileurl);
		if (preg_match('/<title>(.+)<\/title>/',$data['filecontents'],$matches) && isset($matches[1] ))
		$data['mytitle'] = $matches[1];	
		
		
		$this->template->set('title','Website builder');
		$this->template->load('layouts/main','edit',$data);
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
