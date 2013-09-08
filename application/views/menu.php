<div id="main_content" class="span5">			
				<div class="widget_container">
					<div class="well nomargin">
						<div class="navbar navbar-static navbar_as_heading">
							<div class="navbar-inner">
								<div class="container" style="width: auto;">
									<a class="brand">Old Menu</a>
								</div>
							</div>
						</div>
						<style type="text/css" media="screen">
							/* line 1, jquery-sortable.css.sass */
							body.dragging, body.dragging * {
							cursor: move !important; }

							/* line 4, jquery-sortable.css.sass */
							.dragged {
							position: absolute;
							top: 0;
							opacity: 0.5;
							z-index: 2000; }

							/* line 10, jquery-sortable.css.sass */
							ol.vertical {
							margin: 0 0 9px 0; }
							/* line 12, jquery-sortable.css.sass */
							ol.vertical li {
							display: block;
							margin: 5px;
							padding: 5px;
							border: 1px solid #cccccc;
							color: #0088cc;
							background: #eeeeee; }
							/* line 19, jquery-sortable.css.sass */
							ol.vertical li.placeholder {
							position: relative;
							margin: 0;
							padding: 0;
							border: none; }
							/* line 24, jquery-sortable.css.sass */
							ol.vertical li.placeholder:before {
							  position: absolute;
							  content: "";
							  width: 0;
							  height: 0;
							  margin-top: -5px;
							  left: -5px;
							  top: -4px;
							  border: 5px solid transparent;
							  border-left-color: red;
							  border-right: none; }
						</style>
						<div  class="well">
						<ol class="nested_with_switch vertical">
      <li>
          Item 1
        </li>
        <li>
          Item 2
        </li>
        <li>
          Item 3
        </li>
        <li>
          Item 4
          <ol>
            <li>Item 3.1</li>
              <li>Item 3.2</li>
              <li>Item 3.3</li>
              <li>Item 3.4</li>
              <li>Item 3.5</li>
              <li>Item 3.6</li>
          </ol>
        </li>
        <li>
          Item 5
        </li>
        <li>
          Item 6
        </li>
    </ol>
						</div>
						
						
						<div class="alert alert-info" style="margin-bottom:0;">
							<strong>Note:</strong><br>
							Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the category Breaking News.
						</div>
						
					</div>
				</div>
			</div>
<div id="right_sidebar" class="span5">
				<div class="widget_container">
					<div class="well">
						<div class="navbar navbar-static navbar_as_heading">
							<div class="navbar-inner">
								<div class="container" style="width: auto;">
									<a class="brand">New Menu</a>
								</div>
							</div>
						</div>
						<div  class="">
						<ol class="nested_with_switch vertical">
      <li>
          Item 1
        </li>
        <li>
          Item 2
        </li>
        <li>
          Item 3
        </li>
        <li>
          Item 4
          <ol>
            <li>Item 3.1</li>
              <li>Item 3.2</li>
              <li>Item 3.3</li>
              <li>Item 3.4</li>
              <li>Item 3.5</li>
              <li>Item 3.6</li>
          </ol>
        </li>
        <li>
          Item 5
        </li>
        <li>
          Item 6
        </li>
    </ol>
		</div>				
					</div>
				</div>
			</div>
			
<script src='<?php base_url() ?>assets/js/jquery-sortable-min.js'></script>
		<script>
		var oldContainer
		$("ol.nested_with_switch").sortable({
			group: 'nested',
			afterMove: function (placeholder, container) {
			if(oldContainer != container){
			if(oldContainer)
			oldContainer.el.removeClass("active")
			container.el.addClass("active")

			oldContainer = container
			}
			},
			onDrop: function (item, container, _super) {
			container.el.removeClass("active")
			_super(item)
			}
		})

		$(".switch-container").on("click", ".switch", function  (e) {
			var method = $(this).hasClass("active") ? "enable" : "disable"
			$(e.delegateTarget).next().sortable(method)
		})

		</script>