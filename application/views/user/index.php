<?php 
	$pengguna = $this->m_app->Pengguna();
?>

<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
					<div class="app-sidebar__user">
						<div class="user-info" align="center"> 
							<div class="avatar-lg">
                   			 <img src="<?=base_url('assets/male.png')?>" alt="image profile" class="avatar-img rounded" align="align-items-md-center"></div>
							<a href="#" class="ml-2"><span class="text-dark app-sidebar__user-name font-weight-semibold"><?=$akun->name?></span><br>
								<span class="text-muted app-sidebar__user-name text-sm"><?=$akun->role?></span>
							</a>
						</div>
					</div>
					<ul class="side-menu">
						<li>
							<a class="side-menu__item <?=($active == 'pengguna') ? 'active' : ''?>" href="<?=base_url('pengguna')?>#">
								<i class="side-menu__icon flaticon-box-1 text-warning"></i>
								<span class="side-menu__label">Data Pengguna</span>
							</a>
						</li>
				</aside>
				<!--side-menu-->

	<div class="app-content my-3 my-md-0">
		<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div class="">
				<h2 class="text-white pb-2 fw-bold">Management Data Pengguna</h2>
				<ul class="breadcrumbs text-white">
					<li class="nav-home">
						<a href="<?=base_url('app')?>" class=" text-white">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="<?=base_url('logistik')?>" class="text-white">Management Logistik</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#!" class="text-white text-capitalize"><?=$breadcrumbs?></a>
					</li>
				</ul>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				<a href="<?=base_url('app')?>" class="btn btn-white btn-border btn-round"><i class="fe fe-arrow-left mr-1"></i>Back to Dashboard</a>
			</div>
		</div>
	</div>
</div>
	<?php $this->load->view($menu); ?>
</div>