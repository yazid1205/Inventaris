<?php 
	$logistik      = $this->m_app->logistik();
    $masuk         = $this->db->get('masuk');
    $keluar        = $this->db->get('keluar');
    $rusak         = $this->db->get('rusak');
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
							<a class="side-menu__item <?=($active == 'logistik') ? 'active' : ''?>" href="<?=base_url('logistik')?>#">
								<i class="side-menu__icon flaticon-box-1 text-warning"></i>
								<span class="side-menu__label">Barang Logistik</span>
							</a>
						</li>
						<li>
							<a class="side-menu__item <?=($active == 'masuk') ? 'active' : ''?>" href="<?=base_url('logistik/masuk')?>#">
								<i class="side-menu__icon flaticon-download text-success"></i>
								<span class="side-menu__label">Barang Masuk</span>
							</a>
						</li>
						<li>
							<a class="side-menu__item <?=($active == 'keluar') ? 'active' : ''?>" href="<?=base_url('logistik/keluar')?>#">
								<i class="side-menu__icon flaticon-upward text-danger"></i>
								<span class="side-menu__label">Barang Keluar</span>
							</a>
						</li>
						<li>
							<a class="side-menu__item <?=($active == 'rusak') ? 'active' : ''?>" href="<?=base_url('logistik/rusak')?>#">
								<i class="side-menu__icon flaticon-interface-5 text-primary"></i>
								<span class="side-menu__label">Barang Rusak</span>
							</a>
						</li>
					</ul>
				</aside>
				<!--side-menu-->

<!--<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-3">
			<a href="<?=base_url('logistik')?>">
			<div class="card card-stats card-round card-box <?=($active == 'logistik') ? 'callout callout-warning' : '' ?>">
				<div class="card-body ">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-box-1 text-warning"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Barang Logistik</p>
								<h4 class="card-title"><?=$logistik->num_rows()?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			</a>
		</div>
		<div class="col-md-3">
			<a href="<?=base_url('logistik/masuk')?>">
			<div class="card card-stats card-round card-box <?=($active == 'masuk') ? 'callout callout-success' : '' ?>">
				<div class="card-body ">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-download text-success"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Barang Masuk</p>
								<h4 class="card-title"><?=$masuk->num_rows()?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			</a>
		</div>
		
		<div class="col-md-3">
			<a href="<?=base_url('logistik/keluar')?>">
			<div class="card card-stats card-round card-box <?=($active == 'keluar') ? 'callout callout-danger' : '' ?>">
				<div class="card-body">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-upward text-danger"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Barang Keluar</p>
								<h4 class="card-title"><?=$keluar->num_rows()?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			</a>
		</div>

		<div class="col-md-3">
			<a href="<?=base_url('logistik/rusak')?>">
			<div class="card card-stats card-round card-box <?=($active == 'rusak') ? 'callout callout-primary' : '' ?>">
				<div class="card-body">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-interface-5 text-primary"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Barang Rusak</p>
								<h4 class="card-title"><?=$rusak->num_rows()?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			</a>
		</div>

		<div class="col-md-3">
			<a href="<?=base_url('logistik/rusak')?>">
			<div class="card card-stats card-round card-box <?=($active == 'rusak') ? 'callout callout-primary' : '' ?>">
				<div class="card-body">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-interface-5 text-primary"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Barang Hilang</p>
								<h4 class="card-title"><?=$rusak->num_rows()?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			</a>
		</div>-->

<!-- 		<div class="col-md-3">
			<a href="<?=base_url('logistik/ru')?>">
			<div class="card card-stats card-round card-box <?=($active == 'rusak') ? 'callout callout-primary' : '' ?>">
				<div class="card-body">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-interface-5 text-primary"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">Barang Ru</p>
								<h4 class="card-title"><?=$rusak->num_rows()?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			</a>
		</div> -->

	<div class="app-content my-3 my-md-0">
		<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div class="">
				<h2 class="text-white pb-2 fw-bold">Management Data Logistik</h2>
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