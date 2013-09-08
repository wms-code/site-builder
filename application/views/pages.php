<style type="text/css">
input[type=text]
{
	margin-top:8px;
	font-size:18px;
	color:#545454;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	-border-radius: 2px;
	display:none;
	width:280px;
	
}



.edit
{
	float:left;
	background:url(<?php echo base_url() ?>img/edit.png) no-repeat;
	width:24px;
	height:24px;
	display:block;
	cursor: pointer;
	
}

.clear
{
	clear:both;
	height:20px;
}

</style>
<script type="text/javascript">
$(document).ready(function(){
	
	$('.edit').click(function(){
		$(this).hide();
		$(this).prev().hide();
		$(this).next().show();
		$(this).next().select();
	});
	
	
	$('input[type="text"]').blur(function() {  
         if ($.trim(this.value) == ''){  
			 this.value = (this.defaultValue ? this.defaultValue : '');  
		 }
		 else{
			 $(this).prev().prev().html(this.value);
		 }
		 
		 $(this).hide();
		 $(this).prev().show();
		 $(this).prev().prev().show();
     });
	  
	  $('input[type="text"]').keypress(function(event) {
		  if (event.keyCode == '13') {
			  if ($.trim(this.value) == ''){  
				 this.value = (this.defaultValue ? this.defaultValue : '');  
			 }
			 else
			 {
				 $(this).prev().prev().html(this.value);
			 }
			 
			 $(this).hide();
			 $(this).prev().show();
			 $(this).prev().prev().show();
		  }
	  });
		  
});
</script>

<!-- main content -->
<div id="main_content" class="span10">
			
				<div class="widget_container">
					<div class="well nomargin">
						<ul class="breadcrumbs-custom in-well">
							<li><a href="#">Home</a></li>
							<li><a href="#">Contents</a></li>
							<li><a href="#">Pages</a></li>
							<li class="active">List</li>
						</ul>
					</div>
				</div>	
				
				<div class="row-fluid">
					<div class="widget_container">
						<div class="well nomargin">
							<div class="navbar navbar-static navbar_as_heading">
								<div class="navbar-inner">
									<div class="container" style="width: auto;">
										<a class="brand">Pages</a>
										<a class="btn pull-right" href="<?php echo base_url('addpage').'/'.SALT.'/'.$furl; ?>">Add New</a>
									</div>
								</div>
							</div>
							<div class="subnav">
								<div class="btn-toolbar pull-left">
									<div class="btn-group">
										<button class="btn btn-small active btn-duadua">All<span class="badge abs1">19</span></button>
										<button class="btn btn-small btn-duadua"><i class="icon-ok-3"></i> Published <span class="badge badge-info abs1">17</span></button>
										<button class="btn btn-small btn-duadua"><i class="icon-pencil"></i> Draft <span class="badge badge-warning abs1">1</span></button>
										<button class="btn btn-small btn-duadua"><i class="icon-trash-2 btn-duadua"></i> Trash <span class="badge badge-important abs1">1</span></button>
									</div>
								</div>
								<form class="navbar-search pull-right" action="#">
									<input type="text" class="search-query" placeholder="Search">
								</form>
							</div>
							
							<div class="subnav nobg">
								<div class="span2">
									<select name="action">
										<option value="-1" selected="selected">Bulk Actions</option>
										<option value="edit">Edit</option>
										<option value="trash">Move to Trash</option>
									</select>
								</div>
								<div class="span1">
									<button class="btn btn-small btn-duadua">Apply</button>
								</div>
								<div class="span2">
									<select name="m">
									<option selected="selected" value="0">Show all dates</option>
									<option value="201206">June 2012</option>
									<option value="201205">May 2012</option>
									<option value="201204">April 2012</option>
									<option value="201203">March 2012</option>
									<option value="201202">February 2012</option>
									<option value="201201">January 2012</option>
									<option value="201111">November 2011</option>
									<option value="201105">May 2011</option>
									<option value="201102">February 2011</option>
									<option value="201007">July 2010</option>
									<option value="201003">March 2010</option>
									<option value="201002">February 2010</option>
									<option value="200912">December 2009</option>
									<option value="200908">August 2009</option>
									<option value="200906">June 2009</option>
									<option value="200902">February 2009</option>
									<option value="200901">January 2009</option>
									</select>
								</div>
								<div class="span3">
									&nbsp;
								</div>
								<div class="span4">
									<div class="pagination">
										<ul>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
										</ul>
									</div>
								</div>
							</div>
							<table class="table smallfont">
								<thead>
									<tr>
										<td style="width:20px;"><input type="checkbox" id="chkbck" /></td>
										<td> Page Name</td>
										<td>  Web Page Title</td>
										<td>Author</td>
										<td><i class="icon-large icon-comment-alt-1"></i></td>
										<td>Date</td>
									</tr>
								</thead>
								<tbody>
										<?php foreach ($list as  $value ): ?>																			
																									
									<tr>
										<td><input type="checkbox" class="chkbck" /></td>
										<td><form method="post">
											<a href="#" class="post_title"><?php echo $value['filename'] ?>.html</a><div class="edit"></div>
											<input type="text" onblur="this.form.submit()" name="page[<?php echo $value['filename'] ?>]" value="<?php echo $value['filename'] ?>" />
											 <input type="hidden" name="fname" value="<?php echo $value['filename'] ?>" >
											</form>
											<div class="operation" >
												<div class="btn-group" style="display:none;">
												  <a href="<?php echo base_url('edit'). "/" . SALT . "/$furl/" . $value['filename'].".html"; ?>" class="btn btn-small"><i class="icon-pencil-1"></i> Edit Page </a>
												  <a  target="_blank" href="<?php echo base_url('userdata').'/'.$this->session->userdata('username')."/$furl/".$value['filename'].".html"; ?>" class="btn btn-small"><i class="icon-eye-2"></i> View</a>
												  <a  href="<?php echo base_url('delpage'). "/" . SALT . "/$furl/" .$value['filename'].".html"; ?>" class="btn btn-small"><i class="icon-trash-empty"></i> Delete</a>
												</div>
											</div>
										</td>
										<td><form method="post">
											<span class="post_title"><?php echo $value['title']; ?></span><div class="edit"></div>
												<input type="text" onblur="this.form.submit()" name="title[<?php echo $value['filename']; ?>]" value="<?php echo $value['title']; ?>" />
											</form>
											</td>
										<td>Admin</td>
										<td><span class="badge badge-info">0</span></td>
										<td>Last modified:<br /><?php echo $value['fdate']; ?></td>
									</tr>
									<?php endforeach ?>
									
									
									
								</tbody>
							</table>
							<div class="subnav nobg">
								<div class="span2">
									<select name="action">
										<option value="-1" selected="selected">Bulk Actions</option>
										<option value="edit">Edit</option>
										<option value="trash">Move to Trash</option>
									</select>
								</div>
								<div class="span1">
									<button class="btn btn-small btn-duadua">Apply</button>
								</div>
								<div class="span2">
								
								</div>
								<div class="span2">
								
								</div>
								<div class="span1">
									
								</div>
								<div class="span4">
									<div class="pagination">
										<ul>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- main content -->