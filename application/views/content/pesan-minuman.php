<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= base_url('assets/'); ?>img/breadcrumb.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>Pesan</h2>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-5">
				<div class="sidebar">
					<div class="sidebar__item">
						<h4>Kategori</h4>
						<ul>
							<li><a href="<?= base_url(); ?>home">Semua</a></li>
							<li><a href="<?= base_url(); ?>home/makanan">Makanan</a></li>
							<li><a href="<?= base_url(); ?>home/minuman">Minuman</a></li>
							<li><a href="<?= base_url(); ?>home/buah">Buah-buahan</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-lg-9 col-md-7">
				<div class="product__discount">
					<div class="section-title product__discount__title">
						<h2>Promo</h2>
					</div>
					<div class="row">

						<div class="product__discount__slider owl-carousel">
							<?php
							foreach ($promo as $p) {
							?>
								<div class="col-lg-4">
									<div class="product__discount__item">
										<div class="product__discount__item__pic set-bg" data-setbg="http://localhost/myadminresto/assets/img/upload/<?= $p['image']; ?>">
											<ul class="product__item__pic__hover">
												<li><a href="<?= base_url('home/keranjang/'); ?><?= $user['id']; ?>/<?= $p['id']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
											</ul>
										</div>
										<div class="product__discount__item__text">
											<span><?= $p['kategori']; ?></span>
											<h5><a href="#"><?= $p['nama_menu']; ?></a></h5>
											<div class="product__item__price">Rp.<?= $p['harga']; ?><span>Rp.<?= $p['harga_promo']; ?></span></div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="section-title product__discount__title">
					<h2>Minuman</h2>
				</div>
				<?php
				foreach ($menu as $m) {
				?>
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="product__item">
								<div class="product__item__pic set-bg" data-setbg="http://localhost/myadminresto/assets/img/upload/<?= $m['image']; ?>">
									<ul class="product__item__pic__hover">
										<li><a href="<?= base_url('home/keranjang/'); ?><?= $user['id']; ?>/<?= $m['id']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
									</ul>
								</div>
								<div class="product__item__text">
									<h6><a href="#"><?= $m['nama_menu']; ?></a></h6>
									<h5>Rp.<?= $m['harga']; ?></h5>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

		</div>
	</div>
	</div>
</section>
<!-- Product Section End -->
