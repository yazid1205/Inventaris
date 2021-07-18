
<?php 
	$barang        = $this->m_app->barang();
    $jenis         = $this->m_app->jenis();
    $ruangan       = $this->m_app->ruangan();
    $totalHilang   = $this->m_app->hilang(); 
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
							<a class="side-menu__item <?=($active == 'barang') ? 'active' : ''?>" href="<?=base_url('inventaris')?>#">
								<i class="side-menu__icon flaticon-box-1 text-warning"></i>
								<span class="side-menu__label">Barang</span>
							</a>
						</li>
						<li>
							<a class="side-menu__item <?=($active == 'jenis') ? 'active' : ''?>" href="<?=base_url('inventaris/jenis')?>#">
								<i class="side-menu__icon icon-grid text-success"></i>
								<span class="side-menu__label">Jenis</span>
							</a>
						</li>
						<li>
							<a class="side-menu__item <?=($active == 'ruangan') ? 'active' : ''?>" href="<?=base_url('inventaris/ruangan')?>#">
								<i class="side-menu__icon flaticon-diagram text-danger"></i>
								<span class="side-menu__label">Ruangan</span>
							</a>
						</li>
						<li>
							<a class="side-menu__item <?=($active == 'hilang') ? 'active' : ''?>" href="<?=base_url('inventaris/hilang')?>#">
								<i class="side-menu__icon fa fa-reply text-primary"></i>
								<span class="side-menu__label">Barang Hilang</span>
							</a>
						</li>
					</ul>
				</aside>
				<!--side-menu-->


				<!--<div class="col-md-12">
					<a href="<?=base_url('inventaris')?>">
					<div class="card card-stats card-round card-box <?=($active == 'barang') ? 'callout callout-warning' : '' ?>">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-box-1 text-warning"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Barang</p>
										<h4 class="card-title"><?=$barang->num_rows()?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					</a>
				</div>
				<div class="col-md-12">
					<a href="<?=base_url('inventaris/jenis')?>">
					<div class="card card-stats card-round card-box <?=($active == 'jenis') ? 'callout callout-success' : '' ?>">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="icon-grid text-success"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Jenis</p>
										<h4 class="card-title"><?=$jenis->num_rows()?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					</a>
				</div>
				<div class="col-md-12">
					<a href="<?=base_url('inventaris/ruangan')?>">
					<div class="card card-stats card-round card-box <?=($active == 'ruangan') ? 'callout callout-danger' : '' ?>">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-diagram text-danger"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Ruangan</p>
										<h4 class="card-title"><?=$ruangan->num_rows()?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					</a>
				</div>
				
				<div class="col-md-12">
					<a href="<?=base_url('inventaris/hilang')?>">
					<div class="card card-stats card-round card-box <?=($active == 'hilang') ? 'callout callout-primary' : '' ?>">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="fa fa-reply text-primary"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Barang Hilang</p>
										<h4 class="card-title"><?=$totalHilang->num_rows()?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					</a>
				</div>
				-->
		<div class="app-content my-3 my-md-0">
			<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div class="">
				<h2 class="text-white pb-2 fw-bold">Management Data Inventaris</h2>
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
						<a href="<?=base_url('inventaris')?>" class="text-white">Inventaris</a>
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
