	
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-lg-3">
					<div class="widget">
						<h4>Kontak</h4>
						<address>
						<strong><?php echo config_web('nameweb') ?></strong><br>
						 <?php echo config_web('address') ?><br>
						 <?php echo config_web('zip_code') ?><br>
						 Tel. <?php echo config_web('phone_number') ?> Fax. <?php echo config_web('fax') ?> </address>
					</div>
				</div>
			</div>
		</div>
		<div id="sub-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="copyright">
							<p>
								<span>&copy; PT INTI. | <a href="http://bootstraptaste.com/">Bootstrap Themes</a> by BootstrapTaste
	                             <!-- 
	                                All links in the footer should remain intact. 
	                                Licenseing information is available at: http://bootstraptaste.com/license/
	                                You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Sailor
	                            -->
							
							</p>
						</div>
					</div>
					<div class="col-lg-6">
						<ul class="social-network">
							<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
							<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('assets/frontend/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/modernizr.custom.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/jquery.easing.1.3.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/plugins/flexslider/jquery.flexslider-min.js')?>"></script> 
<script src="<?php echo base_url('assets/frontend/plugins/flexslider/flexslider.config.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/jquery.appear.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/stellar.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/classie.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/uisearch.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/jquery.cubeportfolio.min.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/google-code-prettify/prettify.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/animate.js')?>"></script>
<script src="<?php echo base_url('assets/frontend/js/custom.js')?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>

<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  })
</script>
</body>
</html>