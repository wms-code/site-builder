<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
	
    <title><?php echo $title ?> | <?php echo $this->config->item('site_name') ?></title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<script src="<?php echo base_url('ckeditor/ckeditor.js') ?>" ></script>
	
	
    <!-- CSS -->
		<style type="text/css">
		.order_list li{
		padding:5px;
		border:1px solid #DDD;
		cursor:move;
		}
		
		</style>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>css/combine_fonts.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>plugins/datepicker/css/datepicker.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>plugins/colorpicker/css/colorpicker.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<link href="<?php echo base_url(); ?>plugins/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>plugins/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css" rel="stylesheet" />

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
	<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
  </head>

  <body>
	
	<!-- top fixed navbar -->
	<div id="header" class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo.png" /></a>
				
				<ul class="nav">
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-large icon-th-1"></i> Components <b class="caret"></b></a>
						
					</li>
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-large icon-cog-2"></i> Plugins <b class="caret"></b></a>
						
					</li>
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-large icon-layers"></i> Projects <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php $proj = unserialize(PROJECTS); 
								foreach ($proj as $sitename): ?>
								<li><a href="<?php echo base_url()."pages/".SALT."/". $sitename ?>"><i class="icon-large icon-list-alt"></i> <?php echo $sitename; ?></a></li>
							<?php endforeach ?>
							<li class="divider"></li>
							<li><a href="<?php echo base_url('browsethemes') ;?>"><i class="icon-large icon-list-alt"></i>New site</a></li>
						</ul>
					</li>
					<li><a href="<?php echo base_url('browsethemes') ;?>"><i class="icon-large icon-list-alt"></i>New site</a></li>
					<li><a href="<?php echo base_url('edit').'/'.SALT ;?>"><i class="icon-large icon-list-alt"></i>Editor</a></li>
				</ul>
				
				<div class="btn-toolbar pull-right">
				
				<div class="btn-group">
				<a class="btn dropdown-toggle rel" data-toggle="dropdown" href="#"><i class="icon-large icon-th-2"></i><span class="badge badge-important abs">20</span></a>
				<ul class="dropdown-menu fb-one">
					<li class="heading">
					<h3>Friend Requests</h3><a href="#">Find Friends</a>
					</li>
					
					<li class="confirm_fb">
					<ul class="content">
					<li class="fb_avatar"><img src="<?php echo base_url(); ?>img/avatar-sample-01.jpg"></li>
					<li class="fb_uname"><h4><a href="#">Esther</a></h4><span>10 Mutual Friends</span></li>
					<li class="fb_action"><button class="btn btn-small"><i class="icon-ok"></i> Friends</button></li>
					</ul>
					</li>
					
					<li>
					<ul class="content">
					<li class="fb_avatar"><img src="<?php echo base_url(); ?>img/avatar-sample-02.jpg"></li>
					<li class="fb_uname"><h4><a href="#">Nadya</a></h4><span>5 Mutual Friends</span></li>
					<li class="fb_action"><button class="btn btn-small btn-primary">Confirm</button> <button class="btn btn-small">Not Now</button></li>
					</ul>
					</li>
					
					<li>
					<ul class="content">
					<li class="fb_avatar"><img src="<?php echo base_url(); ?>img/avatar-sample-06.jpg"></li>
					<li class="fb_uname"><h4><a href="#">Daniel</a></h4><span>37 Mutual Friends</span></li>
					<li class="fb_action"><button class="btn btn-small btn-primary">Confirm</button> <button class="btn btn-small">Not Now</button></li>
					</ul>
					</li>
					
					<li>
					<ul class="content">
					<li class="fb_avatar"><img src="<?php echo base_url(); ?>img/avatar-sample-03.jpg"></li>
					<li class="fb_uname"><h4><a href="#">Yedida</a></h4><span>30 Mutual Friends</span></li>
					<li class="fb_action"><button class="btn btn-small btn-primary">Confirm</button> <button class="btn btn-small">Not Now</button></li>
					</ul>
					</li>
					
					<li>
					<ul class="content">
					<li class="fb_avatar"><img src="<?php echo base_url(); ?>img/avatar-sample-04.jpg"></li>
					<li class="fb_uname"><h4><a href="#">Simeon</a></h4><span>32 Mutual Friends</span></li>
					<li class="fb_action"><button class="btn btn-small btn-primary">Confirm</button> <button class="btn btn-small">Not Now</button></li>
					</ul>
					</li>
					
					<li>
					<ul class="content">
					<li class="fb_avatar"><img src="<?php echo base_url(); ?>img/avatar-sample-05.jpg"></li>
					<li class="fb_uname"><h4><a href="#">Theressia</a></h4><span>16 Mutual Friends</span></li>
					<li class="fb_action"><button class="btn btn-small btn-primary">Confirm</button> <button class="btn btn-small">Not Now</button></li>
					</ul>
					</li>
					
					<li class="fb_dd_footer">
					<a href="#">See All Friend Requests</a>
					</li>
				</ul>
				</div><!-- /btn-group -->
				
				<div class="btn-group">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user-1"></i> <?php echo $this->session->userdata('username'); ?>
						<span class="caret"></span>
					</a>
					
					<ul class="dropdown-menu megamenu col2 ud">
						<li class="sub">
						<div class="img_round img_c_margin"><img width="70" height="70" src="<?php echo base_url(); ?>img/avatar-sample.png" /></div>
						</li>
						<li class="sub">
						<ul>
						<li><a href="#"><i class="icon-large icon-cog-2"></i> Profile</a></li>
						<li><a href="#"><i class="icon-large icon-key"></i> Privacy Settings</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url(); ?>user/logout"><i class="icon-large icon-logout-1"></i> Logout</a></li>
						</ul>
						</li>
					</ul>
					
				</div>
				</div>
				
			</div>
		</div>
	</div><!-- top fixed navbar -->

	<div class="container-fluid">
		<div class="row-fluid">
		
			<!-- sidebar -->
			<div id="sidebar" class="span2">			
				<div class="accordion custom-acc" id="accordionSB">

					<div class="accordion-group fs">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#dashboardsb">
								<i class="icon-large icon-th-large head_icon"></i> Dashboard
							</a>
						</div>
						<div id="dashboardsb" class="accordion-body collapse in">
							<div class="accordion-inner">
								<ul class="nav nav-list">
									<li class="active"><a href="index.html"><i class="icon-large icon-th"></i> Dashboard</a></li>
									<li><a href="stats.html"><i class="icon-large icon-th"></i> Stats</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#articlesb">
								<i class="icon-large icon-th-large head_icon"></i> Articles
							</a>
						</div>
						<div id="articlesb" class="accordion-body collapse">
							<div class="accordion-inner">
								<ul class="nav nav-list">
									<li><a href="articles.html"><i class="icon-large icon-th"></i> List</a></li>
									<li><a href="add-new-article.html"><i class="icon-large icon-th"></i> Add New</a></li>
									<li><a href="article-category.html"><i class="icon-large icon-th"></i> Categories</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#pagesb">
								<i class="icon-large icon-th-large head_icon"></i> Pages
							</a>
						</div>
						<div id="pagesb" class="accordion-body collapse">
							<div class="accordion-inner">
								<ul class="nav nav-list">
									<li><a href="pages.html"><i class="icon-large icon-th"></i> List</a></li>
									<li><a href="add-new-page.html"><i class="icon-large icon-th"></i> Add New</a></li>
								</ul>
							</div>
						</div>
					</div>					
					
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#reportsb">
								<i class="icon-large icon-th-large head_icon"></i> Field Reports
							</a>
						</div>
						<div id="reportsb" class="accordion-body collapse">
							<div class="accordion-inner">
								<ul class="nav nav-list">
									<li><a href="field-reports.html"><i class="icon-large icon-th"></i> List</a></li>
									<li><a href="add-new-field-report.html"><i class="icon-large icon-th"></i> Add New</a></li>
									<li><a href="field-report-category.html"><i class="icon-large icon-th"></i> Categories</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#mediasb">
								<i class="icon-large icon-th-large head_icon"></i> Media
							</a>
						</div>
						<div id="mediasb" class="accordion-body collapse">
							<div class="accordion-inner">
								<ul class="nav nav-list">
									<li><a href="media-library.html"><i class="icon-large icon-th"></i> Library</a></li>
									<li><a href="add-new-media.html"><i class="icon-large icon-th"></i> Add New</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#commentsb">
								<i class="icon-large icon-th-large head_icon"></i> Comments
							</a>
						</div>
						<div id="commentsb" class="accordion-body collapse">
							<div class="accordion-inner">
								<ul class="nav nav-list">
									<li><a href="comments.html"><i class="icon-large icon-th"></i> Comments</a></li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div><!-- sidebar -->
			
			<!-- main content -->
			<?php echo $contents ?>
			<!-- main content -->
			
		</div>
	</div>

    <!-- JS Files
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		
   

	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>	
	<script src="<?php echo base_url(); ?>plugins/datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
	
	<script src="<?php echo base_url(); ?>plugins/wysiwyg/bootstrap-wysihtml5.js"></script>
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
            });
        </script>
		
	
	<script src="<?php echo base_url(); ?>js/demo.js"></script>
	<script src="<?php echo base_url(); ?>js/google-chart-index.js"></script>
	
  </body>

</html>
