<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
	
    <title><?php echo $title ?> | <?php echo $this->config->item('site_name') ?></title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<script src="<?php echo base_url('ckeditor/ckeditor.js') ?>" ></script>
	<script type="text/javascript">

	function ExecuteCommand( commandName )
							{
								// Get the editor instance that we want to interact with.
								var oEditor = CKEDITOR.instances.myedit;

								// Check the active editing mode.
								if ( oEditor.mode == 'wysiwyg' )
								{
									// Execute the command.
									// http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.editor.html#execCommand
									oEditor.execCommand( commandName );
								}
								else
									alert( 'You must be in WYSIWYG mode!' );
							}


	</script>
    <!-- CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>css/combine_fonts.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<link href="<?php echo base_url(); ?>css/buttons.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>style.css" rel="stylesheet" />
	
	<!-- color style -->
	<link href="<?php echo base_url(); ?>css/dark.css" rel="stylesheet" />
	
	<link href="<?php echo base_url(); ?>css/cms.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- bootstrap fav and touch icons, replace with your own -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css">
	body
	{
		padding-top: 30px;	
	}
	#header .nav {
	margin-top: 0px;
	}
	</style>

  </head>

  <body>
	
	<!-- top fixed navbar -->
<div id="header" class="navbar navbar-fixed-top">
		<div class="navbar-inner">
<!-- INNER -->
				<div class="container" style="width: auto;">
					<a class="brand" href="<?php echo base_url(); ?>"> &nbsp; WMS - Online Edtior</a>
					<ul class="nav">
					<li class="divider-vertical"></li>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#"><b>File</b> <b class="caret"></b></a>
								<ul class="dropdown-menu parent">
									<li><a accesskey="n" href="<?php echo base_url().'addpage/'.SALT.'/'.$this->uri->segment(3); ?>" class="iframe" >New  <span class="pull-right">Ctrl+N</span></a></li>
       
									<li><a accesskey="o" href="#data" class="js-fancybox" >Open  <span class="pull-right">Ctrl+O</span></a></li>
        							<div style="display:none">
        								<div id="data">

        									<?php if (!isset($files)): ?>
        									<h4 align="center">
        										Click the  "Project" button on the Top Menu. That will ... Before you can Open your project  Files
        										<br />
        										Note :You Must Choose A Project First</h4>
        										
        								 <?php else: ?>	
        								<?php foreach ($files as $data): ?>
										<ul class="thumbnails portfolio">
    	
										<?php foreach ($data as $file): ?>
										<li class="span2">
											<div class="thumbnail">
        								<a href="<?php echo base_url()."edit/".SALT."/".$this->uri->segment(3)."/$file"?>">
        									<img height=64 width=64 src="<?php echo base_url('img/html2.png');?>"></a>
										   <h4 align="center">
        									<?php echo $file ?>
											</h4>
										</div>
        								
        								</li>
        								<?php endforeach ?>
										</ul>
        								<?php endforeach ?>
        								<?php endif; ?>
        								</div>

        							</div>
									<li><a href="javascript:ExecuteCommand('save');">Save  <span class="pull-right">Ctrl+S</span></a></li>
									<li><a href="#">Delete <span class="pull-right">Ctrl+Del</span></a></li>
									<li class="divider"></li>
									<li><a  href="javascript:ExecuteCommand('preview');">Preview</a></li>
									<li><a href="#">Print <span class="pull-right">Ctrl+P</span></a></li>
									<li class="divider"></li>
									<li><a href="<?php echo base_url(); ?>">Back Home<span class="pull-right">Ctrl+H</span></a></li>
								</ul>
							</li>

							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#"><b>Edit</b> <b class="caret"></b></a>
								<ul class="dropdown-menu parent">
									<li><a href="javascript:ExecuteCommand('undo');">Undo  <span class="pull-right">Ctrl+z</span></a></li>									
									<li><a href="javascript:ExecuteCommand('redo');">Redo<span class="pull-right">Shift+ctrl+z</span></a></li>
									<li class="divider"></li>
									<li><a href="javascript:ExecuteCommand('cut');">Cut  <span class="pull-right">Ctrl+X</span></a></li>									
									<li><a href="javascript:ExecuteCommand('copy');">Copy <span class="pull-right">Ctrl+C</span></a></li>
									<li><a href="javascript:ExecuteCommand('paste');">Paste <span class="pull-right">Ctrl+V</span></a></li>									
									<li class="divider"></li>
									<li><a href="javascript:ExecuteCommand('selectAll');">Select All  <span class="pull-right">Ctrl+A</span></a></li>									
									<li><a href="javascript:ExecuteCommand('find');">Find <span class="pull-right">Ctrl+F</span></a></li>
									<li><a href="javascript:ExecuteCommand('replace');">Replace <span class="pull-right">Ctrl+1</span></a></li>
									<li class="divider"></li>
									<li><a href="#">Change Template</a></li>
									
								</ul>
							</li>

							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#"><b>Insert</b> <b class="caret"></b></a>
								<ul class="dropdown-menu parent">
									<li><a accesskey="f" href="javascript:ExecuteCommand('flash');">Flash <span class="pull-right">ALT+F</span></a></li>
									<li><a accesskey="i" href="javascript:ExecuteCommand('image');">Image<span class="pull-right">ALT+I</span></a></li>						
									<li><a  accesskey="t" href="javascript:ExecuteCommand('table');">Table<span class="pull-right">ALT+T</span></a></li>
									<li><a  accesskey="x" href="javascript:ExecuteCommand('iframe');">IFrame <span class="pull-right">ALT+X</span></a></li>
									<li class="divider"></li>
									<li><a accesskey="h" href="javascript:ExecuteCommand('link');">HyperLink <span class="pull-right">ALT+H</span></a></li>
									<li><a href="javascript:ExecuteCommand('horizontalrule');">HorizontalRule</a></li>
									
									
								</ul>
							</li>

							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#"><b>Preferences</b> <b class="caret"></b></a>
								<ul class="dropdown-menu parent">
									<li><a href="#">Open</a></li>
									
									<li><a href="#">save</a></li>
									<li><a href="#">Close project</a></li>
									<li><a href="#">Save All</a></li>
									<li class="divider"></li>
									<li><a href="#">Log out</a></li>
									
								</ul>
							</li>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#"><b>Projects</b> <b class="caret"></b></a>
								<ul class="dropdown-menu parent">
									<?php $proj = unserialize(PROJECTS); 
									foreach ($proj as $sitename): ?>
									<li><a href="<?php echo base_url()."edit/".SALT."/". $sitename ?>"><i class="icon-large icon-list-alt"></i> <?php echo $sitename; ?></a></li>
									<?php endforeach ?>
									<li class="divider"></li>
									<li><a href="<?php echo base_url().'browsethemes' ?>"><i class="icon-large icon-list-alt"></i>New Project</a></li>

									
								</ul>
							</li>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#"><b>Help</b> <b class="caret"></b></a>
								<ul class="dropdown-menu parent">
									<li><a href="#">Open</a></li>
									
									<li><a href="#">save</a></li>
									<li><a href="#">Close project</a></li>
									<li><a href="#">Save All</a></li>
									<li class="divider"></li>
									<li><a href="#">Log out</a></li>
									
								</ul>
							</li>

					
					
					<li class="divider-vertical"></li>
					</ul>
				</div>
				<!-- INNER -->
		</div>
	</div>
	<!-- top fixed navbar -->

	<div class="container-fluid">
		<div class="row-fluid">
		
			<!-- main content -->
			<?php echo $contents ?>
			<!-- main content -->
			
		</div>
	</div>

    <!-- JS Files
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="https://www.google.com/jsapi"></script>	
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>	
	
	<script type="text/javascript" src="<?php echo base_url(); ?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            /* Fancybox SetUp */
            $("a.js-fancybox").fancybox({
                'transitionIn'  :   'elastic',
                'transitionOut' :   'elastic',
                'speedIn'       :   200, 
                'speedOut'      :   100, 
                'overlayShow'   :   true
            });

            $("a.iframe").fancybox({
            	'width':600,
				'height':610,
				'type':'iframe',
				'autoScale':'true'});

            	//on mouse out hide menu
            $('.nav').mouseleave(function() {
		  $('[data-toggle="dropdown"]').parent().removeClass('open');
		});
        });

       if(CKEDITOR.instances[myedit])
       {
 
	}


    </script>
	
	

	</body>

</html>
