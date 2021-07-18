	
	<!--   Core JS Files   -->
	<script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
	<script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?=base_url()?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?=base_url()?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?=base_url()?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Datatables -->
	<script src="<?=base_url()?>assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?=base_url()?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- Sweet Alert -->
	<script src="<?=base_url()?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?=base_url()?>assets/js/atlantis.min.js"></script>

	<!-- Plugins -->
	<script src="<?=base_url('assets')?>/plugins/toggle-sidebar/js/sidemenu.js"></script>
  	<script src="<?=base_url('assets/plugins/toastr/toastr.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datepicker3/datepicker3.min.js')?>"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?=base_url()?>assets/js/setting-demo.js"></script>
	<script src="<?=base_url()?>assets/js/demo.js"></script>

	<script>
		$(document).ready(function() {
			$('.dataTable').DataTable();
			$('.datepicker').datepicker({
		        autoclose: true,
		        pickerPosition: "bottom-left",
		        format: 'yyyy-mm-dd',
		        todayBtn: true,
		        todayHighlight: true,
		    });
		});

		toastr.options.closeButton = true;
	    toastr.options.positionClass = "toast-top-center";
	    <?php if($this->session->flashdata('success')){ ?>
	      toastr.success("<?php echo $this->session->flashdata('success'); ?>");
	    <?php } else if($this->session->flashdata('error')){  ?>
	        toastr.error("<?php echo $this->session->flashdata('error'); ?>");
	    <?php }else if($this->session->flashdata('warning')){  ?>
	        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
	    <?php }else if($this->session->flashdata('info')){  ?>
	        toastr.info("<?php echo $this->session->flashdata('info'); ?>");
	    <?php } ?>
	</script>