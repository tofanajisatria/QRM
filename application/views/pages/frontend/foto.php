	<!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i></a></li>
					<li class="active"><?php echo $this->uri->segment(1) ?></li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	
	<section id="content">
		<!-- Portfolio Projects -->
		<div class="container marginbot50">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="heading">Media</h4>

					<div id="filters-container" class="cbp-l-filters-button">
						<div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All<div class="cbp-filter-counter"></div></div>
						<?php if (isset($data_media)) {
							foreach ($data_media as $row) { ?>
							<div data-filter=".<?php echo $row->id_kategori ?>" class="cbp-filter-item"><?php echo $row->nm_kategori ?><div class="cbp-filter-counter"></div></div>
						<?php }
						} ?>

					</div>
					

					<div id="grid-container" class="cbp-l-grid-projects">
						<ul>
							<?php if (isset($data_foto)) {
								foreach ($data_foto as $row) { ?>
							<li class="cbp-item <?php echo $row->id_kategori ?>">
								<div class="cbp-caption">
									<div class="cbp-caption-defaultWrap">
										<img src="<?php echo base_url('uploads/img/'.$row->file_media)?>" alt="" />
									</div>
									<div class="cbp-caption-activeWrap">
										<div class="cbp-l-caption-alignCenter">
											<div class="cbp-l-caption-body">
												<a href="<?php echo base_url('assets/frontend/img/works/5big.jpg')?>" class="cbp-lightbox cbp-l-caption-buttonRight">view larger</a>
											</div>
										</div>
									</div>
								</div>
								<div class="cbp-l-grid-projects-title"><?php echo $row->keterangan_media ?></div>
							</li>
							<?php }
							} ?>
						</ul>
					</div>
					<div class="cbp-l-loadMore-button">
						<a href="ajax/loadMore.html" class="cbp-l-loadMore-button-link">LOAD MORE</a>
					</div>

				</div>
			</div>
		</div>	</section>