<div class="widget_container span10">
				<div class="well nomargin">
					<ul class="breadcrumbs-custom in-well">
						<li><a href="#">Home</a></li>
						<li><a href="#">Contents</a></li>
						<li><a href="#">Field Reports</a></li>
						<li class="active">Add New</li>
					</ul>
				</div>
			</div>

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
						<form method="post">
													
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
					</div>
				</div>
			</div>



			<div id="right_sidebar" class="span3">
				
				
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
													<td style="width:10px;"><input type="checkbox" class="chkbck"></td>
													<td>Kajian</td>
												</tr>
												<tr>
													<td><input type="checkbox" class="chkbck"></td>
													<td>Observasi</td>
												</tr>
												<tr>
													<td><input type="checkbox" class="chkbck"></td>
													<td>Pembinaan Habitat</td>
												</tr>
												<tr>
													<td><input type="checkbox" class="chkbck"></td>
													<td>Penelitian</td>
												</tr>
												<tr>
													<td><input type="checkbox" class="chkbck"></td>
													<td>Social</td>
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
													<td><input type="checkbox" class="chkbck"></td>
													<td>Observasi</td>
												</tr>
												<tr>
													<td><input type="checkbox" class="chkbck"></td>
													<td>Kajian</td>
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
						<input type="text" name="add_post_tag" class="input-small"> <button class="btn btn-duadua btn-small">Add</button>
						</form>
						<span class="label label-info">tag one</span> <span class="label label-info">tag number two</span> <span class="label label-info">three</span>
					</div>
				</div>
				
			</div>