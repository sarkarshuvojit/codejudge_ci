<?php //include_once 'helper/__init__.php';


//// TODO: for later
//$uri = $_SERVER['REQUEST_URI'];
//
//if($uri!='/success' && $uri!='/'){
//	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
//	include 'error.php';
//	die();
//}

?>

<!DOCTYPE html>
<html lang="en">
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Code Judge</title>

	<?php $this->load->view('sub-views/head.php') ?>

</head>

<body>

<?php $this->load->view('sub-views/header.php') ?>

<section id="main">

	<?php $this->load->view('sub-views/sidebar_student.php') ?>

	<section id="content">
		<div class="content__header">
			<h2>Problems</h2>
		</div>

		<!-- content begins -->

		<!-- Portfolio List -->
		<div class="card">
			<div class="card__header">

			</div>

			<div class="card__body">
				<table id="data-table-command" class="table table-striped table--vmiddle">
					<thead>
					<tr>
						<th data-column-id="id" data-type="numeric">#</th>
						<th data-column-id="title">Title</th>
						<th data-column-id="difficulty">Difficulty</th>
						<th data-column-id="author">Author</th>
						<th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
					</tr>
					</thead>
					<tbody>
					<?php

					foreach ($problems->result() as $problem){
						?>

						<tr>
							<td><?= $problem->id ?></td>
							<td><?= $problem->title ?></td>
							<td><?= $problem->difficulty ?></td>
							<td><?= $problem->name ?></td>
						</tr>

						<?php
					}

					?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- content ends -->

	</section>

</section>

<!-- Older IE Warning -->
<!--[if lt IE 9]>
<div class="ie-warning">
	<h1>Warning!!</h1>
	<p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
		to access this website.</p>
	<div class="ie-warning__container">
		<ul class="ie-warning__download">
			<li>
				<a href="http://www.google.com/chrome/">
					<img src="img/browsers/chrome.png" alt="">
					<div>Chrome</div>
				</a>
			</li>
			<li>
				<a href="https://www.mozilla.org/en-US/firefox/new/">
					<img src="img/browsers/firefox.png" alt="">
					<div>Firefox</div>
				</a>
			</li>
			<li>
				<a href="http://www.opera.com">
					<img src="img/browsers/opera.png" alt="">
					<div>Opera</div>
				</a>
			</li>
			<li>
				<a href="https://www.apple.com/safari/">
					<img src="img/browsers/safari.png" alt="">
					<div>Safari</div>
				</a>
			</li>
			<li>
				<a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
					<img src="img/browsers/ie.png" alt="">
					<div>IE (New)</div>
				</a>
			</li>
		</ul>
	</div>
	<p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<!-- Javascript Libraries -->

<!-- jQuery -->
<script src="<?= base_url('') ?>vendors/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?= base_url('') ?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Malihu ScrollBar -->
<script src="<?= base_url('') ?>vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?= base_url('') ?>vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>

<!-- Select 2 -->
<script src="<?= base_url('') ?>vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- Bootgrid (datatables dependency) -->
<script src="<?= base_url('') ?>vendors/bower_components/jquery.bootgrid/dist/jquery.bootgrid.min.js"></script>

<!-- Datatables -->
<script>
    $(document).ready(function(){
        //Command Buttons
        $("#data-table-command").bootgrid({
            caseSensitive: false,
            //Override default icon classes
            css: {
                icon: 'table-bootgrid__icon zmdi',
                iconSearch: 'zmdi-search',
                iconColumns: 'zmdi-view-column',
                iconDown: 'zmdi-sort-amount-desc',
                iconRefresh: 'zmdi-refresh',
                iconUp: 'zmdi-sort-amount-asc',
                dropDownMenu: 'dropdown form-group--select',
                search: 'table-bootgrid__search',
                actions: 'table-bootgrid__actions',
                header: 'table-bootgrid__header',
                footer: 'table-bootgrid__footer',
                dropDownItem: 'table-bootgrid__label',
                table: 'table table-bootgrid',
                pagination: 'pagination table-bootgrid__pagination'
            },

            //Override default module markups
            templates: {
                actionDropDown: "<span class=\"{{css.dropDownMenu}}\">" + "<a href='' data-toggle=\"dropdown\">{{ctx.content}}</a><ul class=\"{{css.dropDownMenuItems}}\" role=\"menu\"></ul></span>",
                search: "<div class=\"{{css.search}} form-group\"><span class=\"{{css.icon}} {{css.iconSearch}}\"></span><input type=\"text\" class=\"{{css.searchField}}\" placeholder=\"{{lbl.search}}\" /><i class='form-group__bar'></i></div>",
                header: "<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><p class=\"{{css.search}}\"></p><p class=\"{{css.actions}}\"></p></div>",
                actionDropDownCheckboxItem: "<li><div class='tabe-bootgrid__checkbox checkbox checkbox--dark'><label class=\"{{css.dropDownItem}}\"><input name=\"{{ctx.name}}\" type=\"checkbox\" value=\"1\" class=\"{{css.dropDownItemCheckbox}}\" {{ctx.checked}} /> {{ctx.label}}<i class='input-helper'></i></label></div></li>",
                footer: "<div id=\"{{ctx.id}}\" class=\"{{css.footer}}\"><div class=\"row\"><div class=\"col-sm-6\"><p class=\"{{css.pagination}}\"></p></div><div class=\"col-sm-6 table-bootgrid__showing hidden-xs\"><p class=\"{{css.infos}}\"></p></div></div></div>"
            },
            formatters: {
                "commands": function(column, row) {
                    return "<a class=\"btn btn-default btn--light btn--icon-text\" href=\"/problem/" + row.id + "\"><i class=\"zmdi zmdi-code\"></i> Solve</a> ";
                }
            }
        });
    });
</script>

<?php
//if($uri=='/success') {
//	?>
<!--	<script>-->
<!--        notify('success', 'Your problem was added successfully.');-->
<!--	</script>-->
<!--	--><?php
//}
?>


</body>
</html>