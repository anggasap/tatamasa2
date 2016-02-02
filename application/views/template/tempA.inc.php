<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html" style="">
				<img src="<?php echo base_url('metronic/img/logo_berkah.jpg'); ?>" style="" alt="logo" class="logo-default"/>

			</a>
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN PAGE ACTIONS -->
		<!-- DOC: Remove "hide" class to enable the page header actions -->
		<div class="page-actions">
			<div class="btn-group">
				<button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="fa fa-user">&nbsp; &nbsp;</i><span class="hidden-sm hidden-xs">
						<input type="hidden" value="<?php  echo $this->session->userdata('id_kyw'); ?>">
						<?php echo $this->session->userdata('id_kyw'); ?>
						&nbsp;</span><i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="<?php echo site_url('main/logout');?>">
						<i class="icon-key"></i> Logout </a>
					</li>
					<!--<li>
						<a href="#">
						<i class="icon-tag"></i> New Comment </a>
					</li>
					<li>
						<a href="#">
						<i class="icon-share"></i> Share </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="#">
						<i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
						</a>
					</li>-->
				</ul>
			</div>
		</div>
		<!-- END PAGE ACTIONS -->
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			<!-- BEGIN HEADER SEARCH BOX -->
			<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
			<!-- END HEADER SEARCH BOX -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="separator hide">
					</li>
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<!--<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
						<span class="badge badge-success">
                            <input type="hidden" value="<?php /* echo $this->session->userdata('id_kyw'); */?>">
							<?php /*echo $this->session->userdata('id_kyw'); */?> </span>
						</a>

					</li>-->
					<!-- END NOTIFICATION DROPDOWN -->
					<!--<li class="separator hide">
					</li>-->
					<!-- BEGIN INBOX DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-user"></i>
						<span class="badge badge-warning" id="idSessNamaKyw">
						<?php echo $this->session->userdata('namaKyw'); ?> </span>
						</a>

					</li>
					<!-- END INBOX DROPDOWN -->
					<li class="separator hide">
					</li>
					<!-- BEGIN INBOX DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-badge"></i>
						<span class="badge badge-danger">
						<?php echo $this->session->userdata('usergroup_desc'); ?> </span>
						</a>

					</li>
					<!-- END INBOX DROPDOWN -->
					<li class="separator hide">
					</li>
					<!-- BEGIN TODO DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-calendar"></i>
						<span class="badge badge-primary" id="id_sessTgltrans">
						<?php echo $this->session->userdata('tgl_d'); ?> </span>
						</a>

					</li>
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<!--<li class="dropdown dropdown-user dropdown-dark">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username username-hide-on-mobile"></span>
							<img alt="" class="img-circle" src="<?php /*echo base_url('metronic/admin/layout4/img/avatar9.jpg'); */?>"/>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li id="id_btnLogout">
								<a href="<?php /*echo site_url('main/logout');*/?>">
									<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>-->
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix ">
</div>
<div class="modal_json"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container ">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="menu_root" id="menu_root_0">
					<a href="<?php echo base_url('main/'); ?>" id="id_a_menu_0">
						<i class="icon-home"></i>
						<span class="title">Home</span>
					</a>
				</li>
				<?php
				$i=2;
				foreach($multilevel as $data){
					echo '<li class="menu_root" id="menu_root_'.$data['id'].'">';
					echo '<a href="javascript:;"><i class="icon-folder"></i>';
					echo '<span class="title">'.$data['nama'].'</span>' ;
					echo '<span class="arrow "></span>';
					echo '</a>';
					echo '<ul class="sub-menu">';
					echo print_recursive_list($data['child']);
					echo '</ul>';
					echo '</li>';
					$i++;
				}
				?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
