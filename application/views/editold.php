
			
			<!-- main content -->
			<div id="main_content" class="span9">
				<div class="row-fluid">
					<div class="widget_container">
						<div class="well">
							<div class="navbar navbar-static navbar_as_heading">
								<div class="navbar-inner">
									<div class="container" style="width: auto;">
										<a class="brand"><i class="icon-th-large-1"></i> Add New Article</a>
									</div>
								</div>
							</div>
							<form method="post">
							<input type="text" name='mytitle' value="<?php echo $mytitle ?>" class="input-xxlarge-fluid" onblur='this.form.submit()' placeholder="Title">
							</form>
							<form method="post">
							<textarea id="myedit" name="myedit"><?php echo $filecontents ?></textarea>
							<script type="text/javascript">

							CKEDITOR.replace( 'myedit', {
								fullPage: true,
								allowedContent: true,
								 height: '800',
        						width: '100%'

							});
							CKEDITOR.config.fillEmptyBlocks = false;
							/*
							CKEDITOR.on('instanceReady',
								  function( evt )
								  {
									 var editor = evt.editor;
									 editor.execCommand('maximize');
								  });
*/
								  
								//CKEDITOR.config.extraPlugins = 'autosave';
								
							CKEDITOR.config.keystrokes = [
								 
								[ CKEDITOR.CTRL + 83, 'save' ],    // CTRL + SHIFT + L
								
							];	
							</script>
							<ul class="nav nav-tabs myTab smallfont">
								<li class="active"><a href="#WEA1" data-toggle="tab"><i class="icon-large icon-th"></i> Excerpt / Discussion</a></li>
								<li><a href="#WEA2" data-toggle="tab"><i class="icon-large icon-th"></i> Attachment</a></li>
								<li><a href="#WEA3" data-toggle="tab"><i class="icon-large icon-th"></i> Post Layout</a></li>
							</ul>

							<div class="tab-content myTabContent">
								<div class="tab-pane fade in active" id="WEA1">

									<div class="tabbable tabs-left xdefault">

										<ul class="nav nav-tabs">
											<li class="active"><a href="#WElA" data-toggle="tab"><i class="icon-align-justify"></i></a></li>
											<li class=""><a href="#WElB" data-toggle="tab"><i class="icon-large icon-reply-all-1"></i></a></li>
										</ul>

										<div class="tab-content">
											<div class="tab-pane active" id="WElA">
												<div class="inner">
													<label>Post Excerpt</label>
													<textarea name="excerpt" style="width:90%;height:120px;"></textarea>
												</div>
											</div>
											<div class="tab-pane" id="WElB">
												<div class="inner">
													<label>Send trackback to:</label>
													<input type="text" name="trackback" class="input-xlarge-fluid" />
													<label class="checkbox">
														<input type="checkbox" name="ca"> Allow Comment.
													</label>
												</div>
											</div>
										</div>
										
									</div>

								</div>

								<div class="tab-pane fade" id="WEA2">
									<form>
										<div id="uploader">
											<p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
										</div>
									</form>
								</div>

								<div class="tab-pane fade" id="WEA3">
									<table class="table">
										<thead>
											<tr>
												<td>&nbsp;</td>
												<td>Layout</td>
												<td>Sidebar</td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><input type="radio" name="slayout" /></td>
												<td><img width="100" src="../img/layout-01.png" /></td>
												<td>
													<div class="btn-group" data-toggle="buttons-radio">
														<button class="btn btn-duadua">Left</button>
														<button class="btn btn-duadua">Right</button>
														<button class="btn btn-duadua">No Sidebar</button>
													</div>
												</td>
											</tr>
											<tr>
												<td><input type="radio" name="slayout" /></td>
												<td><img width="100" src="../img/layout-02.png" /></td>
												<td>
													<div class="btn-group" data-toggle="buttons-radio">
														<button class="btn btn-duadua">Left</button>
														<button class="btn btn-duadua">Right</button>
														<button class="btn btn-duadua">No Sidebar</button>
													</div>
												</td>
											</tr>
											<tr>
												<td><input type="radio" name="slayout" /></td>
												<td><img width="100" src="../img/layout-03.png" /></td>
												<td>
													<div class="btn-group" data-toggle="buttons-radio">
														<button class="btn btn-duadua">Left</button>
														<button class="btn btn-duadua">Right</button>
														<button class="btn btn-duadua">No Sidebar</button>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>

							</div>
							
						</div>
					</div>
				</div>
			</div><!-- main content -->
			
			<div id="right_sidebar" class="span3">
				<div class="widget_container">
					<div class="well nomargin">
						<div class="navbar navbar-static navbar_as_heading">
							<div class="navbar-inner">
								<div class="container" style="width: auto;">
								<a class="brand"><i class="icon-th-large-1"></i> Publish</a>							
								</div>
							</div>
						</div>
						<div class="subnav nobg">
							<button class="btn btn-warning btn-small pull-left">Save Draft</button>
							<button class="btn btn-success btn-small pull-right">Preview</button>
						</div>
						
						<div class="inner">
							<strong>Status:</strong>
							<div class="btn-group">
								<button id="post_status" class="btn btn-small btn-duadua" style="width:80%;"><span>Draft</span></button>
								<button class="btn btn-small btn-duadua dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
								<ul id="post_status_select" class="dropdown-menu">
									<li><a href="#">Draft</a></li>
									<li><a href="#">Pending Review</a></li>
								</ul>
							</div>
						</div>
						
						<div class="inner">
							<strong>Visibility:</strong>
							<div class="btn-group">
								<button id="post_vis" class="btn btn-small btn-duadua" style="width:80%;"><span>Public</span></button>
								<button class="btn btn-small btn-duadua dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
								<ul id="post_vis_select" class="dropdown-menu">
									<li><a href="#">Public</a></li>
									<li><a href="#">Password protected</a></li>
									<li><a href="#">Private</a></li>
								</ul>
							</div>
							<input id="post_password" type="password" placeholder="type password" style="width:87%;margin-top:10px;display:none;" />
						</div>
						
						<div class="inner">
							<strong>Publish:</strong>
							<div class="btn-group">
								<button id="post_pub_select" class="btn btn-small btn-duadua" data-date="12-02-2012" data-date-format="dd-mm-yyyy" style="width:93%;"><span>immediately</span></button>
							</div>							
						</div>

						<div class="subnav nobg">
							<a href="<?php echo base_url()."delpage/".$this->uri->segment(2)."/".$this->uri->segment(3); ?>" class="btn btn-danger btn-small pull-left">Move to Trash</a>
							<input type="submit" class="btn btn-primary btn-small pull-right"  value="Publish">
								</form>
							</div>
						
					</div>
				</div>
				
				<div class="widget_container">
					<div class="well">
						<div class="navbar navbar-static navbar_as_heading">
							<div class="navbar-inner">
								<div class="container" style="width: auto;">
									<a class="brand"><i class="icon-th-large-1"></i> Categories</a>
								</div>
							</div>
						</div>

						<div class="tabbable">
							<ul class="nav nav-tabs myTab smallfont">
								<li class="active"><a href="#tab1" data-toggle="tab">All Categories</a></li>
								<li class=""><a href="#tab2" data-toggle="tab">Most Used</a></li>
							</ul>
							
							<div class="tab-content myTabContent">
								<div class="tab-pane active" id="tab1">
									<div class="inner">
										<table class="table smallfont">
											<tbody>
												<tr>
													<td style="width:10px;"><input type="checkbox" class="chkbck" /></td>
													<td>General News</td>
												</tr>
												<tr>
													<td><input type="checkbox" class="chkbck" /></td>
													<td>Breaking News</td>
												</tr>
												<tr>
													<td><input type="checkbox" class="chkbck" /></td>
													<td>Tips & Tricks</td>
												</tr>
												<tr>
													<td><input type="checkbox" class="chkbck" /></td>
													<td>Headline News</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane" id="tab2">
									<div class="inner">
										<table class="table smallfont">
											<tbody>
												<tr>
													<td><input type="checkbox" class="chkbck" /></td>
													<td>Breaking News</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							<div class="subnav nobg">
								<a href="#" class="btn btn-duadua btn-small">Add new category</a>
							</div>
							
						</div>
						
					</div>
				</div>
				
				<div class="widget_container">
					<div class="well">
						<div class="navbar navbar-static navbar_as_heading">
							<div class="navbar-inner">
								<div class="container" style="width: auto;">
									<a class="brand"><i class="icon-th-large-1"></i> Post Tags</a>
								</div>
							</div>
						</div>
						<form class="form-inline">
						<input type="text" name="add_post_tag" class="input-small" /> <button class="btn btn-duadua btn-small">Add</button>
						</form>
						<span class="label label-info">tag one</span> <span class="label label-info">tag number two</span> <span class="label label-info">three</span>
					</div>
				</div>
				
			</div>
			







