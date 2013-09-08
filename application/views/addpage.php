<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
	
    <title><?php echo $title ?> | <?php echo $this->config->item('site_name') ?></title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <script type="text/javascript">
	 	 $(function(){
       		$('#first').submit(function(){
       			parent.$.fancybox.close();
	 		});

        });
    </script>
<div id="main_content" class="span7">
				<div class="widget_container">
					<div class="well">
						<div class="navbar navbar-static navbar_as_heading">
							<div class="navbar-inner">
								<div class="container" style="width: auto;">
									<a class="brand">Add New Page</a>
								</div>
							</div>
						</div>
						<form method="post" id='first'>
													
							<label>Page Name:*</label>
							<input type="text" name="pagename" class="input-xlarge-fluid" placeholder="page-name">							
							<span class="help-block">The "Page Name" is the URL-friendly version. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
							
							<label>Page Title:</label>
							<input type="text" name="pagetitle" class="input-xlarge-fluid" placeholder="Category Name">							
							<span class="help-block">Define a title for your HTML document.</span>
							
							<label>Description:</label>
							<textarea name="description" style="width:90%;height:90px;"></textarea>
							<span class="help-block">The description is not prominent by default; however, some themes may show it.</span>
							
							<label>Page Layout (clone): *</label>
							<select name="parent" id="parent" class="input-xlarge-fluid">
								<option value="">None ( Empty Page )</option>
								<?php foreach ($files as  $value): ?>
								<option class="level-0" value="<?php echo $value ?>"><?php echo $value ?></option>	
								<?php endforeach ?>
							</select>
							<span class="help-block">Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</span>
														
							
							<button class="btn btn-duadua btn-small"><i class="icon-ok-3"></i> Add New Category</button>
							
						</form>
					</di>
				</div>
			</div>
</body>
</html>
