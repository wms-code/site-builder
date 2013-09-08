<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Edtior {

    

    public function __construct() {
        //$this->CI =& get_instance();
      
    }

    function savepages($content,$fileurl,$themepath) {  

        $headtmp =@strstr($content,"<!-- DO NOT EDIT HEH -->");
        if($headtmp &&  stristr($headtmp,"<!-- DO NOT EDIT HSH -->") )
        {
            $head = stristr($headtmp,"<!-- DO NOT EDIT HSH -->") . "\n<!-- DO NOT EDIT HEH -->";
            
            file_put_contents($themepath.'include/head.html',$head);
             
        }

        $headertmp = @stristr($content,"<!-- DO NOT EDIT HREH -->",TRUE);
        if($headertmp &&  stristr($headertmp,"<!-- DO NOT EDIT HRSH -->") )
        {
            $header = stristr($headertmp,"<!-- DO NOT EDIT HRSH -->") . "\n<!-- DO NOT EDIT HREH -->";
            file_put_contents($themepath.'include/header.html',$header);
        }

        $menutmp = @stristr($content,"<!-- DO NOT EDIT MEH -->",TRUE);
        if($menutmp &&  stristr($menutmp,"<!-- DO NOT EDIT MSH -->") )
        {
            $mainmenu = stristr($menutmp,"<!-- DO NOT EDIT MSH -->") . "\n<!-- DO NOT EDIT MEH -->";

                //check if menu has current class
            if (strpos($mainmenu,'class="current"') !== false) {

                $mainmenu = str_replace('<!-- DO NOT EDIT MSH -->','<!-- DO NOT EDIT MSH --> <?php $page=basename($_SERVER["PHP_SELF"]) ?>',$mainmenu );
                $mainmenu = str_replace(' class="current"','',$mainmenu );

                $pattern = '/href="([^\s"]+)/';
                preg_match_all($pattern, $mainmenu, $matches);
                $menulinks = array_unique($matches[1]);
                foreach ($menulinks as $menu) {
                    $fromvar = '<a href="' . $menu . '"';
                    $tovar = $fromvar . ' <?php if($page=="' . $menu . '") { echo "class=current"; } ?> ' ;
                    $mainmenu = str_replace($fromvar, $tovar,$mainmenu) ;
                }
            }
            TODO: adsf
            file_put_contents($themepath.'include/menu.html',$mainmenu);
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

       return TRUE;
    }

}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */